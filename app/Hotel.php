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
    
    public function ratings()
    {
	    return $this->hasOne('App\HotelRating');
    }
    
    public function rooms()
    {
	    return $this->hasMany('App\HotelRoom');
    }
    
    public function policies()
    {
	    return $this->hasOne('App\HotelPolicy');
    }

    public function address()
    {
        return $this->hasOne('App\HotelAddress');
    }
}
