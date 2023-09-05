<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static first()
 */
class InvoiceSetting extends Model
{
    protected $fillable = [
        'company_name_ar',
        'company_name_en',
        'location_ar',
        'location_en',
        'po_box',
        'cr_no',
        'vat_no',
        'vat',
    ];
}
