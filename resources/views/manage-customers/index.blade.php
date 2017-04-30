@extends('main')

@section('title', 'Manage Customers')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-12">
		<h1>Manage Customers 
			<br><small style="font-size: 14px;">There are <b>{{ $customers->total() }}</b> customers found in the system!</small></h1>
		<p style="color: red;">This section is only used by a super admin to manage customers. I.E. adding new customers to the system, updating customers information, deleting and disabling customers.</p>
		<a href="{{ route('manage-customer.create') }}" class="btn btn-success btn-block">Add Customer</a>

		<hr>
		
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Membership Number</th>
					<th>Title</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>Country</th>
					<th>Active</th>
					<th>Created At</th>
					<th>Updated At</th>
					<th>Options</th>
					<th>Delete</th>
				</tr>
			</thead>
			
			<tbody>
				@forelse($customers as $customer)
				<tr>
					<td>{{ $customer->id }}</td>
					<td>{{ $customer->membership_number }}</td>
					<td>{{ $customer->title }}</td>
					<td>{{ $customer->first_name }}</td>
					<td>{{ $customer->last_name }}</td>
					<td>{{ $customer->email_address }}</td>
					<td>{{ $customer->address->countries->country_name }}</td>
					<td>@if($customer->active == 1)Yes @else No @endif</td>
					<td>{{ $customer->created_at }}</td>
					<td>{{ $customer->updated_at }}</td>
					<td>
						<a href="{{ route('manage-customer.show', $customer->id) }}" class="btn btn-success btn-sm btn-block">View</a>
						<a href="{{ route('manage-customer.edit', $customer->id) }}" class="btn btn-primary btn-sm btn-block">Edit</a>
					</td>
					<td>
						{!! Form::open(['route' => ['manage-customer.destroy', $customer->id], 'method' => 'DELETE']) !!}
							{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm btn-block']) }}
						{!! Form::close() !!}
					</td>
				</tr>

				@empty
					<p><b>NO CUSTOMERS AVAILABLE YET! START UPLOADING NOW!</b></p>
				@endforelse
			</tbody>
		</table> 
		<div class="text-center">
			{!! $customers->links() !!}
		</div>
		
	</div>
</div>
@endsection

@section('scripts')

@endsection