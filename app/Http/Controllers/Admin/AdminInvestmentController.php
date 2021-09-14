<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pairing;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminInvestmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $getPayments = new Payment();

        $data['countInvestments'] = $getPayments->count();
        $data['countCompletedReturns'] = $getPayments->where('completed_returns', 1)->count();
        $data['totalInvestments'] = $getPayments->sum('amount');
        $data['totalCompletedReturns'] = $getPayments->where('completed_returns', 1)->sum('amount');

        $data['investments'] = Payment::with('user')
            ->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.account.investments.index', $data);
    }

    public function delete($id){

        $investment = Payment::with('user')->findOrFail($id);

        $pairing = new Pairing();

        $hasActivePairing = $pairing->where('confirm_payment', 1)
            ->where('payer_id', $investment->user_id)
            ->orWhere('receiver_id', $investment->user_id)->first();

        $hasinactivePairing = $pairing->where('confirm_payment', 0)
            ->where('payer_id', $investment->user_id)
            ->orWhere('receiver_id', $investment->user_id)->first();

        if($hasActivePairing){
            Session::flash('warning', 'Unable to delete, the pairing of this investment is active');
            return redirect()->back();
        }

        if($hasinactivePairing){
            Session::flash('warning', 'The owner of this investment has been paired, delete the pairing before deleting the payment');
            return redirect()->back();
        }

        $investment->delete();

        Session::flash('warning', 'Deleted');
        return redirect()->back();
    }
}
