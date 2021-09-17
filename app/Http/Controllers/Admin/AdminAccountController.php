<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\MarketPlace;
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

class AdminAccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function dashboard(){

        $getUsers = new User();
        $getPayments = new Payment();

        $users = $getUsers->limit(10)->orderBy('created_at', 'desc')->get();
        $count['users'] = $getUsers->count();
        $count['approved-users'] = $getUsers->count();

        $payments = $getPayments->limit(10)->orderBy('created_at', 'desc')->get();
        $count['payments'] = $getPayments->count();
        $count['completed-payments'] = $getPayments->where('completed_returns', 1)->count();
        $total['payments'] = $getPayments->sum('amount');
        $total['completed-payments'] = $getPayments->where('completed_returns', 1)->sum('amount');

        // Get Users with pending payments, where approved payment and has not been paired
        $payers = $getUsers->with('pendingPayment')->has('pendingPayment')->get();

        // Get Users with incomplete returns and has not been paired
        $receivers = $getUsers->with('pendingReturn')->has('pendingReturn')->get();

        $pairings = Pairing::with('payer', 'receiver')->limit(10)
            ->orderBy('created_at', 'desc')->get();

        return view('admin.account.dashboard',
            compact('users', 'count', 'payments', 'total', 'payers', 'receivers', 'pairings'));
    }

    public function manageUsers(){

        $getUsers = new User();

        $users = $getUsers->orderBy('created_at', 'desc')->paginate(20);
        $count['users'] = $getUsers->count();
        $count['approved-users'] = $getUsers->count();

        return view('admin.account.manage-users', compact('users', 'count'));
    }

//    public function hasPayment($userId){
//        return Payment::with('user')->where('user_id', $userId)
//            ->where('payment_balance','>', 0)->first();
//    }

    public function makeReceiver($id){

        $data['user'] = User::with('pendingPayment')->findOrFail($id);
        $data['paymentPlans'] = PaymentPlan::all();

        if($data['user']->pendingPayment){
            Session::flash('warning', 'Already have a pending investment');
            return redirect()->back();
        }

        return view('admin.account.make-receiver', $data);
    }

    public function makeReceiverInvest(Request $request, $id){

        $user = User::findOrFail($id);

        $input = $request->all();
        $paymentPlan = PaymentPlan::findOrFail($input['payment_plan_id']);

        if($user->pendingPayment){
            Session::flash('warning', 'Already have a pending investment');
            return redirect()->back();
        }

        $input['return_balance'] = $input['amount'] * ($paymentPlan->percentage/100) + $input['amount'];

        if($input['amount'] >= $paymentPlan->min && $input['amount'] <= $paymentPlan->max){
            Payment::create([
                'user_id' => $user->id,
                'payment_plan_id' => $input['payment_plan_id'],
                'amount' => $input['amount'],
                'return_balance' => $input['return_balance'],
                'payment_balance' => 0,
                'completed_payments' => 1,
            ]);
            Session::flash('success', $user->name.' has become a receiver');
        }else{
            Session::flash('warning', 'Your amount must fall within the payment plan range');
        }

        return redirect()->back();
    }

    public function approveUser($id){

        $user = User::findOrFail($id);

        if ($user->approved === 1) {
            $user->approved = 0;
            $email_subject = 'Your Account has been Deactivated';
            Session::flash('warning', $user->name . ' has been deactivated');

        } else {
            $user->approved = 1;
            $email_subject = 'Your account has been disabled';
            Session::flash('success', $user->name . ' has been activated');
        }

        $user->save();

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'approved' => $user->approved,
            'email_subject' => $email_subject,
        ];

        Mail::send('emails.members.approve-user', $data, static function ($message) use ($data) {
            $message->from('info@unfantome.com', 'Unfantome');
            $message->to($data['email'], $data['name']);
            $message->replyTo('Info@unfantome.com', 'Unfantome');
            $message->subject($data['email_subject']);
        });

        return redirect()->back();
    }

    public function deleteUser($id){

        $user = User::findOrFail($id);

        // delete image
        if (!empty($user->image) && File::exists(public_path() . '/photos/members/' . $user->image)) {
            FILE::delete(public_path() . '/photos/members/' . $user->image);
        }

        // delete payments
        $payments = Payment::where('user_id', $user->id)->get();
        $payments->delete();

        // delete market place
        $products = Marketplace::where('user_id', $user->id)->get();

        foreach($products as $product){

            if (!empty($product->image) && File::exists(public_path() . '/photos/market-place/' . $product->image)) {
                FILE::delete(public_path() . '/photos/market-place/' . $product->image);
            }

            if (!empty($product->image_two) && File::exists(public_path() . '/photos/market-place/' . $product->image_two)) {
                FILE::delete(public_path() . '/photos/market-place/' . $product->image_two);
            }

            if (!empty($product->image_three) && File::exists(public_path() . '/photos/market-place/' . $product->image_three)) {
                FILE::delete(public_path() . '/photos/market-place/' . $product->image_three);
            }

            $product->delete();
        }
        $user->delete();
    }

    public function managePayments(){

        $getPayments = new Payment();

        $payments = $getPayments->orderBy('created_at', 'desc')->paginate(20);
        $count['payments'] = $getPayments->count();
        $count['completed-payments'] = $getPayments->where('completed_returns', 1)->count();
        $total['payments'] = $getPayments->sum('amount');
        $total['completed-payments'] = $getPayments->where('completed_returns', 1)->sum('amount');

        return view('admin.account.manage-payments', compact('payments', 'count', 'total'));
    }

    public function accountSettings(){

        return view('admin.account.account-settings');
    }

    public function updateAccountSettings(Request $request){

        $input = $request->except('_token');

        $input['password'] = !empty($input['password']) ? bcrypt($input['password']) : Auth::user()->password;

        Admin::where('id', Auth::user()->id)->update($input);

        Session::flash('success', 'Account updated');
        return redirect()->back();
    }
}
