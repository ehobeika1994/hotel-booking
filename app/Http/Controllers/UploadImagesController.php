<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use Session;
use Image;

use App\Hotel;
use App\HotelImage;

class UploadImagesController extends Controller
{
    /*public function __construct()
    {
        return $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
	    $hotel = Hotel::find($id);
	    
        return view('manage-hotels.upload-images.index')->withHotel($hotel);
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
        $this->validate($request, array(
	       'hotel_image' => 'sometimes|image|max:25000' 
        ));
        
        $hotel = Hotel::find($hotel_id);
        $hotelImage = new HotelImage;
        $hotelImage->hotel()->associate($hotel);
		
		// Save the cover photo as well
		if ($request->hasFile('hotel_image'))
		{
			$image = $request->file('hotel_image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('images/hotel-images/' . $filename);
			// Save Image at Location
			Image::make($image)->resize(800, 400)->save($location);
			// save image in database
			$hotelImage->hotel_image = $filename;
		}
		
		$hotelImage->save();		
        
        Session::flash('success', 'Image Added');
        // redirect to another page
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
