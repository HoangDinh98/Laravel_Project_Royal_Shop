<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'email',
        'content',
        'created_at', 
        'updated_at'
        
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
