<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwals extends Model
{
     public function Doctor()
    {
    	return $this->belongsTo('App\Doctor','dokter_id');
    }

    public function Booking()
	{
		return $this->hasMany('App\Booking');
	}

	public function Hari_jadwal()
	{
		return $this->hasMany('App\Hari_jadwal','id_jadwal');
	}
}
