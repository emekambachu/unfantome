<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPaymentPlanController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $paymentPlans = PaymentPlan::all();
        return view('admin.account.payment-plans.index', compact('paymentPlans'));
    }

    public function storePaymentPlan(Request $request){

        $input = $request->all();

        PaymentPlan::create($input);

        Session::flash('success', 'Created');
        return redirect()->back();
    }

    public function editPaymentPlan($id){

        $plan = PaymentPlan::findOrFail($id);
        return view('admin.account.payment-plans.edit', compact('plan'));
    }

    public function updatePaymentPlan(Request $request, $id){

        $input = $request->except('_token', '_method');

        PaymentPlan::where('id', $id)->update($input);

        Session::flash('success', 'Updated');
        return redirect()->back();
    }

    public function deletePaymentPlan($id){

        PaymentPlan::findOrFail($id)->delete();

        Session::flash('warning', 'Deleted');
        return redirect()->back();
    }
}
