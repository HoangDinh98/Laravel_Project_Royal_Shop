<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name', 'phone', 'email', 'address', 'description', 'created_at', 'updated_at'
    ];
}
