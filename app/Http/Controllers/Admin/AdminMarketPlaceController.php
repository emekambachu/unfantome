<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarketPlace;
use Illuminate\Http\Request;

class AdminMarketPlaceController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function marketPlace(){

        $products = MarketPlace::with('user')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.account.market-place.index', compact('products'));
    }

    public function approve(){

        $products = MarketPlace::with('user')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.account.market-place.index', compact('products'));
    }
}
