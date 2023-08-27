<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'image',
        'phone',
        'city_id',
        'type',
        'status',
    ];

    public function city(): BelongsTo
    {
       return $this->belongsTo(City::class,'city_id','id');
    }
}
