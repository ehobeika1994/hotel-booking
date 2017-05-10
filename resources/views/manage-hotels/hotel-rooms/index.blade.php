@extends('main')

@section('title', 'Manage Rooms')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Manage Rooms <small>{{ $hotel->hotel_name }} 
			<br><small style="font-size: 14px;">There are <b>0</b> rooms found in the system!</small></h1>
		<p style="color: red;">This section is only used by a super admin to manage rooms. I.E. adding new rooms to the system, updating rooms, deleting rooms. This section also allows the super admin to add images to rooms.</p>
		<a href="{{ route('hotel.room.create', $hotel->id) }}" class="btn btn-success btn-block">Add Room</a>

		<hr>
		
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center">Type</th>
					<th align="center">Adults</th>
					<th align="center">Children</th>
					<th align="center">Price</th>
					<th align="center">Availability</th>
				</tr>
			</thead>
			
			<tbody>
				@forelse($hotel->rooms as $room)
				<tr>
					<td align="center">{{ $room->id }}</td>
					<td>{{ $room->room_type }}</td>
					<td>{{ $room->adults }}</td>
					<td>{{ $room->children }}</td>
					<td>£ {{ $room->room_price }}</td>
					<td>{{ $room->availabilities->availability }}</td>
				</tr>

				@empty
					<p><b>NO ROOMS AVAILABLE YET! START UPLOADING NOW!</b></p>
				@endforelse
			</tbody>
		</table> 
		<div class="text-center">
			{!! $rooms->links() !!}
		</div>
		
	</div>
</div>
@endsection

@section('scripts')

@endsection