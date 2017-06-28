@extends('main')

@section('title', 'Dashboard')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-4" style="background-color: #ea5455; padding-bottom: 42px;">
		<div style="text-align: center; padding-top: 36px; font-size: 30px">
			Active Bookings: <b>{{ $bookings }}</b>
		</div>		
	</div>
	
	<div class="col-md-4" style="background-color: #0396ff; padding-bottom: 42px;">
		<div style="text-align: center; padding-top: 36px; font-size: 30px">
			Inactive Bookings: <b>{{ $inactive }}</b>
		</div>		
	</div>

	<div class="col-md-4" style="background-color: #28c76f; padding-bottom: 42px;">
		<div style="text-align: center; padding-top: 36px; font-size: 30px">
			Total Hotels: <b>{{ $hotels->count() }}</b>
		</div>
	</div>
	
</div>
@endsection

@section('scripts')

@endsection