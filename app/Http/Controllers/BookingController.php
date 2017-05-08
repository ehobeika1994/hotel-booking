<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Booking;
use App\HotelRoom;
use App\Customer;
use DB;

class BookingController extends Controller
{
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
        return view('manage-bookings.create')->withCustomers($customers)->withRooms($rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
        
        return view('manage-bookings.show')->withBooking($booking);
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

}
