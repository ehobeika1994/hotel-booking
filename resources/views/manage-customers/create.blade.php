@extends('main')

@section('title', 'Manage Customers')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Add a new customer</h1>
		<ol class="breadcrumb">
			<li><a href="/">Administrator</a></li>
			<li><a href="{{ route('manage-customer.index') }}">Manage Customers</a></li>
			<li class="active">Add New Customer</li>
		</ol>
		<hr>
		{!! Form::open(array('route' => 'manage-customer.store')) !!}
    
		{{ Form::label('title', 'Title:') }}
		<select class="form-control" name="title">
				<option value="Mr">Mr</option>
				<option value="Miss">Miss</option>
				<option value="Mrs">Mrs</option>
				<option value="Dr">Dr</option>
			</select>
		
		{{ Form::label('first_name', 'First Name:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('first_name', null, array('class' => 'form-control', 'id' => 'first_name')) }}
		
		{{ Form::label('last_name', 'Last Name:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('last_name', null, array('class' => 'form-control', 'id' => 'last_name')) }}
		
		{{ Form::label('gender', 'Gender:', ['class' => 'form-spacing-top']) }}
		<select class="form-control" name="gender">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
		</select>
		
		{{ Form::label('birthday', 'Birthday:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('birthday', null, array('class' => 'form-control', 'id' => 'birthday')) }}
		
		{{ Form::label('phone_number', 'Phone Number:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('phone_number', null, array('class' => 'form-control', 'id' => 'phone_number')) }}
		
		{{ Form::label('email_address', 'Email Address:', ['class' => 'form-spacing-top']) }}
		{{ Form::email('email_address', null, array('class' => 'form-control', 'id' => 'email_address')) }}
		
		{{ Form::label('password', 'Password:', ['class' => 'form-spacing-top']) }}
		{{ Form::password('password', array('class' => 'form-control', 'id' => 'password')) }}
		
		{{ Form::label('password_confirmation', 'Password Confirmation:', ['class' => 'form-spacing-top']) }}
		{{ Form::password('password_confirmation', array('class' => 'form-control', 'id' => 'password_confirmation')) }}
		
		<hr class="form-spacing-top">
		
		{{ Form::label('address_line_1', 'Address Line 1:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('address_line_1', null, array('class' => 'form-control', 'id' => 'address_line_1')) }}
		
		{{ Form::label('address_line_2', 'Address Line 2:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('address_line_2', null, array('class' => 'form-control', 'id' => 'address_line_2')) }}
		
		{{ Form::label('address_line_3', 'Address Line 3:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('address_line_3', null, array('class' => 'form-control', 'id' => 'address_line_3')) }}
		
		{{ Form::label('city', 'City:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('city', null, array('class' => 'form-control', 'id' => 'city')) }}
		
		{{ Form::label('zip_code', 'Zip Code / Postal Code:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('zip_code', null, array('class' => 'form-control', 'id' => 'zip_code')) }}
		
		{{ Form::label('country_id', 'Country:', ['class' => 'form-spacing-top']) }}
		<select class="form-control" name="country_id">
				@foreach($countries as $country)
					<option value="{{ $country->id }}">{{ $country->country_name }}</option>
				@endforeach
		</select>
		
		{{ Form::submit('Add Customer', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}
		
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')

@endsection