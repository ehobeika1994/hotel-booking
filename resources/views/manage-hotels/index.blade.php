@extends('main')

@section('title', 'Manage Hotels')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Hotels
			<br><small style="font-size: 14px;">There are <b>{{ $hotels->total() }}</b> hotels found in the system!</small></h1>
		<p style="color: red;">This section is only used by a super admin to manage hotels. I.E. adding new hotels to the system, updating hotels, deleting hotels. This section also allows the super admin to add images to hotels.</p>
		<a href="{{ route('manage-hotels.create') }}" class="btn btn-success btn-block">Add A New Hotel</a>

		<hr>
		
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Hotel Name</th>
					<th>Slug</th>
					<th>Active</th>
					<th>Location</th>
					<th>Created At</th>
					<th>Options</th>
				</tr>
			</thead>
			
			<tbody>
				@forelse($hotels as $hotel)
				<tr>
					<td>{{ $hotel->id }}</td>
					<td>{{ $hotel->hotel_name }}</td>
					<td>{{ $hotel->hotel_slug }}</td>
					<td>@if($hotel->active == 1)Yes @else No @endif</td>
					<td>{{ $hotel->address->hotel_address }}</td>
					<td>{{ $hotel->created_at->diffForHumans() }}
					<td>
						<a href="{{ route('manage-hotels.show', $hotel->id) }}" class="btn btn-default btn-sm btn-block">View</a>
					</td>
				</tr>

				@empty
					<p><b>NO HOTELS AVAILABLE YET! START UPLOADING NOW!</b></p>
				@endforelse
			</tbody>
		</table> 
		<div class="text-center">
			{!! $hotels->links() !!}
		</div>
		
	</div>
</div>
@endsection

@section('scripts')

@endsection