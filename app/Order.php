<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name', 'phone', 'email', 'address', 'is_delivered', 'description', 'created_at', 'updated_at'
    ];
    
    public function items() {
        return $this->hasMany('App\OrderDetail');
    }
}
