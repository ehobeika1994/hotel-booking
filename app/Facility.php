<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
	public function hotel()
	{
	    return $this->belongsTo('App\Hotel');
	}
}
