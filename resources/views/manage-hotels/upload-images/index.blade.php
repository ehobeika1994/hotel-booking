@extends('main')

@section('title', 'Upload Photos')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Upload Photos</h1>
		<ol class="breadcrumb">
			<li><a href="#">Administrator</a></li>
			<li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
			<li><a href="{{ route('manage-hotels.show', $hotel->id) }}">{{ $hotel->hotel_name }}</a></li>
			<li class="active">Upload Images</li>
		</ol>		<hr>
		{!! Form::open(['route' => ['hotel.images.store', $hotel->id], 'files' => true, 'method' => 'post']) !!}
    		
		{{ Form::label('hotel_image', 'Upload Hotel Images', ['class' => 'form-spacing-top']) }}
		{{ Form::file('hotel_image') }}
					
		{{ Form::submit('Upload Photos', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}
		
		{!! Form::close() !!}
	</div>
</div>
@endsection