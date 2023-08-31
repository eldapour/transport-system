<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static first()
 */
class Setting extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'logo',
        'conditions_ar',
        'conditions_en',
        'shipment_price',
    ];
}
