@extends('main')

@section('title', '{{ $customer->first_name }} {{ $customer->last_name }}')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
	<style>
		
		.delete-spacing {
			margin-top: 5px;
		}		
	</style>
@endsection

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Show Customer</h1>
		<hr>
		<ol class="breadcrumb">
			<li><a href="">Administrator</a></li>
			<li><a href="{{ route('manage-customer.index') }}">Manage Customers</a></li>
			<li class="active">{{ $customer->membership_number }}</li>
		</ol>
		
		<h1>{{ $customer->title }} {{ $customer->first_name }} {{ $customer->last_name }}</h1>
		<hr>
		
		<div class="well">
			<h4>Customer Information</h4>
			<hr>
			<table class="table">
				<tr>
					<td>Membership Number:</td>
					<td><b>{{ $customer->membership_number }}</b></td>
				</tr>
				<tr>
					<td>First Name:</td>
					<td><b>{{ $customer->title }} {{ $customer->first_name }}</b></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><b>{{ $customer->last_name }}</b></td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td><b>{{ $customer->gender }}</b></td>
				</tr>
				<tr>
					<td>Birthday:</td>
					<td><b>{{ Carbon\Carbon::parse($customer->birthday)->format('d M Y') }}</b></td>
				</tr>
				<tr>
					<td>Phone Number:</td>
					<td><b>{{ $customer->phone_number }}</b></td>
				</tr>
				<tr>
					<td>Email Address:</td>
					<td><b>{{ $customer->email_address }}</b></td>
				</tr>
				<tr>
					<td>Member Since:</td>
					<td><b>{{ $customer->created_at->format('d M Y') }} - {{ $customer->created_at->diffForHumans() }}</b></td>
				</tr>
				<tr>
					<td>Recent Update:</td>
					<td><b>{{ $customer->updated_at->format('d M Y') }} - {{ $customer->updated_at->diffForHumans() }}</b></td>
				</tr>
			</table>
		</div>
		
		<div class="well">
			<h4>Customer Address</h4>
			<hr>
			<table class="table">
				<tr>
					<td>Address Line 1:</td>
					<td><b>{{ $customer->address->address_line_1 }}</b></td>
				</tr>
				<tr>
					<td>Address Line 2:</td>
					<td><b>{{ $customer->address->address_line_2 }}</b></td>
				</tr>
				<tr>
					<td>Address Line 3:</td>
					<td><b>{{ $customer->address->address_line_3 }}</b></td>
				</tr>
				<tr>
					<td>City:</td>
					<td><b>{{ $customer->address->city }}</b></td>
				</tr>
				<tr>
					<td>Zip Code / Postal Code:</td>
					<td><b>{{ $customer->address->zip_code }}</b></td>
				</tr>
				<tr>
					<td>Country:</td>
					<td><b>{{ $customer->address->countries->country_name }}</b></td>
				</tr>
				<tr>
					<td>Recent Update:</td>
					<td><b>{{ $customer->address->updated_at->format('d M Y') }} - {{ $customer->address->updated_at->diffForHumans() }}</b></td>
				</tr>
			</table>
		</div>

	</div>
	
	<div class="col-md-4">
		<div class="well" style="margin-top: 65px;">
			<h3>Manage Customer Account</h3>
			@if($customer->active == 1) <span style="color:green;">This customer is currently an active users in the system!</span> @else <span style="color:red;">This customer is currently disabled from the system!</span> @endif
			<hr>
			<a href="{{ route('manage-customer.edit', $customer->id) }}" class="btn btn-primary btn-block">Edit</a>
			<a href="{{ route('manage-customer.index') }}" class="btn btn-warning btn-block">Go Back</a>
			<hr>
			<a href="{{ route('manage-customer.address', $customer->id) }}" class="btn btn-success btn-block">Update Address</a>
			<a href="" class="btn btn-success btn-block">View Bookings</a>
			<a href="" class="btn btn-success btn-block">Create Booking</a>
			<hr>
			@if($customer->active == 1)
			{!! Form::open(['route' => ['customer.disable', $customer->id], 'method' => 'PUT']) !!}
				{{ Form::submit('Disable Customer', ['class' => 'btn btn-danger btn-block form-spacing-top']) }}
			{!! Form::close() !!}
			@else 
			{!! Form::open(['route' => ['customer.enable', $customer->id], 'method' => 'PUT']) !!}
				{{ Form::submit('Activate Customer', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}
			{!! Form::close() !!}	
			@endif	
			{!! Form::open(['route' => ['manage-customer.destroy', $customer->id], 'method' => 'DELETE']) !!}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block delete-spacing']) }}
			{!! Form::close() !!}		
		</div>		
	</div>
</div>
@endsection

@section('scripts')
@endsection