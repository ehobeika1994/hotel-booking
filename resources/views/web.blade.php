<!DOCTYPE html>
<html lang="en">
	<head>
		@include('part._head')
	</head>
	
	<body id="page-top">
		@include('part._nav')
		
			@include('part._messages')
		
 					
			@yield('content')
			<hr/>
			@include('part._footer')

		@include('part._scripts')
		@yield('scripts')
	</body>
</html>