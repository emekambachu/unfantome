<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'referee',
        'referral_code',
        'mode_of_payment',
        'password',
        'password_backup',
        'image',
        'paired',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'verification_token',
        'approved',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payments(){
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }

    public function completedPayments(){
        return $this->hasMany(Payment::class, 'user_id', 'id')
            ->where([
                ['approved', 1],
                ['completed_returns', 1],
            ]);
    }

    public function pendingPayment(){
        return $this->hasOne(Payment::class, 'user_id', 'id')
            ->where([
                ['approved', 0],
                ['completed_returns', 0],
            ]);
    }

    public function expectedReturn(){
        $currentPayment = Payment::where([
            ['user_id', $this->id],
            ['approved', 0],
            ['completed_returns', 0],
        ])->first();

        if(!$currentPayment){
            return 0;
        }

        $paymentPlan = PaymentPlan::findOrFail($currentPayment->payment_plan_id);

        return $currentPayment->amount * ($paymentPlan->percentage/100) + $currentPayment->amount;
    }
}
