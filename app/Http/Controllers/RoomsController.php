<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use App\Hotel;
use App\HotelRoom;
use Image;
use Purifier;

class RoomsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hotel_id)
    {
	     $hotel = Hotel::find($hotel_id);
        return view('manage-hotels.hotel-rooms.create')->withHotel($hotel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $hotel_id)
    {
        $this->validate($request, array(
	       'room_type' => 'required', 
	       'room_capacity' => 'required',
	       'room_price' => 'required', 
	       'room_facilities' => 'required', 
	       'room_image' => 'required|image'  
        ));
        
        $hotel = Hotel::find($hotel_id);
        $room = new HotelRoom;
        
        $room->hotel()->associate($hotel);
        $room->room_type = $request->room_type;
        $room->room_capacity = $request->room_capacity;
        $room->room_price = $request->room_price;
        $room->room_facilities = $request->room_facilities;
		// Save the cover photo as well
		if ($request->hasFile('room_image'))
		{
			$image = $request->file('room_image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('images/hotel-rooms/' . $filename);
			// Save Image at Location
			Image::make($image)->resize(800, 400)->save($location);
			// save image in database
			$room->room_image = $filename;
		}
		
		$room->save();
		
		Session::flash('success', 'You have added a room');
		
		return redirect()->route('manage-hotels.show', [$hotel->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
