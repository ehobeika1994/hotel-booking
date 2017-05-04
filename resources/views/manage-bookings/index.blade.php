@extends('main')

@section('title', 'Manage Bookings')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Manage Bookings 
			<br><small style="font-size: 14px;">There are <b>0</b> bookings found in the system!</small></h1>
		<p style="color: red;">This section is only used by a super admin to manage bookings. I.E. adding new bookings to the system, updating bookings information, cancelling bookings.</p>
		<a href="{{ route('manage-bookings.create') }}" class="btn btn-success btn-block">Create Bookings</a>
		<hr>
		
		<table class="table">
			<thead style="color:blue;">
				<tr>
					<th>ID.</th>
					<th>Booking Number</th>
					<th>Booked By</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<!--<th>Room Type</th>
					<th>Room Price</th>-->
					<th>From Date</th>
					<th>Till Date</th>
					<th>Active</th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				@forelse($bookings as $booking)
				<tr>
					<td align="center"><b>{{ $booking->id }}</b></td>
					<td>{{ $booking->booking_number }}</td>
					<td>{{ $booking->user->name }}</td>
					<td>{{ $booking->customer->first_name }}</td>
					<td>{{ $booking->customer->last_name }}</td>
					<td>{{ $booking->customer->email_address }}</td>
					<td>{{ $booking->from_date }}</td>
					<td>{{ $booking->till_date }}</td>
					<td align="center"><b>@if($booking->active_booking == 1) <span style="color: green;">Yes</span> @else <span style="color:red;">No</span> @endif</b></td>
					<td>
						<a href="{{ route('manage-bookings.show', $booking->id) }}" class="btn btn-default btn-sm btn-block">View</a>
					</td>
				</tr>

				@empty
					<p><b>NO BOOKINGS AVAILABLE YET! START UPLOADING NOW!</b></p>
				@endforelse
			</tbody>
		</table> 
		<div class="text-center">

		</div>
		
	</div>
</div>
@endsection

@section('scripts')

@endsection