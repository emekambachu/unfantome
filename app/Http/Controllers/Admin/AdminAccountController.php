<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentPlan;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    public function dashboard(){

    }

    public function makePayment(Request $request){

    }

    public function paymentPlans(){

        return view('admin.account.payment-plans.index');
    }

    public function pairings(){

        return view('admin.account.pairings.index');
    }

    public function marketPlace(){

        return view('admin.account.market-place.index');
    }
}
