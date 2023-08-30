<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'driver_id',
        'order_id',
        'date',
        'price',
        'status'

    ];


    public function driver(): BelongsTo
    {
     return $this->belongsTo(User::class,'driver_id','id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
