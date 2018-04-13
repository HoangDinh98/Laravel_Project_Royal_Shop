<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'parent_id',
        'content',
        'status',
        'created_at', 
        'updated_at'
        
    ];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function product() {
        return $this->belongsTo('App\Product');
}
    
    public function parentComment() {
        return $this->belongsTo('App\Comment', 'id', 'parent_id');
    }
}
