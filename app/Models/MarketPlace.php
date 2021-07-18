<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketPlace extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'image',
        'image_two',
        'image_three',
        'approved',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
