<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'parent_id', 'created_at', 'updated_at'
    ];
    
    public function parent() {
        return $this->hasOne('App\Category', 'parent_id', 'id');
    }
    
//    public function categories() {
//        return $this->hasMany('App\Comment', 'parent_id', 'id');
//    }
//    
    public function parentname($parent_id) {
        return $this->parent()->where('parent_id','=', $parent_id)->get();
    }
}
