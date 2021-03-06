<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Storage;
use App\Customer;
use App\CustomerAddress;
use App\Country;
use Activity;
use Carbon\Carbon;

class CustomerController extends Controller
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
	    $customers = Customer::orderBy('last_name', 'asc')->paginate(25);
	    // Find latest users
		$activities = Activity::guests()->get(); 
	    
        return view('manage-customers.index')->withCustomers($customers)->withActivities($activities);
    }
    
    protected function createSession($time = null)
	{
		$activity = new Activity;
		$activity->last_activity = (is_null($time)) ? time() : $time;
		$activity->save();
		return $activity;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $countries = Country::all();
        return view('manage-customers.create')->withCountries($countries);
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
			'title'				=> 'required',
			'first_name'		=> 'required|max:255', 
			'last_name'			=> 'required|max:255',
			'gender'			=> 'required',
			'birthday'			=> 'required',
			'phone_number' 		=> 'required',
			'email_address' 	=> 'required|unique:customers',
			'password'			=> 'required|min:6',
			'address_line_1'	=> 'required|max:255', 
			'city'				=> 'required|max:255',
			'zip_code'	 		=>	'required|max:255',
			'country_id'		=> 'required'
		));
		
		//store new customers
		$customer = new Customer;
		
		$customer->membership_number = $this->generateBarcodeNumber();
		$customer->title = $request->title;
		$customer->first_name = $request->first_name;
		$customer->last_name = $request->last_name;
		$customer->gender = $request->gender;
		$customer->birthday = $request->birthday;
		$customer->phone_number = $request->phone_number;
		$customer->email_address = $request->email_address;
		$customer->password = bcrypt($request->password);
		$customer->active = false;
		
		$customer->save();
		
		$customer_address = array(
			'customer_id' 	 => $customer->id,
			'address_line_1' => $request->address_line_1,
			'address_line_2' => $request->address_line_2, 
			'address_line_3' => $request->address_line_3, 
			'city'			 => $request->city,
			'zip_code'		 => $request->zip_code,
			'country_id'	 => $request->country_id,
			'updated_at' 	 => date('Y-m-d H:i:s')
		);	
		DB::table('customer_addresses')->insert($customer_address);
		
		//Redirect message
		Session::flash('success', 'A new customer has successfully been added to the system!');
		// redirect to another page
		return redirect()->route('manage-customer.index');
    }
    
	public function generateBarcodeNumber() 
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
        $customer = Customer::find($id);
        return view('manage-customers.show')->withCustomer($customer);
    }
    
    public function activateCustomer($id)
    {
	    $customer = Customer::find($id);
	    $customer->active = true; 
	    $customer->save();
	    
	    return redirect()->route('manage-customer.show', [$customer->id]);
    }
    
    public function disableCustomer($id)
    {
	    $customer = Customer::find($id);
	    $customer->active = false; 
	    $customer->save();
	    
	    return redirect()->route('manage-customer.show', [$customer->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('manage-customers.edit', [$customer->id])->withCustomer($customer);
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
        $customer = Customer::find($id);
       
		$customer->first_name = $request->first_name;
		$customer->last_name = $request->last_name;
		$customer->gender = $request->gender;
		$customer->birthday = $request->birthday;
		$customer->phone_number = $request->phone_number;
		$customer->email_address = $request->email_address;
		//$hotel->active = $request->has('active') ? true : false; 
                
        $customer->save();
		
		Session::flash('success', 'You have successfully updated ' . $customer->first_name);
        // redirect to another page
		return redirect()->route('manage-customer.show', $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function destroy($id)
    {	
		Session::flash('success', 'Customer Deleted!');
		return redirect()->route('manage-customer.index');
    }
    
    public function editAddress($id)
    {
		$customer = Customer::findOrFail($id);
		
	    return view('manage-customers.editAddress', [$customer->id])->withCustomer($customer);
    }
    
    public function updateAddress(Request $request, $id, $customer_id)
    {	
		$customer = Customer::find($customer_id);
		$address = CustomerAddress::find($id);
		
		$address->customer()->associate($customer);
		$address->address_line_1 = $request->address_line_1; 
		$address->address_line_2 = $request->address_line_2; 
		$address->address_line_3 = $request->address_line_3; 
		$address->city = $request->city; 
		$address->zip_code = $request->zip_code; 
		$address->country_id = $request->country_id; 
		
		$address->save();
		
		Session::flash('success', 'Successfully update policy!');
		return redirect()->route('manage-customer.show', [$customer->id]);

    }
}
