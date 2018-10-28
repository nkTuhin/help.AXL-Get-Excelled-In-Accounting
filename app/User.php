<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function profile() {

        return $this->hasMany('App\Profile');
    }

    public function post() {

        return $this->hasMany('App\Post');
    }

    public function userprofile() {

        return $this->hasMany('App\UserProfile');
    }

    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [

        'current_sign_in_at', 'last_sign_in_at'

    ];
}
