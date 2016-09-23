<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ploting_details extends Model
{
    //defining relation

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function plotings(){
        return $this->belongsTo('App\plotings');
    }
}
