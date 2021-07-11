<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pairing extends Model
{
    protected $fillable = [
        'payer_id',
        'receiver_id',
        'amount',
        'proof_of_payment',
        'approved',
    ];

    public function payer(){
        return $this->belongsTo(User::class, 'payer_id', 'id');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
