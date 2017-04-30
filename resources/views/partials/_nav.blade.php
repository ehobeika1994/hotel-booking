 <!-- Default Bootstrap NavBar -->
	  	<nav class="navbar navbar-default">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Gambia Beds</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
		      </ul>
		      @if(Auth::check())
		      <ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">System Settings<span class="caret"></span></a>
		          
		          <ul class="dropdown-menu">
			        
		            <li><a href="{{ route('manage-hotels.index') }}">Manage Hotels</a></li>
		            <li><a href="{{ route('manage-customer.index') }}">Manage Customers</a></li>
		            <li><a href="">View Bookings</a></li>
		            <li><a href="{{ route('user.logout') }}">Logout</a></li>
		            <li role="separator" class="divider"></li>
		            @else
		            <li><a href="">Login</a></li>
		            <li><a href="">Register</a></li>

		          </ul>

		        </li>
		      </ul>
		      		            @endif
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
