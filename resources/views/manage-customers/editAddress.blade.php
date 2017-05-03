@extends('main')

@section('title', 'Edit Customer Address')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Edit Customer Address</h1>
		<ol class="breadcrumb">
			<li><a href="/">Administrator</a></li>
			<li><a href="{{ route('manage-customer.index') }}">Manage Customer</a></li>
			<li><a href="{{ route('manage-customer.show', $customer->id) }}">{{ $customer->membership_number }}</a></li>
			<li class="active">Update customer address</li>
		</ol>
		<hr>
		{!! Form::model($customer->address, ['route' => ['manage-customer.update.address', $customer->address->id, $customer->id], 'method' => 'put']) !!}
    
		{{ Form::label('address_line_1', 'Address Line 1:') }}
		{{ Form::text('address_line_1', null, array('class' => 'form-control', 'id' => 'address_line_1')) }}
		
		{{ Form::label('address_line_2', 'Address Line 2:') }}
		{{ Form::text('address_line_2', null, array('class' => 'form-control', 'id' => 'address_line_2')) }}
		
		{{ Form::label('address_line_3', 'Address Line 3:') }}
		{{ Form::text('address_line_3', null, array('class' => 'form-control', 'id' => 'address_line_3')) }}
		
		{{ Form::label('city', 'City:') }}
		{{ Form::text('city', null, array('class' => 'form-control', 'id' => 'city')) }}
		
		{{ Form::label('zip_code', 'Zip Code / Postal Address:') }}
		{{ Form::text('zip_code', null, array('class' => 'form-control', 'id' => 'zip_code')) }}
		
		{{ Form::label('country_id', 'Country:') }}
		{{ Form::text('country_id', $customer->address->countries->country_name, array('class' => 'form-control', 'id' => 'country_id')) }}

							
		{{ Form::submit('Update Customer', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}
		
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')

@endsection