<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
           <div class="content">
                <div class="title">Gambia Beds</div>
                <p class="lead">Administrator Login</p>
                @if(Auth::check())
				<script type="text/javascript">
				    window.location = "{{ url('/admin/dashboard') }}";//here double curly bracket
				</script>
				@else
				<h3>Admin Login</h3>
				<p><a href="{{ route('user.login') }}">Login</a></p>
				@endif
            </div>

        </div>
    </body>
</html>
