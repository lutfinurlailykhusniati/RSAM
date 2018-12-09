<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    public function Jadwals()
    {
    	return $this->belongsTo('App\Jadwals','jadwal_id');
    }

    public function Pasien()
    {
    	return $this->belongsTo('App\Pasien','pasien_id');
    }
}
