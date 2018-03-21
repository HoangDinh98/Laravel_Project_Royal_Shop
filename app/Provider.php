<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'id','name','address','email','website','phone', 'is_delete', 'created_at','updated_at'
    ];
}
