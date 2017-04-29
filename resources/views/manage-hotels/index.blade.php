@extends('main')

@section('title', 'Manage Hotels')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Manage hotel 
			<br><small style="font-size: 14px;">There are <b>{{ $hotels->total() }}</b> hotels found in the system!</small></h1>
		<p style="color: red;">This section is only used by a super admin to manage hotels. I.E. adding new hotels to the system, updating hotels, deleting hotels. This section also allows the super admin to add images to hotels.</p>
		<a href="{{ route('manage-hotels.create') }}" class="btn btn-success btn-block">Add Hotel</a>

		<hr>
		
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th></th>
					<th>Hotel Name</th>
					<th>Slug</th>
					<th>Active</th>
					<th>Location</th>
					<th>Options</th>
					<th>Delete</th>
				</tr>
			</thead>
			
			<tbody>
				@forelse($hotels as $hotel)
				<tr>
					<td>{{ $hotel->id }}</td>
					<td><img src="{{ asset('images/cover-images/' . $hotel->cover_image) }}" width="100" height="75"></td>
					<td>{{ $hotel->hotel_name }}</td>
					<td>{{ $hotel->hotel_slug }}</td>
					<td>@if($hotel->active == 1)Yes @else No @endif</td>
					<td>{{ $hotel->address->hotel_address }}</td>
					<td>
						<a href="{{ route('manage-hotels.show', $hotel->id) }}" class="btn btn-success btn-sm btn-block">View</a>
						<a href="{{ route('manage-hotels.edit', $hotel->id) }}" class="btn btn-primary btn-sm btn-block">Edit</a>
					</td>
					<td>
						{!! Form::open(['route' => ['manage-hotels.destroy', $hotel->id], 'method' => 'DELETE']) !!}
							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm btn-block']) }}
						{!! Form::close() !!}
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