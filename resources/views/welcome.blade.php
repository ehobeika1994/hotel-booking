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
                @if(Auth::check())
				<p><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></p>
				<p><a href="{{ route('manage-customer.index') }}">Manage Customer Accounts</a></p>
				<p><a href="{{ route('manage-bookings.index') }}">Manage Bookings</a></p>
                <p><a href="#">System Settings</a></p>
				@else
				<h3>Admin Login</h3>
				<p><a href="{{ route('user.login') }}">Login</a></p>
				<h3>Customer Registration</h3>
				<p><a href="">Register</a></p>
				@endif
            </div>

        </div>
    </body>
</html>
