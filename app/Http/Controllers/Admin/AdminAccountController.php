<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Pairing;
use App\Models\Payment;
use App\Models\PaymentPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

        $payers = $getUsers->with('pendingPayment')->has('pendingPayment')->get();
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

    public function approveUser($id){

    }

    public function deleteUser($id){

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
