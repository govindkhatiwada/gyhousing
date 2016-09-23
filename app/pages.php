<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
