<!DOCTYPE html>
<html>
<head>

    <title> {{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
</head>
<body>
       
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">EBulletin</a>
        </div>
 
        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    @if( Auth::user()->status == 'admin')
                                    <li><a class="dropdown-item" href="{{url('admin')}}" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Enter Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{url('bulletins/create')}}" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Create New BB</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{route('profile')}}" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> View Profile</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
        </div>
    </div>
</nav>
<div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
 
            <form class="form-horizontal" method="post">
<!-- Below for each loop display validation error messages -->
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
 <!-- Below if condition display sending email success message -->               
                @if (session('status'))
				    <div class="alert alert-success">
				        {{ session('status') }}
				    </div>
				@endif
 
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
 
                <fieldset>
                    <legend>Send Us your Enquiry</legend>
                     	<div class="form-group">
						  <label for="usr">Name:</label>
						  <input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="form-group">
						  <label for="email">Email:</label>
						  <input type="text" class="form-control" id="email" name="email" required>
						</div> 
						<div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" rows="3" id="enq_message" name="enq_message" required></textarea>
                        <span class="help-block">Feel free to ask us any question.</span>
                        
                    </div>
 
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>