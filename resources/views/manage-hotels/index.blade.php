@extends('main')

@section('title', 'Manage Hotels')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Manage hotel</h1>
		<a href="{{ route('manage-hotels.create') }}" class="btn btn-success">Add Hotel</a>

		<hr>
		
		<table class="table">
			<thead>
				<tr>
					<th>Hotel Name</th>
					<th>Slug</th>
					<th>Active</th>
					<th>Added On</th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				@foreach($hotels as $hotel)
				<tr>
					<td>{{ $hotel->hotel_name }}</td>
					<td>{{ $hotel->hotel_slug }}</td>
					<td>Yes</td>
					<td>{{ $hotel->created_at }}</td>
					<td>
						<a href="{{ route('manage-hotels.show', $hotel->id) }}" class="btn btn-success">View</a>
						<a href="{{ route('manage-hotels.destroy', $hotel->id) }}" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('scripts')

@endsection