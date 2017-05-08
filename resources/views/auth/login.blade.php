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
                <p>Administrator Login</p>
				<!--<p><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></p>
                <p><a href="#">Manage Bookings</a></p>
                <p><a href="#">Manage Customer Accounts</a></p>
                <p><a href="#">System Settings</a></p>-->
            </div>

            {!! Form::open() !!}
    
			{{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
        
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', null, ['class' => 'form-control']) }}
			
			{{ Form::checkbox('remember') }}
			
			{{ Form::submit('Login') }}
			
            {!! Form::close() !!}
        </div>
    </body>
</html>
