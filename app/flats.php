<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class flats extends Model
{
    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
