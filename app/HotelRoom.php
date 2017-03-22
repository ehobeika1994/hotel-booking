<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model
{
    public function hotel()
	{
	    return $this->belongsTo('App\Hotel');
	}
}
