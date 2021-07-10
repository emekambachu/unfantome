<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(){

        $paymentPlans = PaymentPlan::all();
        return view('members.account.dashboard', compact('paymentPlans'));
    }

    public function makePayment(Request $request){

        $input = $request->all();
        $paymentPlan = PaymentPlan::findOrFail($input['payment_plan_id']);

        if($input['amount'] >= $paymentPlan->min && $input['amount'] <= $paymentPlan->max){
            Payment::create([
                'user_id' => Auth::user()->id,
                'payment_plan_id' => $input['payment_plan_id'],
                'amount' => $input['amount'],
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

    public function marketPlace(){

        return view('members.account.market-place.index');
    }

    public function accountSettings(){

        return view('members.account.account-settings');
    }
}
