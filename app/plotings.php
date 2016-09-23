<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class plotings extends Model
{
    //defining relation

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function ploting_details(){
        return $this->hasMany('App\ploting_details');
    }
}
