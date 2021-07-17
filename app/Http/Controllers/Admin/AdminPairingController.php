<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pairing;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminPairingController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function pairings(){

        $getUsers = new User();
        $payers = $getUsers->with('pendingPayment')->has('pendingPayment')->get();
        $receivers = $getUsers->with('pendingReturn')->has('pendingReturn')->get();

        $pairings = Pairing::with('payer', 'receiver')->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.account.pairings.index', compact('pairings', 'payers', 'receivers'));
    }

    public function pairUsers(Request $request){

        $input = $request->all();
        $user = new User();

        // if payer was mistakenly made to pay themselves
        if($input['payer_id'] === $input['receiver_id']){
            Session::flash('warning', 'Payer cannot pay themselves');
            return redirect()->back();
        }

        // get pending amount from payer
        $input['amount'] = $user->findOrFail($input['payer_id'])->pendingPayment->amount;

        Pairing::create($input);

        // get payer and receiver details for email
        $payer = $user->findOrFail($input['payer_id']);
        $receiver = $user->findOrFail($input['receiver_id']);

        $data = [
            'payer_name' => $payer->name,
            'payer_email' => $payer->email,
            'payer_mobile' => $payer->mobile,
            'receiver_name' => $receiver->name,
            'receiver_email' => $receiver->email,
            'receiver_mobile' => $payer->mobile,
            'amount' => $input['amount'],
            'time_limit' => $input['time_limit'],
        ];

        // Send Email to payer
        Mail::send('emails.pairings.payer', $data, static function ($message) use ($data) {
            $message->from('info@unfantome.com', 'Unfantome');
            $message->to($data['payer_email'], $data['payer_name']);
            $message->replyTo('info@unfantome.com', 'Unfantome');
            $message->subject('You have been paired, you have'.$data['time_limit'].' to complete payment');
        });

        // Send Email to receiver
        Mail::send('emails.pairings.receiver', $data, static function ($message) use ($data) {
            $message->from('info@unfantome.com', 'Unfantome');
            $message->to($data['receiver_email'], $data['receiver_name']);
            $message->replyTo('info@unfantome.com', 'Unfantome');
            $message->subject('You have been paired to receive '.$data['amount'].' from '.$data['payer_name']);
        });

        Session::flash('success', 'Pairing Complete');
        return redirect()->back();
    }
}
