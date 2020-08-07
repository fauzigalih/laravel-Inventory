<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'invoice',
        'name_product',
        'type_product',
        'unit',
        'price',
        'stock_first',
        'stock_in',
        'stock_out',
        'stock_final',
        'image_product',
        'active'
    ];
}
