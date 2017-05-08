<!DOCTYPE html>
<html lang="en">
	<head>
		@include('partials._head')
	</head>
	
	<body>
		@include('partials._nav')
		
		<div class="container">
			@include('partials._messages')
			
 			<p>{{ Auth::check() ? "Logged In as" : "Logged Out" }} <b>{{ Auth::user()->name }}</b></p>
 			<p>Last Login at <b>{{ Auth::user()->updated_at }}</b></p>
 			<p> {{ Session::get('id') }}</p>

 					
			@yield('content')
			<hr/>
			@include('partials._footer')
		</div><!-- /. container -->
		@include('partials._scripts')
		@yield('scripts')
	</body>
</html>