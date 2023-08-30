<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Warehouse extends Model
{

    protected $fillable = [
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'city_id',
        'lan',
        'lat',
    ];
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

}
