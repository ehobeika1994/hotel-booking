@extends('main')

@section('title', 'Address')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Add Address</h1>
		<ol class="breadcrumb">
			<li><a href="/">Administrator</a></li>
			<li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
			<li><a href="{{ route('manage-hotels.show', $hotel->id) }}">{{ $hotel->hotel_name }}</a></li>
			<li class="active">Address</li>
		</ol>
		<hr>
		
		{!! Form::model($hotel->address, ['route' => ['hotel.address.store', $hotel->address->id, $hotel->id], 'method' => 'put']) !!}
    
		{{ Form::label('hotel_address', 'Hotel Address:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('hotel_address', null, array('class' => 'form-control', 'id' => 'hotel_address')) }}
		
		{{ Form::label('hotel_phone_number', 'Hotel Phone Number:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('hotel_phone_number', null, array('class' => 'form-control', 'id' => 'hotel_phone_number')) }}
		
		{{ Form::label('hotel_email_address', 'Hotel Email Address:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('hotel_email_address', null, array('class' => 'form-control', 'id' => 'hotel_email_address')) }}
		
		{{ Form::label('hotel_website', 'Hotel Website:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('hotel_website', null, array('class' => 'form-control')) }}
		<p style="color: red">Enter website in this format <b>hotelname.com</b> or <b>www.hotelname.com</b></p>
		
		{{ Form::label('longitude', 'Hotel Latitude:') }}
		{{ Form::text('longitude', null, array('class' => 'form-control', 'id' => 'longitude')) }}
		
		{{ Form::label('latitude', 'Hotel Longitude:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('latitude', null, array('class' => 'form-control', 'id' => 'latitude')) }}
		

		{{ Form::submit('Add Address', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}
		
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')

@endsection