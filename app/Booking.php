<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function Jadwal()
    {
    	return $this->belongsTo('App\Jadwals','id_jadwal');
    }

    public function Pasien()
    {
    	return $this->belongsTo('App\Pasien','id_pasien');
    }

   
}
