<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'bill_product_id',
        'bill_width',
        'bill_height',
        'bill_qty',
        'bill_quantity',
        'bill_rateper_quantity',
        'bill_product_total',
        'soft_delete'
    ];
}
