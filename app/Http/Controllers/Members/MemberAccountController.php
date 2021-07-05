<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard(){

        return view('members.account.dashboard');
    }

    public function makePayment(){

        return view('members.account.make-payment');
    }

    public function marketPlace(){

        return view('members.account.market-place.index');
    }

    public function accountSetting(){

        return view('members.account.account-settings');
    }
}
