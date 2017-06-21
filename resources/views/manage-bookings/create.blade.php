@extends('main')

@section('title', 'Create Booking')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Create a new booking</h1>
		<ol class="breadcrumb">
			<li><a href="/">Administrator</a></li>
			<li><a href="{{ route('manage-bookings.index') }}">Manage Bookings</a></li>
			<li class="active">Add New Booking</li>
		</ol>
		<hr>
		{!! Form::open(array('route' => 'manage-bookings.store')) !!}
    
		{{ Form::label('date', 'Booking Date:', ['class' => 'form-spacing-top']) }}
	    <div class="row">
	        <div class='col-sm-6'>
	            <div class="form-group">
	                <div class='input-group date'>
	                    <input type='text' class="form-control from_date" name="from_date" id='from_date' />
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
	            </div>
	        </div>
		
	        <div class='col-sm-6'>
	            <div class="form-group">
	                <div class='input-group date'>
	                    <input type='text' class="form-control till_date" id="till_date" name="till_date" />
	                    <span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
	            </div>
	        </div>
	        <input type="hidden" value="5" id="total_days">
	        
		</div>
		<p id="output_days" style="color:green"></p>
		
		{{ Form::label('customer_id', 'Customer:') }}
		<select class="form-control" name="customer_id">
				<option>-- Select Customer --</option>
			@foreach($customers as $customer)
				<option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
			@endforeach
		</select>
		
		{{ Form::label('hotel_id', 'Hotels:', ['class' => 'form-spacing-top']) }}
		<select class="form-control" name="hotel_id" id="hotel_id">
				<option>-- Select Hotel --</option>
			@foreach($hotels as $hotel)
				<option value="{{ $hotel->id }}">{{$hotel->hotel_name }}</option>
			@endforeach
		</select>
		
		{{ Form::label('room_id', 'Rooms:', ['class' => 'form-spacing-top']) }}
		{!! Form::select('room_id',[''=>'--- Select Room ---'],null,['class'=>'form-control', 'id'=>'room_id']) !!}
				
		{{ Form::label('number_of_rooms', 'No Of Rooms:', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="number_of_rooms">
					<option value="1">1</option>
					<option value="2">2</option>
			</select>
			
			{{ Form::label('number_of_adults', 'No Of Adults:', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="number_of_adults">
					<option value="1">1</option>
					<option value="2">2</option>
			</select>
			
			{{ Form::label('number_of_children', 'No Of Children:', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="number_of_children">
					<option value="1">1</option>
					<option value="2">2</option>
			</select>
		
			{{ Form::label('room_price', 'Room Price:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('room_price', 0, array('class' => 'form-control', 'readonly', 'id' => 'room_price'))}}
			
			{{ Form::label('total_price', 'Total Room Price:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('total_price', 0, array('class' => 'form-control', 'readonly', 'id' => 'total_price'))}}
		
				
		{{ Form::submit('Create Booking', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}
		
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

$("#from_date").datepicker({ dateFormat: 'yy-mm-dd' }); 
	$("#till_date").datepicker({
		dateFormat: 'yy-mm-dd',
      	onSelect: function () {
      		myfunc();
		}
	}); 
      
    function myfunc(){
		var start= $("#from_date").datepicker("getDate");
    	var end= $("#till_date").datepicker("getDate");
   		days = (end- start) / (1000 * 60 * 60 * 24);
   		console.log(Math.round(days));
   		$('#total_days').attr('value', Math.round(days));
   		$('#output_days').html('You are looking at booking a room for <b>' + Math.round(days) + '</b> days.');
    }
	
	$('#hotel_id').on('change', function(e){
		console.log(e);
		
		var hotel_id = e.target.value;
		
		//ajax
		$.get('/hotel-room-sub?hotel_id=' + hotel_id, function(data){
			console.log(data);	
			//success data
			$('#room_id').empty();
			$('#room_id').append('<option value="0">--Select Rooms--</option>');
			$.each(data, function(index, hrObj){
				$('#room_id').append('<option value="'+hrObj.id+'">' + hrObj.room_type + " ($" + hrObj.room_price + ")" + '</option>');
				//$('#room_price').val(hrObj.room_price);
			});
			
		});
	});
	
	$('#room_id').on('change', function(e){
		console.log(e);
		var room_id = e.target.value;
		
		$.get('/room-sub?room_id=' + room_id, function(data){
			console.log(data);	
			$('#room_price').empty();
			$.each(data, function(index, roomObj){
				//$('#room_price').val(roomObj.room_price);
				$('#room_price').attr('value', roomObj.room_price);
				var days = $('#total_days').val();
				var total = ((roomObj.room_price * 1) * (days * 1) );
				$('#total_price').attr('value', total);
			});
		});
	});
	
</script>
@endsection