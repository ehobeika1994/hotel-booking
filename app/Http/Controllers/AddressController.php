<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use App\Hotel;
use App\HotelAddress;

class AddressController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hotel_id)
    {
	     $hotel = Hotel::find($hotel_id);
        return view('manage-hotels.hotel-address.create')->withHotel($hotel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $id, $hotel_id)
    {
	   	/*$this->validate($request, array(
		   'check_in' => 'required', 
		   'check_out' => 'required', 
		   'cancellation' => 'required', 
		   'children_beds' => 'required', 
		   'pets' => 'required', 
		   'groups' => 'required', 
		   'payment' => 'required' 
	    ));*/

		$hotel = Hotel::find($hotel_id);
        $address = HotelAddress::find($id);
        
        $address->hotel()->associate($hotel);
        $address->hotel_address = $request->hotel_address;
        $address->hotel_phone_number = $request->hotel_phone_number;
        $address->hotel_email_address = $request->hotel_email_address;
        $address->hotel_website = $request->hotel_website;
        $address->longitude = $request->longitude;
        $address->latitude = $request->latitude;
        $address->save();
		
		Session::flash('success', 'Successfully updated hotel addrerss!');
		return redirect()->route('manage-hotels.show', [$hotel->id]);
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

}
