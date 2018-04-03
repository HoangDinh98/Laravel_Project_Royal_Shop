<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'original_price', 'price', 'created_at', 'updated_at'
    ];
}
