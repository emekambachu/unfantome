<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'payment_plan_id',
        'amount',
        'payment_balance',
        'return_balance',
        'approved',
        'completed_payments',
        'completed_returns'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paymentPlan(){
        return $this->belongsTo(PaymentPlan::class, 'payment_plan_id', 'id');
    }

    public function payerPairings(){
        return $this->hasMany(Pairing::class, 'payer_payment_id', 'id');
    }

    public function receiverPairings(){
        return $this->hasMany(Pairing::class, 'receiver_payment_id', 'id');
    }
}
