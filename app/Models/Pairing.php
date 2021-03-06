<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pairing extends Model
{
    protected $fillable = [
        'payer_payment_id',
        'receiver_payment_id',
        'payer_id',
        'receiver_id',
        'amount',
        'proof_of_payment',
        'time_limit',
        'confirm_payment',
        'approved',
        'cancelled',
    ];

    public function payer(){
        return $this->belongsTo(User::class, 'payer_id', 'id');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public function payerPayment(){
        return $this->belongsTo(Payment::class, 'payer_payment_id', 'id');
    }

    public function receiverPayment(){
        return $this->belongsTo(Payment::class, 'receiver_payment_id', 'id');
    }
}
