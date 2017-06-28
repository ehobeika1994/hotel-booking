@extends('main')

@section('title', 'Manage Bookings')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Bookings 
			<br><small style="font-size: 14px;">There are <b>{{ $bookings->count() }}</b> bookings found in the system!</small></h1>
		<p style="color: red;">This section is only used by a super admin to manage bookings. I.E. adding new bookings to the system, updating bookings information, cancelling bookings.</p>
		<a href="{{ route('manage-bookings.create') }}" class="btn btn-success btn-block">Create New Bookings</a>
		<hr>
		
		<table class="table table-striped table-bordered">
			<thead style="color:blue;">
				<tr>
					<th>Booking Number</th>
					<th>Last Name</th>
					<th>Room Type</th>
					<th>Room Price</th>
					<th>Hotel Name</th>
					<th>From Date</th>
					<th>Till Date</th>
					<th>Total Price</th>
					<th>Active</th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				@forelse($bookings as $booking)
				<tr>
					<td><b>{{ $booking->booking_number }}</b></td>
					<td>{{ $booking->customer->last_name }}</td>					
					<td>{{ $booking->room->room_type }}</td>
					<td align="center"><b>£ {{ $booking->room->room_price }}/night</b></td>
					<td>{{ $booking->room->hotel->hotel_name }}</td>
					<td>{{ $booking->from_date }}</td>
					<td>{{ $booking->till_date }}</td>
					<td align="center"><b>£ {{ $booking->room_price }}</b></td>
					<td align="center"><b>@if($booking->active_booking == 1 &&  date('Y-m-d') <= $booking->till_date) <span style="color:green">Active Booking</span> @else <span style="color:red;">Inactive Booking</span> @endif</b></td>
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
			{!! $bookings->links() !!}
		</div>
		
	</div>
</div>
@endsection

@section('scripts')

@endsection