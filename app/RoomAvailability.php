<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomAvailability extends Model
{
    public function room() 
    {
	    return $this->belongsTo('App\HotelRoom');
    }
}
