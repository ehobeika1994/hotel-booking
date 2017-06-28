@extends('web')

@section('title', 'Home Page')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
	{!! Html::style('css/livesearch.css') !!}

@endsection

@section('content')

<header id="home">
        <div class="header-content">
            <div class="header-content-inner">
	            {!! Form::open(array('route' => 'search.hotel')) !!}
		            <div class="form-group">
			            <label for="search_hotel" style="color: black">Search Hotel</label>
						<input type="text" class="form-control" id="search_hotel" name="search_control" list="json-datalist" placeholder="Senegambia Beach Hotel">
						<datalist id="json-datalist"></datalist>
		            </div>
		            <div class="form-group">
			            <label for="check-in" style="color: black">Check In</label>
			            <input type="text" name="from_date" id="from_date" class="form-control">
			            &nbsp;
			            <label for="check-out" style="color: black">Check Out</label>
			            <input type="text" name="till_date" id="till_date" class="form-control">
			            <div id="output_days"></div>
			            <label for="adults" style="color: black">Number Of Adults</label>
			            <select class="form-control" name="adults">
				            <option value="1">1</option>
				            <option value="2">2</option>
				            <option value="3">3</option>
				            <option value="4">4</option>
			            </select>
			            <label for="child" style="color: black">Number Of Children</label>
			            <select class="form-control" name="children">
				            <option value="1">1</option>
				            <option value="2">2</option>
				            <option value="3">3</option>
				            <option value="4">4</option>
			            </select>
			            
		            </div>
		            <div class="form-group">
			            <input type="submit" class="btn btn-default" value="Search Now!">
		            </div>
	            {!! Form::close() !!}
            </div>
        </div>
    </header>
    
    <section class="bg-hot-deals" id="hotel-deals">
	    <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Hotel Deals!</h2>
                    <hr class="light">
                    <p class="text-faded">Check out our hottest deals. Hurry up and book.</p>
                </div>
            </div>
        </div>

        <div class="container-fluid">
	       
            <div class="row no-gutter">
	             @foreach($hotels as $hotel)
	             @if($hotel->active == 1)
                <div class="col-lg-4 col-sm-6">
                    <a href="{{$hotel->hotel_slug }}" class="portfolio-box">
                        <img src="/images/cover-images/{{ $hotel->cover_image}}" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                   	{{ $hotel->hotel_name }}
                                </div>
                                <div class="project-name">
									Room starts from $20/night
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-primary" id="manage-booking">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Manage Booking!</h2>
                    <hr class="light">
                    <p class="text-faded">You can manage your booking online.</p>
					<form class="form-horizontal">
						<div class="form-group">
							<label for="surname" class="col-sm-2 control-label">Surname:</label>
							<div class="col-sm-10">
								<input id="surname" type="text" class="form-control" name="surname" placeholder="enter your surname">
							</div>
						</div>
						<div class="form-group">
							<label for="booking-reference" class="col-sm-2 control-label">Booking Reference:</label>
							<div class="col-sm-10">
								<input id="booking_reference" type="text" class="form-control" name="booking_reference" placeholder="enter your reference number">
							</div>
						</div>
						<div class="form-group">
							<input class="btn btn-default" type="submit" value="Submit"> 
						</div>
					</form>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Manage Your Account!</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3><a href="login.php">Login!</a></h3>
                        <p class="text-muted">When a customers exists on our database, they can check their responsive account activity!</p>
                    </div>
                </div>
                <div class="col-xs-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3><a href="register.php">Register!</a></h3>
                        <p class="text-muted">Register now and enjoy our amazing holidays deals online with a responsive account!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Contact Us!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>+220 2277755</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">info@gambiabeds.com</a></p>
                </div>
            </div>
            <form class="form-horizontal">
                	<div class="form-group">
	                	<label for="full_name" class="col-sm-2 control-label">Full Name:</label>
	                	<div class="col-sm-10">
		                	<input type="text" class="form-control" placeholder="full name">
	                	</div>
                	</div>
                	
                	<div class="form-group">
	                	<label for="email" class="col-sm-2 control-label">Email:</label>
	                	<div class="col-sm-10">
		                	<input type="email" class="form-control" placeholder="email@example.com">
	                	</div>
                	</div>
                	
                	<div class="form-group">
	                	<label for="mobile-number" class="col-sm-2 control-label">Mobile Number:</label>
	                	<div class="col-sm-10">
		                	<input type="text" class="form-control" placeholder="+44 7123321123">
	                	</div>
                	</div>
                	
                	<div class="form-group">
	                	<label for="subject" class="col-sm-2 control-label">Reason Of Contact:</label>
	                	<div class="col-sm-10">
		                	<input type="text" class="form-control" placeholder="example: Hot Deals, Manage Booking, Make Booking">
	                	</div>
                	</div>
                	
                	<div class="form-group">
	                	<label for="subject" class="col-sm-2 control-label">Message:</label>
	                	<div class="col-sm-10">
		                	<textarea class="form-control" rows="3"></textarea>
	                	</div>
                	</div>
                	
					<div class="form-group">
	                	<input class="btn btn-default" type="submit" value="Contact Us">
					</div>
                </form>
        </div>
    </section>


@endsection

@section('scripts')

<script>

var dateToday = new Date();

$("#from_date").datepicker({ dateFormat: 'yy-mm-dd' }); 
	$("#till_date").datepicker({
		dateFormat: 'yy-mm-dd',
      	onSelect: function () {
      		myfunc();
		}
	}); 
      
    function myfunc(){
		var start= $("#from_date").datepicker("getDate");
    	var end= $("#till_date").datepicker("getDate");
   		days = (end- start) / (1000 * 60 * 60 * 24);
   		console.log(Math.round(days));
   		$('#total_days').attr('value', Math.round(days));
   		$('#output_days').html('You are looking at booking a room for <b>' + Math.round(days) + '</b> days.');
    }

// Get the <datalist> and <input> elements.
var dataList = document.getElementById('json-datalist');
var input = document.getElementById('search_hotel');

// Create a new XMLHttpRequest.
var request = new XMLHttpRequest();

// Handle state changes for the request.
request.onreadystatechange = function(response) {
  if (request.readyState === 4) {
    if (request.status === 200) {
      // Parse the JSON
      var jsonOptions = JSON.parse(request.responseText);
  
      // Loop over the JSON array.
      jsonOptions.forEach(function(item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.
        //option.id = item.id;
        option.value = item.hotel_name;
        //console.log(item.hotel_name);
        // Add the <option> element to the <datalist>.
        dataList.appendChild(option);
      });
      
      // Update the placeholder text.
      input.placeholder = "hotel name...";
    } else {
      // An error occured :(
      input.placeholder = "Couldn't load datalist options :(";
    }
  }
};

// Update the placeholder text.
input.placeholder = "Loading options...";

// Set up and make the request.
request.open('GET', 'http://localhost:8000/hotels', true);
request.send();


</script>

@endsection