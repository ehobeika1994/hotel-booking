<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Hotel;
use App\HotelRating;
use App\HotelPolicy;

use DB;
use Image;
use Purifier;
use Session;
use Storage;

class ManageHotelsController extends Controller
{
	/*public function __construct()
	{
		return $this->middleware('auth');
	}*/
    /**
     * Display a listing of the resource.
     * Paginate to 15 items a page. 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $hotels = Hotel::orderBy('hotel_name', 'asc')->paginate(8);

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
		$hotel->active = false;
		
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
		$rating = array(
			'hotel_id' => $hotel->id,
			'hotel_rating' => $request->hotel_rating
		);
		DB::table('hotel_ratings')->insert($rating);
		
		$policy = array(
			'hotel_id' => $hotel->id
		);
		DB::table('hotel_policies')->insert($policy);
		$address = array(
			'hotel_id' => $hotel->id, 
		);
		DB::table('hotel_addresses')->insert($address);


		//Redirect message
		Session::flash('success', 'A new hotel has successfully been added to the system!');
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
    	$hotel = Hotel::find($id);

        return view('manage-hotels.edit')->withHotel($hotel);
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
    	// validate the data
        $hotel = Hotel::find($id);
        
	    // validate all hotel fields
		$this->validate($request, array(
			'hotel_name' 		=>	'required|max:255', 
			'hotel_slug'		=>	"required|alpha-dash|min:5|max:255|unique:hotels,hotel_slug, $id", 
			'cover_image' 		=> 	'image', 
			'hotel_description'	=>	'required'
		));      
                
        $hotel->hotel_name = $request->hotel_name;
		$hotel->hotel_slug = $request->hotel_slug;
		$hotel->hotel_description = Purifier::clean($request->hotel_description);
		$hotel->active = $request->has('active') ? true : false; 
        
		// Save the cover photo as well
		if ($request->hasFile('cover_image'))
		{
			//add new photo
			$image = $request->file('cover_image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('images/cover-images/' . $filename);
			// Save Image at Location
			Image::make($image)->resize(800, 400)->save($location);
			$oldFileName = $hotel->cover_image;
			//update the databaes
			// save image in database
			$hotel->cover_image = $filename;
			//delete old photo
			Storage::delete($oldFileName);
		}

        
        $hotel->save();
		
		Session::flash('success', 'You have successfully updated ' . $hotel->hotel_name);
        // redirect to another page
		return redirect()->route('manage-hotels.show', $hotel->id);
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
		Storage::delete($hotel->cover_image);
		$hotel->delete();
		
		Session::flash('success', 'Hotel Deleted!');
		return redirect()->route('manage-hotels.index');
    }
    
    public function addHotelRating($id)
    {
	    $hotel = Hotel::find($id);
	    
	    return view('manage-hotels.hotel-rating.index')->withHotel($hotel);
    }
    
    public function storeHotelRating(Request $request, $hotel_id)
    {
	    $this->validate($request, array(
		   'hotel_rating' => 'required' 
	    ));
	    
	    $hotel = Hotel::find($hotel_id);
	    $rating = new HotelRating;
	    
	    $rating->hotel_rating = $request->hotel_rating;
	    $rating->hotel()->associate($hotel);
	    $rating->save();
	    
	    Session::flash('success', 'Successfully rated!');
	    return redirect()->route('manage-hotels.show', [$hotel->id]);
    }
    
    public function updateHotelRating(Request $request, $id, $hotel_id)
    {
	    $this->validate($request, array(
		   'hotel_rating' => 'required' 
	    ));
		$hotel = Hotel::find($hotel_id);
	    $rating = HotelRating::find($id);
	    
	    $rating->hotel_rating = $request->hotel_rating;
	    $rating->save();
	    
	    Session::flash('success', 'Successfully updated!');
	    return redirect()->route('manage-hotels.show', [$hotel->id]);
    }
    
    public function addHotelPolicy($hotel_id)
    {
		$hotel = Hotel::find($hotel_id);
		
		return view('manage-hotels.hotel-policies.create')->withHotel($hotel);
    }
    
    public function storeHotelPolicy(Request $request, $hotel_id)
    {
	    $this->validate($request, array(
		   'check_in' => 'required', 
		   'check_out' => 'required', 
		   'cancellation' => 'required', 
		   'children_beds' => 'required', 
		   'pets' => 'required', 
		   'groups' => 'required', 
		   'payment' => 'required' 
	    ));
	    
		$hotel = Hotel::find($hotel_id);
		$policy = new HotelPolicy;
		
		$policy->hotel()->associate($hotel);
		$policy->check_in = $request->check_in;
		$policy->check_out = $request->check_out;
		$policy->cancellation = $request->cancellation;
		$policy->children_beds = $request->children_beds;
		$policy->pets = $request->pets; 
		$policy->groups = $request->groups;
		$policy->payment = $request->payment;
		
		$policy->save();
		
		Session::flash('success', 'Successfully added policy!');
		return redirect()->route('manage-hotels.show', [$hotel->id]);
    }

     public function updateHotelPolicy(Request $request, $id, $hotel_id)
    {
	   	$this->validate($request, array(
		   'check_in' => 'required', 
		   'check_out' => 'required', 
		   'cancellation' => 'required', 
		   'children_beds' => 'required', 
		   'pets' => 'required', 
		   'groups' => 'required', 
		   'payment' => 'required' 
	    ));

		$hotel = Hotel::find($hotel_id);
		$policy = HotelPolicy::find($id);
		
		$policy->hotel()->associate($hotel);
		$policy->check_in = $request->check_in;
		$policy->check_out = $request->check_out;
		$policy->cancellation = $request->cancellation;
		$policy->children_beds = $request->children_beds;
		$policy->pets = $request->pets; 
		$policy->groups = $request->groups;
		$policy->payment = $request->payment;
		
		$policy->save();
		
		Session::flash('success', 'Successfully update policy!');
		return redirect()->route('manage-hotels.show', [$hotel->id]);
    }
}
