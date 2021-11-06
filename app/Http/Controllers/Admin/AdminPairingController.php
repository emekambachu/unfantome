<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pairing;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $pairings = Pairing::with('payer', 'receiver')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.account.pairings.index', compact('pairings', 'payers', 'receivers'));
    }

    public function pairUsers(Request $request){

        $input = $request->all();
        $user = new User();
        $payment = new Payment();

        // if payer was mistakenly made to pay themselves
        if($input['payer_id'] === $input['receiver_id']){
            Session::flash('warning', 'Payer cannot pay themselves');
            return redirect()->back();
        }

        // get payer details and update paired to true
        $payer = $user->findOrFail($input['payer_id']);
        $payer->paired = 1; // true
        $payer->save();

        // Get receiver details and update paired to true
        $receiver = $user->findOrFail($input['receiver_id']);
        $receiver->paired = 1; // true
        $receiver->save();

        // Include investment id of pending payment/return to pairing
        $input['payer_payment_id'] = $payer->pendingPayment->id;
        $input['receiver_payment_id'] = $receiver->pendingReturn->id;

        // Get payer and receiver payment information
        $payerPayment = $payment->where('user_id', $input['payer_id'])
            ->where('payment_balance','>', 0)->first();
        $receiverPayment = $payment->where('user_id', $input['receiver_id'])
            ->where('return_balance','>', 0)->first();

        // if the payer's payment_balance is more than the receiver's return_balance, use the receiver's return balance as the pairing amount, else vice versa and debit it from the payer's payment_balance
        if($payerPayment->payment_balance > $receiverPayment->return_balance){

            $input['amount'] = $receiverPayment->return_balance;
            $payerPayment->payment_balance -= $input['amount'];
            $payerPayment->save();
        }else{

            $input['amount'] = $payerPayment->payment_balance;
            $payerPayment->payment_balance -= $input['amount'];
            $payerPayment->save();
        }

        // Deduct the paired amount from the receiver's payment return_balance
        $receiverPayment->return_balance -= $input['amount'];
        $receiverPayment->save();

        Pairing::create($input);

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

    public function delete($id){

        $pairing = Pairing::with('payer', 'receiver')
            ->where('id', $id)->first();

        if(!$pairing){
            Session::flash('warning', 'This pairing does not exist');
            return redirect()->back()->withInput();
        }

        // Update payer paired to 0
        $payer = User::findOrFail($pairing->payer_id);
        $payer->paired = 0;
        $payer->save();

        // Update receiver paired to 0
        $receiver = User::findOrFail($pairing->receiver_id);
        $receiver->paired = 0;
        $receiver->save();

        $payment = new Payment();
        // add the pairing amount back to the payer payment's payment_balance
        $payerPayment = $payment->where('user_id', $pairing->payer_id)->first();
        $payerPayment->payment_balance += $pairing->amount;
        $payerPayment->save();

        // add the pairing amount back to the payer payment's payment_balance
        $receiverPayment = $payment->where('user_id', $pairing->receiver_id)->first();
        $receiverPayment->return_balance += $pairing->amount;
        $receiverPayment->save();

        $pairing->delete();

        Session::flash('warning', 'Deleted');
        return redirect()->back();
    }
}
