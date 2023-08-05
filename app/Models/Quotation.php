<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;


    protected $fillable = [
        'unique_key',
        'quotation_number',
        'date',
        'time',
        'customer_id',
        'sub_total',
        'discount_price',
        'final_amount',
        'extracost_amount',
        'grand_total',
        'paid_amount',
        'balance_amount',
        'add_on_note',
        'soft_delete'
    ];
}
