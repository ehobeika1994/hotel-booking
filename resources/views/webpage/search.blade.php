@extends('web')

@section('title', 'Search Hotel')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $hotel->hotel_name }}</h1>
			@if($hotel->ratings->hotel_rating == 1)
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			@endif
			@if($hotel->ratings->hotel_rating == 2)
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			@endif
			@if($hotel->ratings->hotel_rating == 3)
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			@endif
			@if($hotel->ratings->hotel_rating == 4)
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			@endif
			@if($hotel->ratings->hotel_rating == 5)
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			<span style="font-size:2.5em;" class="glyphicon glyphicon-star"></span>
			@endif
			<hr>
			
			@foreach($hotel->images as $image)
					<div class="active item"> <!-- item 1 -->
						<img width="740" src="{{ asset('images/hotel-images/' . $image->hotel_image) }}" />
					</div> <!-- end item -->
					@endforeach
                <hr>
			<p>{!! $hotel->hotel_description !!}</p>
<hr>
			<h4>Hotel Facilities</h4>
	        @forelse($hotel->facilities as $facility)
				<li>{{ $facility->hotel_facility }}</li>
				@empty
					<li><b>No Facilities available! Add them!</b></li>
				@endforelse
           			<br>
           			<hr>
				@forelse($hotel->rooms as $room)
					<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="{{ asset('images/hotel-rooms/' . $room->room_image) }}" alt="">
                            <div class="caption">
                                <h4 class="pull-right">${{ $room->room_price }}</h4>
                                <h4><a href="#">{{ $room->room_type }}</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">12 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
	
	@empty
	<ul>
		<li><b>No Rooms! Add them!</b></li>
	</ul>
@endforelse

		</div>
		
		<div class="col-md-4">
			<div class="well" style="background-color: #FFD614; margin-top: 64px; text-align: right">
				<hr>
				<p>Check In: <b>{{ Carbon\Carbon::parse($from_date)->format('D d M Y') }}</b> <br> Check Out: <b>{{ Carbon\Carbon::parse($till_date)->format('D d M Y') }}</b> <br> {{ $duration }}-nights stay <br> {{ $adults }} adult <br> {{ $children }} child</p>
				<hr>
				<h4 style="text-decoration: underline">Hotel Policies</h4>
				<dl>
				<dt>Check In: {{ !empty($hotel->policies->check_in) ? $hotel->policies->check_in : 'undefined' }}</dt>
				</dl>
				<dl>
					<dt>Check Out: {{ !empty($hotel->policies->check_out) ? $hotel->policies->check_out : 'undefined' }}</dt>
				</dl>
				<dl>
					<dt>Cancellation Policy: {{ !empty($hotel->policies->cancellation) ? $hotel->policies->cancellation : 'undefined' }}</dt>
				</dl>
				<dl>
					<dt>Children and Beds: {{ !empty($hotel->policies->children_beds) ? $hotel->policies->children_beds : 'undefined' }}</dt>
				</dl>
				<dl>
					<dt>Pets: {{ !empty($hotel->policies->pets) ? $hotel->policies->pets : 'undefined'  }}</dt>
				</dl>
				<dl>
					<dt>Groups: {{ !empty($hotel->policies->groups) ? $hotel->policies->groups : 'undefined' }}</dt>
				</dl>
				<dl>
					<dt>Payment Policy: {{ !empty($hotel->policies->payment) ? $hotel->policies->payment : 'undefined'  }}</dt>
				</dl>
				<hr>
			</div>
			
			<div class="well" style="background-color: #FFD614; text-align: right">
				<hr>
				<div id="map"></div>
			</div>
		</div>
	</div>



</div>
@endsection

@section('scripts')
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-6ropsXjsRjCxrDFh31V_esVg6CzgSZc&callback=initMap">
    </script>
    <script>
	    $(function () {
		  $('[data-toggle="popover"]').popover()
		});
		
      function initMap() {
        var uluru = {lat: {{ $hotel->address->longitude }}, lng: {{ $hotel->address->latitude }} };
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: uluru
        });
        map.setTilt(45);
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
      
      $(window).load(function() {
	$('#myCarousel').carousel({
  		interval: 3000
 		})
   	});

    </script>

@endsection