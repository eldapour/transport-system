<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
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
        'user_type',
        'status'

    ];

    public function city(): BelongsTo
    {
       return $this->belongsTo(City::class,'city_id','id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
       return [];
    }
}
