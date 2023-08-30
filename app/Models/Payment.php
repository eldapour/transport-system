<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [

        'payment_id',
        'user_id',
        'order_id',
        'currency',
        'amount',
        'status'
    ];
}
