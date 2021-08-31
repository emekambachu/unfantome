<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isTrue;

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
        'account_number',
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
            ->where('approved', 1);
    }

    public function completedReturns(){
        return $this->hasMany(Payment::class, 'user_id', 'id')
            ->where('completed_returns', 1);
    }

    public function pendingPayment(){
        return $this->hasOne(Payment::class, 'user_id', 'id')
            ->where([
                ['payment_balance','>', 0],
            ]);
    }

    public function pendingReturn(){
        return $this->hasOne(Payment::class, 'user_id', 'id')
            ->where([
                ['return_balance','>', 0],
//                ['withdraw_request', 1],
            ]);
    }

    public function expectedReturn(){
        $currentPayment = Payment::where([
            ['user_id', $this->id],
            ['completed_returns', 0],
        ])->first();

        if($currentPayment !== null){
            $paymentPlan = PaymentPlan::findOrFail($currentPayment->payment_plan_id);
            $expectedReturn = $currentPayment->amount * ($paymentPlan->percentage/100) + $currentPayment->amount;
        }else{
            $paymentPlan = 0;
            $expectedReturn = 0;
        }

        return $expectedReturn;
    }
}
