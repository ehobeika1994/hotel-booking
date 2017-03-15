@extends('main')

@section('title', 'Manage Hotels')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
	
	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code'
		});		
		tinymce.activeEditor.dom.addClass(tinyMCE.activeEditor.dom.select('p'), 'lead');
	</script>
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Add a new hotel</h1>
		<ol class="breadcrumb">
			<li><a href="/">Administrator</a></li>
			<li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
			<li class="active">Create Hotels</li>
		</ol>
		<hr>
		{!! Form::open(array('route' => 'manage-hotels.store','files' => true)) !!}
    
		{{ Form::label('hotel_name', 'Hotel Name:') }}
		{{ Form::text('hotel_name', null, array('class' => 'form-control', 'id' => 'hotel-name')) }}
		
		{{ Form::label('cover_image', 'Upload Cover Photo', ['class' => 'form-spacing-top']) }}
		{{ Form::file('cover_image') }}
		
		{{ Form::label('hotel_slug', 'Hotel Slug:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('hotel_slug', null, array('class' => 'form-control', 'id' => 'hotel-slug', 'readonly')) }}
		
		{{ Form::label('hotel_description', 'Hotel Description:', ['class' => 'form-spacing-top']) }}
		{{ Form::textarea('hotel_description', null, array('class' => 'form-control')) }}
		
		<!--
		
		{{ Form::label('hotel-rooms', 'Hotel Rooms:', ['class' => 'form-spacing-top']) }}
		{{ Form::textarea('hotel-rooms', null, array('class' => 'form-control')) }}
		
		{{ Form::label('hotel-address', 'Hotel Address:', ['class' => 'form-spacing-top']) }}
		{{ Form::textarea('hotel-address', null, array('class' => 'form-control')) }}
		
		{{ Form::label('hotel-map-location', 'Hotel Map Location:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('hotel-map-location', null, array('class' => 'form-control')) }}

		{{ Form::label('hotel-rating-id', 'Hotel Rating', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="hotel-rating-id">
				<option value="1">1</option>
				<option value="1">2</option>
				<option value="1">3</option>
				<option value="1">4</option>
				<option value="1">5</option>
			</select>
		-->	
		{{ Form::submit('Add Hotel', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}
		
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/speakingurl/13.0.0/speakingurl.min.js"></script>
{!! Html::script('js/jquery.stringtoslug.min.js') !!}

<script>
$(document).ready( function() {
    $("#hotel-name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#hotel-slug',
        space: '-',
        prefix: '',
        suffix: '',
        replace: '',
        AND: 'and',
        options: {},
        callback: false
    });
});	
</script>
@endsection