<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Pairing;
use App\Models\Payment;
use App\Models\PaymentPlan;
use App\Models\User;
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

        $paired = Pairing::with('payer', 'receiver');

        $payer = $paired->where([
            ['payer_id', Auth::user()->id],
            ['approved', 0],
        ])->first();

        $receiver = $paired->where([
            ['payer_id', Auth::user()->id],
            ['approved', 0],
        ])->first();

        return view('members.account.dashboard',
            compact('paymentPlans', 'currentPayment', 'payer', 'receiver'));
    }

    public function makePayment(Request $request){

        $input = $request->all();
        $paymentPlan = PaymentPlan::findOrFail($input['payment_plan_id']);

        if($this->currentPayment()){
            Session::flash('warning', 'Already have a pending investment');
            return redirect()->back();
        }

        $input['balance'] = $input['amount'] * ($paymentPlan->percentage/100) + $input['amount'];

        if($input['amount'] >= $paymentPlan->min && $input['amount'] <= $paymentPlan->max){
            Payment::create([
                'user_id' => Auth::user()->id,
                'payment_plan_id' => $input['payment_plan_id'],
                'amount' => $input['amount'],
                'balance' => $input['balance'],
            ]);
            Session::flash('success', 'Your investment have been initiated, you will be matched shortly');
        }else{
            Session::flash('warning', 'Your amount must fall within the payment plan range');
        }

        return redirect()->back();
    }

    public function allPayments(){

        return view('members.account.all-payments');
    }

    public function confirmPayment($id, $request){

        $pairing = Pairing::with('payer', 'receiver')
            ->where([
                ['id', $id],
                ['payer_id', Auth::user()->id],
            ])->first();

        if(!$pairing){
            Session::flash('warning', 'This pairing does not exist');
            return redirect()->back()->withInput();
        }

        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|image|max:5048',
        ]);

        if($file = $request->file('image')){

            // path for converted image
            $converted_path = 'photos/proof-of-payment';
            if(!File::exists($converted_path)){
                // create path
                File::makeDirectory($converted_path, $mode = 0777, true, true);
            }

            // Add current time in seconds to file name
            $name = Auth::user()->name.'-'.time() . $file->getClientOriginalName();

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
            $background->save($converted_path.'/'.$name);
            $image = $name;
        }

        $pairing->image = $image;
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

        Session::flash('success', 'You just confirmed ');
        return redirect()->back()->withInput();
    }

    public function cancelPayment($id){

        $pairing = Pairing::with('payer', 'receiver')
            ->where([
                ['id', $id],
                ['payer_id', Auth::user()->id],
            ])->first();

        if(!$pairing){
            Session::flash('warning', 'This pairing does not exist');
            return redirect()->back()->withInput();
        }

    }

    public function approvePayment($id){

    }

    public function marketPlace(){

        return view('members.account.market-place.index');
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
