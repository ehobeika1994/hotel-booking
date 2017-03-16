@extends('main')

@section('title', 'Show Hotels')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
	<style>
       #map {
        height: 400px;
        width: 100%;
       }
       
       ul {
		-webkit-column-count: 4;
		-moz-column-count: 4;
		column-count: 2;
		list-style-type: none;
		}

    </style>
@endsection

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Show hotel</h1>
		<hr>
		<ol class="breadcrumb">
			<li><a href="">Administrator</a></li>
			<li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
			<li class="active">{{ $hotel->hotel_name }}</li>
		</ol>
		
		<img src="{{ asset('images/cover-images/' . $hotel->cover_image) }}" class="" height="400" width="750" alt="hotel-front-image"/>
		<h1>{{ $hotel->hotel_name }} 
			@if($hotel->ratings->hotel_rating == 1)
			<span class="glyphicon glyphicon-star"></span>
			@endif
			@if($hotel->ratings->hotel_rating == 2)
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			@endif
			@if($hotel->ratings->hotel_rating == 3)
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			@endif
			@if($hotel->ratings->hotel_rating == 4)
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			@endif
			@if($hotel->ratings->hotel_rating == 5)
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			<span class="glyphicon glyphicon-star"></span>
			@endif
		</h1>
		<p><small>Hotel Address</small></p>
		<p class="lead">{!! $hotel->hotel_description !!}</p>

		<div class="well">
			<h4>Facilities</h4>
			<ul>
				
				@forelse($hotel->facilities as $facility)
				<li><span class="glyphicon glyphicon-chevron-right"> {{ $facility->hotel_facility }}</span></li>
				@empty
					<li><b>No Facilities available!</b></li>
				@endforelse

			</ul>
		</div>
		
		<div class="well">
			<h4>Images</h4>
			@forelse($hotel->images as $image)
				<img src="{{ asset('images/hotel-images/' . $image->hotel_image) }}" height="300" width="234" class="img-thumbnail">
			@empty
			<ul>
				<li><b>No Images yet! Upload them</b></li>
			</ul>
			@endforelse
		</div>
		
		<div class="well">
			<h4>Rooms</h4>
			@foreach($hotel->rooms as $room)
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="{{ asset('images/hotel-rooms/' . $room->room_image) }}" alt="rooms">
						<div class="caption">
							<h3>{{ $room->room_type }}</h3>
							<p>Sleeps <b>{{ $room->room_capacity }}</b> people</p>
							<p>Bed Choice <b>Double Bed</b></p>
							<p>Starting from <b>${{ $room->room_price }}/night</b></p>
							<button type="button" class="btn btn-default btn-block" data-toggle="popover" title="Room Facilities" data-placement="top" data-content="{{ $room->room_facilities }}">Room Facilities</button>
							<p><a href="" class="btn btn-warning btn-block" style="margin-top: 2px;">Book</a></p>
						</div>
				</div>
			</div>
			@endforeach
		</div>
		<hr>
	</div>
	
	<div class="col-md-4">
		<div class="well" style="margin-top: 65px;">
			<h3>Manage Hotels</h3>
			<hr>
			<a href="{{ route('manage-hotels.edit', $hotel->id) }}" class="btn btn-primary btn-block">Edit</a>
			<a href="{{ route('manage-hotels.index') }}" class="btn btn-warning btn-block">Go Back</a>
			<a href="{{ route('manage-hotels.destroy', $hotel->slug) }}" class="btn btn-danger btn-block">Delete</a>
			<hr>
			<a href="{{ route('hotel.rating', $hotel->id) }}" class="btn btn-success btn-block">Hotel Rating</a>
			<a href="{{ route('hotel.facilities', $hotel->id) }}" class="btn btn-success btn-block">Hotel Facilities</a>
			<a href="{{ route('manage-hotels.upload-images.index', $hotel->id) }}" class="btn btn-success btn-block">Upload Images</a>
			<a href="{{ route('hotel.room.create', $hotel->id) }}" class="btn btn-success btn-block">Hotel Rooms</a>
			<a href="" class="btn btn-success btn-block">Accommodation Type</a>
			
			<a href="" class="btn btn-success btn-block">Rooms Available</a>
			<a href="" class="btn btn-success btn-block">Bookings</a>
			<a href="" class="btn btn-success btn-block">Hotel Policies</a>
		</div>
		<div class="well">
			<h4>Recommendations</h4>
			<hr>
			<dl>
				<dt></dt>
				<dd>100% of guests recommend</dd>
			</dl>
			<dl>
				<dt></dt>
				<dd>Guests Rating</dd>
			</dl>
		</div>
		<div class="well">
			<h4>TripAdvisor Review</h4>
			<hr>
			<dl>
				<dt></dt>
				<dd>100% of guests recommend</dd>
			</dl>
			<dl>
				<dt></dt>
				<dd>Guests Rating</dd>
			</dl>
		</div>
		
		<div class="well">
			<div id="map"></div>
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
        var uluru = {lat: 13.442634, lng: -16.722511};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru,
          mapTypeId: 'satellite'
        });
        map.setTilt(45);
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
@endsection