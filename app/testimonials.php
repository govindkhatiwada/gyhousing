<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class testimonials extends Model
{
    public function user()
    {
        return $this->belongsTo('App\user');
    }

}
