<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'customer_name', 'phone', 'email', 'address', 'is_delivered', 'description', 'created_at', 'updated_at'
    ];
    
    public function items() {
        return $this->hasMany('App\OrderDetail');
    }
    
    public function totalQty() {
        return $this->hasMany('App\OrderDetail')->selectRaw('SUM(quantity) AS totalQty')->groupBy('order_id');
    }
    
    public function totalPrice() {
        return $this->hasMany('App\OrderDetail')->selectRaw('SUM(price) AS totalPrice')->groupBy('order_id');
    }
}
