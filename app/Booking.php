<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function customer()
    {
	   return $this->belongsTo('App\Customer');
    }
    
    public function user()
    {
	    return $this->belongsTo('App\User');
    }
    
    public function room()
    {
	    return $this->belongsTo('App\HotelRoom', 'hotel_room_id');
    }
}
