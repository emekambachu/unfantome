<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\MarketPlace;
use App\Models\Pairing;
use App\Models\Payment;
use App\Models\PaymentPlan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

class MemberAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function payments(){
        return Payment::with('user')->where('user_id', Auth::user()->id);
    }

    public function currentPayment(){
        return Payment::where([
            ['user_id', Auth::user()->id],
            ['approved', 0],
        ])->first();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(){

        $paymentPlans = PaymentPlan::all();

        $currentPayment = $this->currentPayment();

        $payments = $this->payments();
        $investments['total'] = $payments->first() ? $payments->sum('amount') : 0;

        $paired = Pairing::with('payer', 'receiver');

        // Get time limit from any pairing that is pending
        $getTimeLimit = $paired->where('approved', 0)
            ->where('payer_id', Auth::user()->id)
            ->orWhere('receiver_id', Auth::user()->id)
            ->first();

        // Convert time limit to seconds
        $timeLimit = $getTimeLimit ? $getTimeLimit->time_limit * 3600 : null;

        // Get Payer details
        $pairing_payer = Pairing::with('payer', 'receiver')->where([
            ['payer_id', Auth::user()->id],
            ['approved', 0],
            ['cancelled', 0],
        ])->first();

        // get receiver details
        $pairing_receiver = Pairing::with('payer', 'receiver')->where([
            ['receiver_id', Auth::user()->id],
            ['approved', 0],
            ['cancelled', 0],
        ])->first();

        // Get current time, deduct it from the pairing created and convert to seconds and hours
        $now = Carbon::now();
        if($pairing_payer || $pairing_receiver){
            $created_at = Carbon::parse($getTimeLimit->created_at);
            $getHours = $created_at->diffInHours($now);  // convert to hours
            $getSeconds = $created_at->diffInSeconds($now);  // convert to Seconds
        }else{
            $created_at = 0;
            $getHours = 0;
            $getSeconds = 0;
        }

        // Get current time, deduct it from the pending payment created_at and convert to days
        if(Auth::user()->pendingPayment){
            $payment['payment_created_at'] = Carbon::parse(Auth::user()->pendingPayment->created_at);
            $payment['payment_get_days'] = $payment['payment_created_at']->diffInDays($now);  // Convert to days
        }else{
            $payment['payment_created_at'] = 0;
            $payment['payment_get_days'] = 0;
        }

        $products = MarketPlace::with('user')->where('approved', 1)
            ->inRandomOrder()->limit(6)->get();

        return view('members.account.dashboard', $payment,
            compact('paymentPlans', 'currentPayment', 'investments', 'pairing_payer', 'pairing_receiver', 'getHours', 'getSeconds', 'timeLimit', 'products'));
    }

    public function makePayment(Request $request){

        $input = $request->all();
        $paymentPlan = PaymentPlan::findOrFail($input['payment_plan_id']);

        if($this->currentPayment()){
            Session::flash('warning', 'Already have a pending investment');
            return redirect()->back();
        }

        $input['return_balance'] = $input['amount'] * ($paymentPlan->percentage/100) + $input['amount'];
        $input['payment_balance'] = $input['amount'];

        if($input['amount'] >= $paymentPlan->min && $input['amount'] <= $paymentPlan->max){
            Payment::create([
                'user_id' => Auth::user()->id,
                'payment_plan_id' => $input['payment_plan_id'],
                'amount' => $input['amount'],
                'return_balance' => $input['return_balance'],
                'payment_balance' => $input['payment_balance'],
            ]);
            Session::flash('success', 'Your investment have been initiated, you will be paired in the next 7 days');
        }else{
            Session::flash('warning', 'Your amount must fall within the payment plan range');
        }

        return redirect()->back();
    }

    public function allPayments(){

        $payments = $this->payments()->paginate(15);
        return view('members.account.all-payments', compact('payments'));
    }

    public function confirmPayment($id, Request $request){

        $pairing = Pairing::with('payer', 'receiver')
            ->where([
                ['id', $id],
                ['payer_id', Auth::user()->id],
                ['confirm_payment', 0],
                ['approved', 0],
            ])->first();

        if(!$pairing){
            Session::flash('warning', 'This pairing does not exist');
            return redirect()->back()->withInput();
        }

        $request->validate([
            'proof_of_payment' => 'required|mimes:jpg,jpeg,png|image|max:5048',
        ]);

        if($file = $request->file('proof_of_payment')){

            // path for converted image
            $converted_path = 'photos/proof-of-payment';
            if(!File::exists($converted_path)){
                // create path
                File::makeDirectory($converted_path, $mode = 0777, true, true);
            }

            // Add current time in seconds to file name
            $fileName = Auth::user()->name.'-'.time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(1000, 1000);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(1000, 1000, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($converted_path.'/'.$fileName);
        }

        // When the payer uploads proof of payment and confirms they have pad the receiver
        $pairing->proof_of_payment = $fileName;
        $pairing->confirm_payment = 1;
        $pairing->save();

        $data = [
            'payer_email' => $pairing->payer->email,
            'payer_name' => $pairing->payer->name,
            'receiver_email' => $pairing->receiver->email,
            'receiver_name' => $pairing->receiver->name,
            'amount' => $pairing->amount,
        ];

        // Send Email to registered User
        Mail::send('emails.members.confirm-payment', $data, static function ($message) use ($data) {
            $message->from('info@unfantome.com', 'Unfantome');
            $message->to($data['receiver_email'], $data['receiver_name']);
            $message->replyTo('info@unfantome.com', 'Unfantome');
            $message->subject($data['payer_name'].' has made payment. Confirm!!');
        });

        Session::flash('success', 'You just confirmed');
        return redirect()->back()->withInput();
    }

    public function cancelPayment($id){

        $pairing = Pairing::with('payer', 'receiver')
            ->where([
                ['id', $id],
                ['payer_id', Auth::user()->id],
                ['confirm_payment', 0],
                ['approved', 0],
            ])->first();

        if(!$pairing){
            Session::flash('warning', 'This pairing does not exist');
            return redirect()->back()->withInput();
        }

        // make cancel true
        $pairing->cancelled = 1;
        $pairing->save();

        // Update payer paired to 0 when they cancel payment
        $payer = User::findOrFail($pairing->payer_id);
        $payer->paired = 0;
        $payer->save();

        $payment = new Payment();

        // add the pairing amount back to the payer payment's payment_balance
        $payerPayment = $payment->where('user_id', $pairing->payer_id)->first();
        $payerPayment->payment_balance += $pairing->amount;
        $payerPayment->save();

        // add the pairing amount back to the payer payment's payment_balance
        $receiverPayment = $payment->where('user_id', $pairing->receiver_id)->first();
        $receiverPayment->return_balance += $pairing->amount;
        $receiverPayment->save();

        $data = [
            'payer_email' => $pairing->payer->email,
            'payer_name' => $pairing->payer->name,
            'receiver_email' => $pairing->receiver->email,
            'receiver_name' => $pairing->receiver->name,
            'amount' => $pairing->amount,
        ];

        // Send Email to registered User
        Mail::send('emails.members.cancelled-payment', $data, static function ($message) use ($data) {
            $message->from('info@unfantome.com', 'Unfantome');
            $message->to($data['receiver_email'], $data['receiver_name']);
            $message->replyTo('info@unfantome.com', 'Unfantome');
            $message->subject($data['payer_name'].' has cancelled this payment');
        });

        // Send to admin
        Mail::send('emails.members.cancelled-payment-admin', $data, static function ($message) use ($data) {
            $message->from('info@unfantome.com', 'Unfantome');
            $message->to('info@unfantome.com', 'Unfantome');
            $message->replyTo('info@unfantome.com', 'Unfantome');
            $message->subject($data['payer_name'].' has cancelled this payment');
        });

        Session::flash('success', 'This payment has been cancelled');
        return redirect()->back()->withInput();
    }

    public function approvePayment($id){

        $pairing = Pairing::with('payer', 'receiver')
            ->where([
                ['id', $id],
                ['receiver_id', Auth::user()->id],
                ['confirm_payment', 1],
                ['approved', 0],
            ])->first();

        if(!$pairing){
            Session::flash('warning', 'Wrong pairing');
            return redirect()->back()->withInput();
        }

        // approve pairing payment
        $pairing->approved = 1;
        $pairing->save();

        // Update payer paired to 0 when payment has been approved
        $payer = User::findOrFail($pairing->payer_id);
        $payer->paired = 0;
        $payer->save();

        // Update receiver paired to 0 when payment has been approved
        $receiver = User::findOrFail($pairing->receiver_id);
        $receiver->paired = 0;
        $receiver->save();

        $payment = new Payment();
        $payerPayment = $payment->where('user_id', $pairing->payer_id)->first();
        $receiverPayment = $payment->where('user_id', $pairing->receiver_id)->first();

        // Approve payer's payment if the payment balance is 0
        if($payerPayment->payment_balance === 0){
            $payerPayment->approved = 1;
            $payerPayment->completed_payments = 1;
            $payerPayment->save();
        }

        if($receiverPayment->return_balance === 0){
            $receiverPayment->completed_returns = 1;
            $receiverPayment->save();
        }

        Session::flash('success', 'Payment Approved');
        return redirect()->back();
    }

    public function accountSettings(){

        return view('members.account.account-settings');
    }

    public function updateAccountSettings(Request $request){

        $input = $request->except('_token');

        if($file = $request->file('image')){

            // path for converted image
            $converted_path = 'photos/members';
            if(!File::exists($converted_path)) {
                // create path
                File::makeDirectory($converted_path, $mode = 0777, true, true);
            }

            // Add current time in seconds to file name
            $name = time() . $file->getClientOriginalName();

            // create canvas background to hold the image (Must install Image Intervention Package first)
            $background = Image::canvas(400, 400);

            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());

            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize(400, 400, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($converted_path.'/'.$name);
            $image = $name;

        }else{
            $image = Auth::user()->image;
        }

        $input['image'] = $image;
        $input['password'] = !empty($input['password']) ? bcrypt($input['password']) : Auth::user()->password;

        User::where('id', Auth::user()->id)->update($input);

        Session::flash('success', 'Account updated');
        return redirect()->back();
    }
}
