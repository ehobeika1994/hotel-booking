<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelAddress extends Model
{
    public function hotel()
    {
    	return $this->belongsTo('App\Hotel');
    }
}
