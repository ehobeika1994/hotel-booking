@extends('main')

@section('title', 'Create Booking')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Create a new booking</h1>
		<ol class="breadcrumb">
			<li><a href="/">Administrator</a></li>
			<li><a href="{{ route('manage-bookings.index') }}">Manage Bookings</a></li>
			<li class="active">Add New Booking</li>
		</ol>
		<hr>
		{!! Form::open(array('route' => 'manage-bookings.store')) !!}
    
    {{ Form::label('customer_id', 'Customer:', ['class' => 'form-spacing-top']) }}
		<select class="form-control" name="customer_id">
					<option>-- Select Customer --</option>
				@foreach($customers as $customer)
					<option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
				@endforeach
			</select>
			
			{{ Form::label('hotel_room_id', 'Rooms:', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="hotel_room_id">
				<option>-- Select Room --</option>
				@foreach($rooms as $room)
					<option value="{{ $room->id }}">{{ $room->room_type }} ({{ $room->hotel->hotel_name }})</option>
				@endforeach
			</select>
		
		{{ Form::label('from_date', 'From:', ['class' => 'form-spacing-top']) }}
		{{ Form::date('from_date', null, array('class' => 'form-control', 'id' => 'from_date')) }}
		
		{{ Form::label('till_date', 'To:', ['class' => 'form-spacing-top']) }}
		{{ Form::date('till_date', null, array('class' => 'form-control', 'id' => 'till_date')) }}
		
		{{ Form::label('number_of_rooms', 'No Of Rooms:', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="number_of_rooms">
					<option value="1">1</option>
					<option value="2">2</option>
			</select>
			
			{{ Form::label('number_of_adults', 'No Of Adults:', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="number_of_adults">
					<option value="1">1</option>
					<option value="2">2</option>
			</select>
			
			{{ Form::label('number_of_children', 'No Of Children:', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="number_of_children">
					<option value="1">1</option>
					<option value="2">2</option>
			</select>
		
			{{ Form::label('room_price', 'Room Price:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('room_price', 0, array('class' => 'form-control', 'readonly', 'id' => 'room_price'))}}
		

		
				
		{{ Form::submit('Create Booking', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}
		
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(function()
	{
		$.ajax({
			url: '/manage-customer',
			data: "",
			dataType: 'json',
			success: function(data)
			{
				var id = data[0];
				var price = data[1];
				$('#room_price').html(price);
			}
		});
	});
</script>
@endsection