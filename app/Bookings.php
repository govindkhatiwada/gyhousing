<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    public function user()
    {
        return $this->belongsTo('App\users');
    }
}
