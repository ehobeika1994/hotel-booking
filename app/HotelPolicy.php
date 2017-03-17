<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelPolicy extends Model
{
    public function hotel()
	{
	    return $this->belongsTo('App\Hotel');
	}
}
