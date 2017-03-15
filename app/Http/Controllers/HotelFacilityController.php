<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Facility;
use App\Hotel;
use Session;

class HotelFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
	    $hotel = Hotel::find($id);
	    $facilities = Facility::all();
	    
        return view('manage-hotels.hotel-facilities.index')->withHotel($hotel)->withFacilities($facilities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $hotel_id)
    {
        //validate input fields
        $this->validate($request, array(
	       'hotel_facility' => 'required'
        ));
        
        $hotel = Hotel::find($hotel_id);
        $facility = new Facility();
        
        $facility->hotel_facility = $request->hotel_facility;
        $facility->hotel()->associate($hotel);
        $facility->save();
        
        //Redirect if success
        Session::flash('success', 'A new facility has been added!');
        
        //redirect to hotel
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
