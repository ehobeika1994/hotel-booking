<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Booking;
use App\HotelRoom;
use App\Hotel;
use App\Customer;
use DB;
use Response;
use Carbon\Carbon;
use Session;

class HomeController extends Controller
{
    public function homePage() 
    {
	    $hotels = Hotel::orderby('id', 'desc')->take(6)->get();
	    
	    //$price = DB::table('hotel_rooms')->join('hotels', 'hotel_rooms.hotel_id', '=', 'hotels.id')->select('hotel_rooms.room_price')->get();
	    return view('webpage.index')->withHotels($hotels);
    }
    
    public function searchHotels(Request $request)
    {
	    $this->validate($request, array(
		   'search_control' => 'required',
	       'from_date' => 'required', 
	       'till_date' => 'required'
        ));
        
	    $hotel_name = $request->search_control;
	    $hotel = Hotel::where('hotel_name', $hotel_name)->first();
	    $from_date = $request->from_date;
	    $till_date = $request->till_date;
	    $adults = $request->adults;
	    $children = $request->children;
 
	    //var_dump($hotel->id, $from_date, $till_date);
	    
	    $from = Carbon::parse($from_date);
        $to = Carbon::parse($till_date);
        $len = $to->diffInDays($from);
	    
	    return view('webpage.search', [
		   	'hotel' => $hotel, 
		   	'from_date' => $from_date,
		   	'till_date' => $till_date,
		   	'duration' => $len,
		   	'adults' => $adults,
		   	'children' => $children
	    ]);
    }
}
