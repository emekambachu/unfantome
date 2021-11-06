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

        // Will implement this query later
//        $pairing = Pairing::where(function($query) use ($id, $investment){
//            $query->where('payer_payment_id', $id)->where('payer_id', $investment->user_id);
//        })->orWhere(function($query) use ($id, $investment){
//            $query->where('receiver_payment_id', $id)->where('receiver_id', $investment->user_id);
//        });

        $hasActivePairing = $pairing->where(function($query) use ($investment){
            $query->where('payer_id', $investment->user_id)
                ->where('confirm_payment', 1)
                ->where('approved', 0);
        })->orWhere(function($query) use ($id, $investment){
            $query->where('receiver_id', $investment->user_id)
                ->where('confirm_payment', 1)
                ->where('approved', 0);
        })->first();

        $hasInactivePairing = $pairing->where(function($query) use ($investment){
            $query->where('payer_id', $investment->user_id)
                ->where('approved', 0)
                ->where('confirm_payment', 0);
        })->orWhere(function($query) use ($id, $investment){
            $query->where('receiver_id', $investment->user_id)
                ->where('approved', 0)
                ->where('confirm_payment', 0);
        })->first();

        // Will work on this later
        if($hasActivePairing){
            Session::flash('warning', 'Unable to delete, the pairing of this investment is active');
            return redirect()->back();
        }

        if($hasInactivePairing){
            Session::flash('warning', 'The owner of this investment has been paired, delete the pairing before deleting the payment');
            return redirect()->back();
        }

        $investment->delete();

        Session::flash('warning', 'Deleted');
        return redirect()->back();
    }
}
