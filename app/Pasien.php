<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    public function Booking()
    {
    	return $this->hasMany('App\Booking');
    }
}
