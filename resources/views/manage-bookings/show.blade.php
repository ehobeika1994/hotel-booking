@extends('main')

@section('title', 'Customer Booking')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
	<style>
		
		.delete-spacing {
			margin-top: 5px;
		}		
	</style>
@endsection

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Show Booking</h1>
		<hr>
		<ol class="breadcrumb">
			<li><a href="">Administrator</a></li>
			<li><a href="{{ route('manage-bookings.index') }}">Manage Booking</a></li>
			<li class="active">{{ $booking->booking_number }}</li>
		</ol>
		
		<h1>{{ $booking->customer->title }} {{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</h1>
		<h3>Booking Number: <b>{{ $booking->booking_number }}</b></h3>
		<br>
		<p>Dear {{ $booking->customer->title }} {{ $booking->customer->last_name }}, <br> You have reserved a <b>{{ $booking->room->room_type }}</b> at <b>{{ $booking->room->hotel->hotel_name }}</b> for <b>@if($length > 1) {{ $length }} nights @else {{ $length }} night @endif</b> from <b>{{ Carbon\Carbon::parse($booking->from_date)->format('D d M Y') }}</b> till <b>{{ Carbon\Carbon::parse($booking->till_date)->format('D d M Y') }}</b> with a total price of <b>£{{ $booking->room_price }}</b>.<br>Thank you.</p>
		
		<hr>
		
		<div class="well">
			<h4>Customer Information</h4>
			<hr>
			<table class="table table-bordered">
				<tr>
					<th>Customer Name :</th>
					<td>{{ $booking->customer->first_name }} {{ $booking->customer->last_name }}</td>
				</tr>
				<tr>
					<th>Phone Number :</th>
					<td>{{ $booking->customer->phone_number }}</td>
				</tr>
				<tr>
					<th>Email Address :</th>
					<td>{{ $booking->customer->email_address }}</td>
				</tr>
<tr>
					<th>Full Address :</th>
					<td>{{ $booking->customer->address->address_line_1 }}<br>{{ $booking->customer->address->address_line_2 }}<br>{{ $booking->customer->address->address_line_3 }}<br>{{ $booking->customer->address->city }}<br>{{ $booking->customer->address->zip_code }}<br>{{ $booking->customer->address->countries->country_name }}</td>
				</tr>

			</table>
		</div>
		
		<div class="well">
			<h4>Booking Details</h4>
			<hr>
			<table class="table table-bordered">
				<tr>
					<th>Hotel Name:</th>
					<td>{{ $booking->room->hotel->hotel_name }}</td>
				</tr>
				<tr>
					<th>Room Type:</th>
					<td>{{ $booking->room->room_type }}</td>
				</tr>
				<tr>
					<th>Full Address:</th>
					<td>{{ $booking->room->hotel->address->hotel_address }}<br>{{ $booking->room->hotel->address->hotel_website }}</td>
				</tr>
				<tr>
					<th>Booking From Date:</th>
					<td>{{ Carbon\Carbon::parse($booking->from_date)->format('D d M Y') }}</td>
				</tr>
				<tr>
					<th>Booking Till Date:</th>
					<td>{{ Carbon\Carbon::parse($booking->till_date)->format('D d M Y') }}</td>
				</tr>
				<tr>
					<th>Total Nights:</th>
					<td><b>@if($length > 1) {{ $length }} nights @else {{ $length }} night @endif</b></td>
				</tr>
				<tr>
					<th>Number Of Rooms:</th>
					<td>{{ $booking->number_of_rooms }}</td>
				</tr>
				<tr>
					<th>Number Of Adults:</th>
					<td>{{ $booking->number_of_adults }}</td>
				</tr>
				<tr>
					<th>Number Of Children</th>
					<td>{{ $booking->number_of_children }}</td>
				</tr>
				<tr>
					<th>Room Price per night:</th>
					<td><b>£ {{ $booking->room->room_price }}</b></td>
				</tr>
				<tr>
					<th>Room Total Price:</th>
					<td><b>£ {{ $booking->room_price }}</b></td>
				</tr>

			</table>

		</div>

	</div>
	
	<div class="col-md-4">
		<div class="well" style="margin-top: 65px;">
			<h3>Manage Booking</h3>
				@if($booking->active_booking == 1 && date('Y-m-d') <= $booking->till_date) <span style="color:green;">This booking is currently active!</span> @else <span style="color:red;">This booking is either expired or has been cancelled!</span> @endif </div>
			<hr>
			@if($booking->active_booking == 1 &&  date('Y-m-d') <= $booking->till_date)
			{!! Form::open(['route' => ['booking.disable', $booking->id], 'method' => 'PUT']) !!}
				{{ Form::submit('Cancel Booking', ['class' => 'btn btn-danger btn-block form-spacing-top']) }}
			{!! Form::close() !!}
			@elseif($booking->active_booking == 0)
			{!! Form::open(['route' => ['booking.enable', $booking->id], 'method' => 'PUT']) !!}
				{{ Form::submit('Activate Booking', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}
			{!! Form::close() !!}
			
			@endif
			<a href="{{ route('manage-bookings.index') }}" class="btn btn-warning btn-block delete-spacing">Go Back</a>
			<hr>
			
			<hr>

					</div>		
	</div>
</div>
@endsection

@section('scripts')
@endsection