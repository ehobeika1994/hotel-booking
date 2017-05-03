@extends('main')

@section('title', 'Edit Customer')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Edit Customer</h1>
		<ol class="breadcrumb">
			<li><a href="/">Administrator</a></li>
			<li><a href="{{ route('manage-customer.index') }}">Manage Customer</a></li>
			<li class="active">Edit Customer</li>
			<li class="active"><a href="{{ route('manage-customer.show', $customer->id) }}">{{ $customer->membership_number }}</a></li>
		</ol>
		<hr>
		{!! Form::model($customer, ['route' => ['manage-customer.update', $customer->id], 'method' => 'put']) !!}
    
		{{ Form::label('first_name', 'First Name:') }}
		{{ Form::text('first_name', null, array('class' => 'form-control', 'id' => 'first_name')) }}
		
		{{ Form::label('last_name', 'Last Name:') }}
		{{ Form::text('last_name', null, array('class' => 'form-control', 'id' => 'last_name')) }}
		
		{{ Form::label('gender', 'Gender:') }}
		{{ Form::text('gender', null, array('class' => 'form-control', 'id' => 'gender')) }}
		
		{{ Form::label('birthday', 'Birthday:') }}
		{{ Form::text('birthday', null, array('class' => 'form-control', 'id' => 'birthday')) }}

		{{ Form::label('phone_number', 'Phone Number:') }}
		{{ Form::text('phone_number', null, array('class' => 'form-control', 'id' => 'phone_number')) }}
		
		{{ Form::label('email_address', 'Email Address:') }}
		{{ Form::text('email_address', null, array('class' => 'form-control', 'id' => 'email_address')) }}
							
		{{ Form::submit('Update Customer', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}
		
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')

@endsection