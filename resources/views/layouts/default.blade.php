<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  
    <title> {{ config('app.name') }}</title>

    <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('global/css/bootstrap-extend.min.css')}}">
     <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('global/vendor/waves/waves.css')}}">

      <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('global/fonts/material-design/material-design.min.css')}}">
    <link rel="stylesheet" href="{{asset('global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
   
 
   <style>
    body{padding-bottom: 100px;}
     .level {display:flex; align-items:center;}
     .flex{flex:1;}
   </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                      {{ config('app.name') }} 
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                    <li><a href="/bulletins">All Bulletins</a></li>
                    <li><a href="/bulletins/create">New Bulletin</a></li>
                    </ul>

 
                    <!-- Right Side Of Navbar -->
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
                                    @if( Auth::user()->status == 'admin' || Auth::user()->status == 'superadmin')
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

        @yield('content')
        {{-- <example></example> --}}
        {{-- <flash message="{{ session('flash') }}"></flash> --}}
    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/jquery.js') }}"></script> -->
    <!-- <script src="{{ asset('js/popper.js') }}"></script> -->
    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('summernote/summernote.js') }}"></script>  
      
 
<script>
    $(document).ready(function() {
        
            $(".summernote").summernote({
            height: 300,
            toolbar: [
                [ 'style', [ 'style' ] ],
                [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ],
                [ 'fontsize', [ 'fontsize' ] ],
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                [ 'table', [ 'table' ] ],
                [ 'insert', [ 'link'] ],
                [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
            ]
             });
    });

</script> 
</body>
</html>
