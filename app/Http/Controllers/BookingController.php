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

class BookingController extends Controller
{
	public function dashboard()
    {
	    $bookings = Booking::where('active_booking','=','1')->count();
	    $inactive = Booking::where('active_booking','=','0')->count();
	    $hotels = Hotel::all();
        return view('dashboard')->withBookings($bookings)->withHotels($hotels)->withInactive($inactive);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate(10);
        return view('manage-bookings.index')->withBookings($bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $customers = Customer::all();
	    $rooms = HotelRoom::all();
	    $hotels = Hotel::all();
        return view('manage-bookings.create')->withCustomers($customers)->withRooms($rooms)->withHotels($hotels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
	       'from_date' => 'required', 
	       'till_date' => 'required', 
	       'customer_id' => 'required', 
	       'room_id' => 'required', 
	       'number_of_rooms' => 'required', 
	       'number_of_adults' => 'required', 
	       'number_of_children' => 'required', 
	       'total_price' => 'required'
        ));
        
        $booking = new Booking;
        
        $booking->booking_number = 'GB' . $this->generate_booking_number();
        $booking->user_id = 1; 
        $booking->customer_id = $request->customer_id;
        $booking->hotel_room_id = $request->room_id; 
        $booking->from_date = $request->from_date;
        $booking->till_date = $request->till_date;
        $booking->room_price = $request->total_price;
        $booking->number_of_rooms = $request->number_of_rooms;
        $booking->number_of_adults = $request->number_of_adults;
        $booking->number_of_children = $request->number_of_children;
        $booking->active_booking = 1;
        
		$booking->save();
				
		Session::flash('success', 'You have successfully created a booking');
		
		return redirect()->route('manage-bookings.index');
    }

	public function generate_booking_number() 
	{
	    $rand = rand(100000, 999999);
	    return $rand;
	}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        
        $from = Carbon::parse($booking->from_date);
        $to = Carbon::parse($booking->till_date);
        $len = $to->diffInDays($from);
        
        $total = ($booking->room_price * $len);
        
        return view('manage-bookings.show')->withBooking($booking)->withLength($len)->withTotal($total);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function activateBooking($id)
    {
	    $booking = Booking::find($id);
	    $booking->active_booking = true; 
	    $booking->save();
	    
	    return redirect()->route('manage-bookings.show', [$booking->id]);
    }
    
    public function disableBooking($id)
    {
	    $booking = Booking::find($id);
	    $booking->active_booking = false; 
	    $booking->save();
	    
	    return redirect()->route('manage-bookings.show', [$booking->id]);
    }
    
    public function selectAjax(Request $request)
    {
    	$hotel_id = Input::get('hotel_id');
    	
    	$rooms = HotelRoom::where('hotel_id', '=', $hotel_id)->get();
    	
    	return Response::json($rooms);
    }

}
