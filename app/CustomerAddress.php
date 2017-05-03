<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerAddress extends Model
{
    public function customers()
    {
	    return $this->belongsTo('App\Customer');
    }	
    
    public function customer()
    {
	    return $this->belongsTo('App\Customer');
    }	
    
    public function countries()
    {
	    return $this->belongsTo('App\Country', 'country_id');
    }
}
