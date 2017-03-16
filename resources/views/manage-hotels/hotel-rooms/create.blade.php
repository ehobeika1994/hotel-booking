@extends('main')

@section('title', 'Add Rooms')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Add a new hotel room</h1>
		<ol class="breadcrumb">
			<li><a href="/">Administrator</a></li>
			<li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
			<li><a href="{{ route('manage-hotels.show', $hotel->id) }}">{{ $hotel->hotel_name }}</a></li>
			<li class="active">Add Room</li>
		</ol>
		<hr>
		{!! Form::open(array('route' => ['hotel.room.store', $hotel->id],'files' => true)) !!}
    
		{{ Form::label('room_type', 'Room Type:') }}
		{{ Form::text('room_type', null, array('class' => 'form-control', 'id' => 'room_type')) }}
		
		{{ Form::label('room_capacity', 'Room Capacity:') }}
		{{ Form::text('room_capacity', null, array('class' => 'form-control', 'id' => 'room_capacity')) }}
		
		{{ Form::label('room_price', 'Room Price:') }}
		{{ Form::text('room_price', null, array('class' => 'form-control', 'id' => 'room_price')) }}
		
		{{ Form::label('room_facilities', 'Room Facilities:', ['class' => 'form-spacing-top']) }}
		{{ Form::textarea('room_facilities', null, array('class' => 'form-control')) }}
		
		{{ Form::label('room_image', 'Upload Cover Photo', ['class' => 'form-spacing-top']) }}
		{{ Form::file('room_image') }}

		{{ Form::submit('Add Room', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}
		
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')

@endsection