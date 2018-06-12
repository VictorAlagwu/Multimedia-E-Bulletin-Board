
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>{{ config('app.name', 'Ebulletin') }}  | Dashboard</title>
    
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/site.min.css')}}">
    
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
  </head>
  <body class="animsition site-navbar-small dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon md-more" aria-hidden="true"></i>
        </button>
    <a class="navbar-brand navbar-brand-center" href="{{url('/bulletins')}}">
          <img class="navbar-brand-logo navbar-brand-logo-normal" src="{{asset('assets/images/logo.png')}}"
            title="Ebulletin">
          <img class="navbar-brand-logo navbar-brand-logo-special" src="{{asset('assets/images/logo-colored.png')}}"
            title="Ebulletin">
          <span class="navbar-brand-text hidden-xs-down"> {{ config('app.name', 'Ebulletin') }}</span>
        </a>
      
      </div>
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
            <li class="nav-item hidden-sm-down" id="toggleFullscreen">
              <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                <span class="sr-only">Toggle fullscreen</span>
              </a>
            </li>
           
           
          </ul>
          <!-- End Navbar Toolbar -->
    
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
              <li class="nav-item dropdown">
                  <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                    data-animation="scale-up" role="button">
                    {{ Auth::user()->name }}
                    <span class="avatar avatar-online">
                        @if(is_null(Auth::user()->photo))
                        <img src="{{asset('images/profile/avatar.png')}}" alt="...">
                        @else
                        <img src="{{asset('images/profile/'.Auth::user()->photo)}}" alt="...">
                        @endif
                      <i></i>
                    </span>
                  </a>
                  <div class="dropdown-menu" role="menu">
                    @if( Auth::user()->status == 'admin')
                    <a class="dropdown-item" href="{{url('bulletins/create')}}" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Create New BB</a>
                   @endif
                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-card" aria-hidden="true"></i> View Subscribed BB</a>
                    {{-- <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Settings</a> --}}
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
            {{-- <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon md-notifications" aria-hidden="true"></i>
                <span class="badge badge-pill badge-danger up">5</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <div class="dropdown-menu-header">
                  <h5>NOTIFICATIONS</h5>
                  <span class="badge badge-round badge-danger">New 5</span>
                </div>
    
                <div class="list-group">
                  <div data-role="container">
                    <div data-role="content">
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon md-receipt bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">A new order has been placed</h6>
                            <time class="media-meta" datetime="2017-06-12T20:50:48+08:00">5 hours ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon md-account bg-green-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Completed the task</h6>
                            <time class="media-meta" datetime="2017-06-11T18:29:20+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon md-settings bg-red-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Settings updated</h6>
                            <time class="media-meta" datetime="2017-06-11T14:05:00+08:00">2 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon md-calendar bg-blue-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Event started</h6>
                            <time class="media-meta" datetime="2017-06-10T13:50:18+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item dropdown-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <i class="icon md-comment bg-orange-600 white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Message received</h6>
                            <time class="media-meta" datetime="2017-06-10T12:34:48+08:00">3 days ago</time>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu-footer">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon md-settings" aria-hidden="true"></i>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    All notifications
                  </a>
                </div>
              </div>
            </li> --}}
         
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <div class="input-search">
                <i class="input-search-icon md-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav>    
      @yield('content')
    <!-- Footer -->
    <footer class="site-footer">
        <div class="site-footer-legal">© 2018 Victor Alagwu</div>
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
          <script src="{{asset('global/vendor/peity/jquery.peity.min.js')}}"></script>
      
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
      
    </body>
  </html>