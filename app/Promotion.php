<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
       protected $fillable = [
        'id',
        'value',
        'is_active',
        'description'
        


    ];
}
