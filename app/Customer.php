<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    public function address()
    {
	  return $this->hasOne('App\CustomerAddress');	
    }
    
}
