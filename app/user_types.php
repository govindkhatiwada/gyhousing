<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_types extends Model
{
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
