<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public function Doctor()
    {
    	return $this->belongsTo('App\Doctor','dokter_id');
    }
}

