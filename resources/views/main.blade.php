<!DOCTYPE html>
<html lang="en">
	<head>
		@include('partials._head')
	</head>
	
	<body>
		@include('partials._nav')
		
		<div class="container">
			@include('partials._messages')
			
			@yield('content')
			<hr/>
			@include('partials._footer')
		</div><!-- /. container -->
		@include('partials._scripts')
		@yield('scripts')
	</body>
</html>