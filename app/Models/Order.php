<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'from_warehouse',
        'to_warehouse',
        'weight',
        'qty',
        'type',
        'value',
        'status',
        'description'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function orderDetails()
    {
        return $this->hasMany(Offer::class,'order_id','id');
    }

    public function from_warehouse_place(): BelongsTo{

        return $this->belongsTo(Warehouse::class,'from_warehouse','id');
    }

    public function to_warehouse_place(): BelongsTo{

        return $this->belongsTo(Warehouse::class,'to_warehouse','id');
    }
}
