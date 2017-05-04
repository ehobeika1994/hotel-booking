<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    public function hotel()
	{
	    return $this->belongsTo('App\Hotel');
	}
	
	public function availabilities()
	{
		return $this->hasOne('App\RoomAvailability');
	}
	
	public function booking()
    {
	   return $this->hasMany('App\Customer');
    }
}
