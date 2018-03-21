<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'category_id',
        'provider_id',
        'promotion_id',
        'name',
        'quantity',
        'weight',
        'price',
        'is_delete',
        'description'

    ];
    
     public function category(){

        return $this->belongsTo('App\Category');

    }
     public function provider(){

        return $this->belongsTo('App\Provider');

    }
     public function promotion(){

        return $this->belongsTo('App\Promotion');

    }
    
    public function photos(){
        return $this->hasMany('App\Photo');
    }
    
    public function thumbnail() {
        return $this->photos()->where([['is_thumbnail', 1],['is_delete', 0]])->get()->last();

    }
}
