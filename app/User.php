<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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


    //defining relation
    public function user_types(){
        return $this->belongsTo('App\user_types');
    }

    public function pages(){
        return $this->hasMany('App\pages');
    }

    public function lands(){
        return $this->hasMany('App\lands');
    }

    public function houses(){
        return $this->hasMany('App\houses');
    }

    public function flats(){
        return $this->hasMany('App\flats');
    }

    public function banners(){
        return $this->hasMany('App\banners');
    }

    public function plotings(){
        return $this->hasMany('App\plotings');
    }
    public function ploting_details(){
        return $this->hasMany('App\ploting_details');
    }
    public function bookings(){
        return $this->hasMany('App\bookings');
    }
}