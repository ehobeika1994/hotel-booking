@extends('main')

@section('title', 'Hotel Rating')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3>Rating</h3>
		<ol class="breadcrumb">
			<li><a href="#">Administrator</a></li>
			<li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
			<li><a href="{{ route('manage-hotels.show', $hotel->id) }}">{{ $hotel->hotel_name }}</a></li>
			<li class="active">Hotel Rating</li>
		</ol>		<hr>
		<h1>{{ $hotel->hotel_name }}</h1>
		@if($hotel->id == $hotel->ratings->hotel_id)
			{!! Form::model($hotel->ratings, ['route' => ['hotel.rating.updateRating', $hotel->ratings->id, $hotel->id], 'method' => 'put']) !!}
    		
			{{ Form::label('hotel_rating', 'Hotel Update Rating', ['class' => 'form-spacing-top']) }}
			{{ Form::text('hotel_rating', null, ['class' => 'form-control']) }}
					
			{{ Form::submit('Update Rating', ['class' => 'btn btn-success btn-lg btn-block form-spacing-top']) }}
		
			{!! Form::close() !!}

		@else
		
		{!! Form::open(['route' => ['hotel.rating.storeRating', $hotel->id], 'method' => 'post']) !!}
    		
		{{ Form::label('hotel_rating', 'Hotel Rating', ['class' => 'form-spacing-top']) }}
		{{ Form::text('hotel_rating', null, ['class' => 'form-control']) }}
					
		{{ Form::submit('Add Rating', ['class' => 'btn btn-success btn-lg btn-block form-spacing-top']) }}
		
		{!! Form::close() !!}
		
		@endif
		<hr>	

	</div>
</div>
@endsection