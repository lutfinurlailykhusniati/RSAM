<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polyclinic extends Model
{
    public function Doctor()
    {
    	return $this->hasMany('App\Doctor');
    }
}
