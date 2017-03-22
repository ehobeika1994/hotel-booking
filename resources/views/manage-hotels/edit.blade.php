@extends('main')

@section('title', 'Edit Hotels')

@section('stylesheets')
	{!! Html::style('css/styles.css') !!}
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
	
	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code'
		});		
	</script>
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		
		<h1>Edit Hotel</h1>
		<ol class="breadcrumb">
			<li><a href="/">Administrator</a></li>
			<li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
			<li class="active">Edit Hotel</li>
			<li class="active">{{ $hotel->hotel_name }}</li>
		</ol>
		<hr>
		{!! Form::model($hotel, ['route' => ['manage-hotels.update', $hotel->id], 'method' => 'put', 'files' => true]) !!}
    
		{{ Form::label('hotel_name', 'Hotel Name:') }}
		{{ Form::text('hotel_name', null, array('class' => 'form-control', 'id' => 'hotel-name')) }}
		
		{{ Form::label('cover_image', 'Upload Cover Photo', ['class' => 'form-spacing-top']) }}
		{{ Form::file('cover_image') }}
		
		{{ Form::label('hotel_slug', 'Hotel Slug:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('hotel_slug', null, array('class' => 'form-control', 'id' => 'hotel-slug', 'readonly')) }}
		
		{{ Form::label('hotel_description', 'Hotel Description:', ['class' => 'form-spacing-top']) }}
		{{ Form::textarea('hotel_description', null, array('class' => 'form-control')) }}
			
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
        getPut: '#hotel_slug',
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