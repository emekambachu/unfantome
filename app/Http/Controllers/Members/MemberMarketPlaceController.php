<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\MarketPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberMarketPlaceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $products = MarketPlace::with('user')->inRandomOrder()->paginate(20);

        return view('members.account.market-place.index', compact('products'));
    }

    public function myProducts(){

        $products = MarketPlace::with('user')->where('user_id', Auth::user()->id)
            ->inRandomOrder()->paginate(20);

        return view('members.account.market-place.index', compact('products'));
    }

    public function create(){

        return view('members.account.market-place.create');
    }

    public function store($id, Request $request){

    }

    public function edit($id){

    }

    public function update($id, Request $request){

    }

    public function destroy($id, Request $request){

    }
}
