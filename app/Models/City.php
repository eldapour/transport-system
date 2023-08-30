<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static select(string $string)
 */
class City extends Model
{

    protected $fillable = [
        'name_ar',
        'name_en'
    ];

}
