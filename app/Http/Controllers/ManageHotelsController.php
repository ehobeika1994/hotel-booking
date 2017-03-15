<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Hotel;

use Image;
use Purifier;
use Session;

class ManageHotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $hotels = Hotel::paginate(15);
        return view('manage-hotels.index')->withHotels($hotels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage-hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// validate all hotel fields
		$this->validate($request, array(
			'hotel_name' 		=>	'required|max:255', 
			'hotel_slug'		=>	'required|alpha-dash|min:5|max:255|unique:hotels,hotel_slug', 
			'cover_image' 		=> 	'sometimes|image', 
			'hotel_description'	=>	'required'
		));
		
		// Store hotel information in the database
		$hotel = new Hotel;
		
		$hotel->hotel_name = $request->hotel_name;
		$hotel->hotel_slug = $request->hotel_slug;
		$hotel->hotel_description = Purifier::clean($request->hotel_description);
		
		// Save the cover photo as well
		if ($request->hasFile('cover_image'))
		{
			$image = $request->file('cover_image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('images/cover-images/' . $filename);
			// Save Image at Location
			Image::make($image)->resize(800, 400)->save($location);
			// save image in database
			$hotel->cover_image = $filename;
		}
		
		$hotel->save();
		
		//Redirect message
		Session::flash('success', 'A new hotel has successfully been added to your system!');
		// redirect to another page
		return redirect()->route('manage-hotels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $hotel = Hotel::find($id);
	    
        return view('manage-hotels.show')->withHotel($hotel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('manage-hotels.edit');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$hotel = Hotel::find($id);
		$hotel->facilities()->detach();
		$hotel->delete();
		
		Session::flash('success', 'Hotel Deleted!');
		return redirect()->route('manage-hotels.index');
    }
}
