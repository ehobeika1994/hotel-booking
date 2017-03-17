@extends('main')

@section('title', 'Hotel Policies')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>{{ $hotel->hotel_name }}</h1>
		<h3>Hotel Policy</h3>
		<ol class="breadcrumb">
			<li><a href="#">Administrator</a></li>
			<li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
			<li><a href="{{ route('manage-hotels.show', $hotel->id) }}">{{ $hotel->hotel_name }}</a></li>
			<li class="active">Hotel Policies</li>
		</ol>		<hr>
		{!! Form::open(['route' => ['hotel.policy.store', $hotel->id], 'method' => 'post']) !!}
    		
		{{ Form::label('check_in', 'Check In', ['class' => 'form-spacing-top']) }}
		{{ Form::text('check_in', null, ['class' => 'form-control']) }}
		
		{{ Form::label('check_out', 'Check Out', ['class' => 'form-spacing-top']) }}
		{{ Form::text('check_out', null, ['class' => 'form-control']) }}
		
		{{ Form::label('cancellation', 'Cancellation', ['class' => 'form-spacing-top']) }}
		{{ Form::text('cancellation', null, ['class' => 'form-control']) }}
		
		{{ Form::label('children_beds', 'Children and Beds', ['class' => 'form-spacing-top']) }}
		{{ Form::text('children_beds', null, ['class' => 'form-control']) }}
		
		{{ Form::label('pets', 'Pets', ['class' => 'form-spacing-top']) }}
		{{ Form::text('pets', null, ['class' => 'form-control']) }}
		
		{{ Form::label('groups', 'groups', ['class' => 'form-spacing-top']) }}
		{{ Form::text('groups', null, ['class' => 'form-control']) }}
		
		{{ Form::label('payment', 'Payment', ['class' => 'form-spacing-top']) }}
		{{ Form::text('payment', null, ['class' => 'form-control']) }}
					
		{{ Form::submit('Add Policy', ['class' => 'btn btn-success btn-lg btn-block form-spacing-top']) }}
		
		{!! Form::close() !!}
		<hr>	
		<ul>

		</ul>
	</div>
</div>
@endsection