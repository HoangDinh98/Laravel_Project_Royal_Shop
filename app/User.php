<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role_id', 'is_active', 'is_confirmed', 'confirm_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function role() {
        return $this->belongsTo('App\Role');
    }
    
    public function photos() {
        return $this->hasMany('App\Photo');
    }
    
    public function avatar() {
        return $this->photos()->where('is_thumbnail', 1)->first();
    }
    
    public function orders() {
        return $this->hasMany('App\Order');
    }
    
    public function orderslimit ($limited) {
        return $this->hasMany('App\Order')->orderBy('created_at', 'desc')->limit($limited)->get();
//        return $this->hasMany('App\Order')->take($limited)->get();
    }
}
