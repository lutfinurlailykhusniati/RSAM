<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
	
    public function  Polyclinic()
    {
    	return $this->belongsTo('App\Polyclinic','poliklinik_id');
    }

    public function Jadwals()
	{
		return $this->hasMany('App\Jadwals');
	}
}


