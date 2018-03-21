<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'product_id',
        'path',
        'user_id',
        'is_thumbnail',
        'is_delete',
        'created_at',
        'updated_at'
    ];
    public function product(){

        return $this->belongsTo('App\Product');

    }
    
      public function user(){

        return $this->belongsTo('App\User');

    }
}
