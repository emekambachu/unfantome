<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMarketPlaceController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function marketPlace(){

        return view('admin.account.market-place.index');
    }
}
