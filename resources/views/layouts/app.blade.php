
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')| {{ config('app.name', 'Ebulletin') }}</title>
   
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/site.min.css')}}">
    <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">
    <!-- Plugins -->

    <link rel="stylesheet" href="{{asset('global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/waves/waves.css')}}">
        <link rel="stylesheet" href="{{asset('global/vendor/chartist/chartist.css')}}">
        <link rel="stylesheet" href="{{asset('global/vendor/jvectormap/jquery-jvectormap.css')}}">
        <link rel="stylesheet" href="{{asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">
        <link rel="stylesheet" href="{{asset('assets/examples/css/dashboard/v1.css')}}">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('global/fonts/material-design/material-design.min.css')}}">
    <link rel="stylesheet" href="{{asset('global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!--[if lt IE 9]>
    <script src="{{asset('global/vendor/html5shiv/html5shiv.min.js')}}"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="{{asset('global/vendor/media-match/media.match.min.js')}}"></script>
    <script src="{{asset('global/vendor/respond/respond.min.js')}}"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="{{asset('global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
      Breakpoints();
    </script>
    <style>
      nav.site-navbar.navbar.navbar-default.navbar-fixed-top.navbar-mega{
        background-color: #5a20c5d6;
     }
     .navbar-default .navbar-toolbar .nav-link {
         color:floralwhite;
    }
    </style>
  </head>
  <body class="animsition site-navbar-small dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    
      <div class="navbar-header">
            <a class="navbar-brand navbar-brand-center" href="{{url('/bulletins')}}">
                <img class="navbar-brand-logo navbar-brand-logo-normal" src="{{asset('assets/images/logo.png')}}"
                    title="Remark">
                <img class="navbar-brand-logo navbar-brand-logo-special" src="{{asset('assets/images/logo-colored.png')}}"
                    title="Remark">
                <span class="navbar-brand-text hidden-xs-down"> {{ config('app.name', 'Ebulletin') }}</span>
            </a>
      </div>
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          {{-- <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            &nbsp;
            <li class="nav-item"><a href="{{url('bulletins')}}">View Bulletin Boards</a></li>
            <li class="nav-item"><a href="{{url('bulletins/create')}}">Create Bulletin Board</a></li>    
          </ul> --}}
          <!-- Navbar Toolbar Right -->
          
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
        @guest
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button">
                {{ Auth::user()->name }}
                <span class="avatar avatar-online">
                  @if(is_null(Auth::user()->photo))
                  <img src="{{asset('images/profile/nopic.png')}}" alt="...">
                  @else
                  <img src="{{asset('images/profile/'.Auth::user()->photo)}}" alt="...">
                  @endif
                  <i></i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">
                @if( Auth::user()->status == 'admin' || Auth::user()->status == 'superadmin')
                <a class="dropdown-item" href="{{url('admin')}}" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Enter Dashboard</a>
                <a class="dropdown-item" href="{{url('bulletins/create')}}" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Create New BB</a>
               @endif
                {{-- <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-card" aria-hidden="true"></i> View Subscribed BB</a> --}}
                <a class="dropdown-item" href="{{route('profile')}}" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> View Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" role="menuitem" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                    <i class="icon md-power" aria-hidden="true"></i> 
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
          @endguest
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
      </div>
    </nav>    
       @yield('content')
    <!-- Footer -->
    {{-- <example></example> --}}
    {{-- <flash message="{{ session('flash') }}"></flash> --}}
    <footer class="site-footer">
        <div class="site-footer-legal">© 2018 Victor Alagwu 💻</div>
        <div class="site-footer-right">
          Crafted with <i class="red-600 icon md-favorite"></i> by Victor
        </div>
    </footer>
      <!-- Core  -->
      <script src="{{asset('global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
      <script src="{{asset('global/vendor/jquery/jquery.js')}}"></script>
      <script src="{{asset('global/vendor/popper-js/umd/popper.min.js')}}"></script>
      <script src="{{asset('global/vendor/bootstrap/bootstrap.js')}}"></script>
      <script src="{{asset('global/vendor/animsition/animsition.js')}}"></script>
      <script src="{{asset('global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
      <script src="{{asset('global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
      <script src="{{asset('global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
      <script src="{{asset('global/vendor/waves/waves.js')}}"></script>
      
      <!-- Plugins -->
     <script src="{{asset('global/vendor/switchery/switchery.js')}}"></script>
      <script src="{{asset('global/vendor/intro-js/intro.js')}}"></script>
      <script src="{{asset('global/vendor/screenfull/screenfull.js')}}"></script>
      <script src="{{asset('global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
          <script src="{{asset('global/vendor/chartist/chartist.min.js')}}"></script>
          <script src="{{asset('global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js')}}"></script>
          <script src="{{asset('global/vendor/jvectormap/jquery-jvectormap.min.js')}}"></script>
          <script src="{{asset('global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
          <script src="{{asset('global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script>
         
      <!-- Scripts -->
     <script src="{{asset('global/js/Component.js')}}"></script>
      <script src="{{asset('global/js/Plugin.js')}}"></script>
      <script src="{{asset('global/js/Base.js')}}"></script>
      <script src="{{asset('global/js/Config.js')}}"></script>
       
      <script src="{{asset('assets/js/Section/Menubar.js')}}"></script>
      <script src="{{asset('assets/js/Section/Sidebar.js')}}"></script>
      <script src="{{asset('assets/js/Section/PageAside.js')}}"></script>
      <script src="{{asset('assets/js/Plugin/menu.js')}}"></script>
      
      <!-- Config -->
      <script src="{{asset('global/js/config/colors.js')}}"></script>
      <script src="{{asset('assets/js/config/tour.js')}}"></script>
      <script>Config.set('assets', '{{asset("assets")}}');</script>
     
      <!-- Page -->
      <script src="{{asset('assets/js/Site.js')}}"></script>
      <script src="{{asset('global/js/Plugin/asscrollable.js')}}"></script>
      <script src="{{asset('global/js/Plugin/slidepanel.js')}}"></script>
      <script src="{{asset('global/js/Plugin/switchery.js')}}"></script>
          <script src="{{asset('global/js/Plugin/matchheight.js')}}"></script>
          <script src="{{asset('global/js/Plugin/jvectormap.js')}}"></script>
          <script src="{{asset('global/js/Plugin/peity.js')}}"></script>
      
          <script src="{{asset('assets/examples/js/dashboard/v1.js')}}"></script> 

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
                [ 'insert', [ 'link'] ],
                [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
            ]
             });
    });

</script>
      
    </body>
</html>
