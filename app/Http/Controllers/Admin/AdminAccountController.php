<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentPlan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function dashboard(){

        $getUsers = new User();
        $getPayments = new Payment();

        $users = $getUsers->limit(20)->orderBy('created_at', 'desc')->get();
        $count['users'] = $getUsers->count();
        $count['verified-users'] = $getUsers->count();

        $payments = $getPayments->limit(20)->orderBy('created_at', 'desc')->get();
        $count['payments'] = $getPayments->count();
        $count['completed-payments'] = $getPayments->where('completed_returns', 1)->count();

        return view('admin.account.dashboard', compact('users', 'count', 'payments'));
    }

    public function manageUsers(){
        return view('admin.account.manage-users');
    }

    public function approveUser($id){

    }

    public function deleteUser($id){

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
