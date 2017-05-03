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
		
		<table class="table">
			<thead>
				<tr>
					<th align="center">ID</th>
					<th align="center"></th>
					<th align="center">Type</th>
					<th align="center">Adults</th>
					<th align="center">Children</th>
					<th align="center">Price</th>
					<th align="center">Available</th>
					<th align="center">Options</th>
				</tr>
			</thead>
			
			<tbody>
				@forelse($rooms as $room)
				<tr>
					<td align="center">{{ $room->id }}</td>
					<td align="center"><img src="{{ asset('images/hotel-rooms/' . $room->room_image) }}" width="100" height="75"></td>
					<td >{{ $room->room_type }}</td>
					<td align="center">{{ $room->adults }}</td>
					<td align="center">{{ $room->children }}</td>
					<td align="center">{{ $room->room_price }}</td>
					<td align="center">{{ $room->availabilities->availability }}</td>
					<td>
						<a href="" class="btn btn-success btn-sm btn-block">View</a>
					</td>
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