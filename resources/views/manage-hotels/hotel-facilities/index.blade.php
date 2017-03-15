@extends('main')

@section('title', 'Hotel Facilities')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>{{ $hotel->hotel_name }}</h1>
		<h3>Facilities</h3>
		<ol class="breadcrumb">
			<li><a href="#">Administrator</a></li>
			<li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
			<li><a href="{{ route('manage-hotels.show', $hotel->id) }}">{{ $hotel->hotel_name }}</a></li>
			<li class="active">Hotel Facilities</li>
		</ol>		<hr>
		{!! Form::open(['route' => ['hotel.facilities.store', $hotel->id], 'method' => 'post']) !!}
    		
		{{ Form::label('hotel_facility', 'Hotel Facilities', ['class' => 'form-spacing-top']) }}
		{{ Form::text('hotel_facility', null, ['class' => 'form-control']) }}
					
		{{ Form::submit('Add Facilities', ['class' => 'btn btn-success btn-lg btn-block form-spacing-top']) }}
		
		{!! Form::close() !!}
		<hr>	
		<ul>
			@foreach($facilities as $facility)
				<li>{{$facility->hotel_facility}}</li>
			@endforeach
		</ul>
	</div>
</div>
@endsection