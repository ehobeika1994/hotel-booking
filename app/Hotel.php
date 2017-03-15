<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
	public function facilities()
	{
    	return $this->hasMany('App\Facility');
    }
    
    public function images()
	{
    	return $this->hasMany('App\HotelImage');
    }
}
