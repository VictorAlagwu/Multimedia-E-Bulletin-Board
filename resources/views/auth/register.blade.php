<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>Register | E-Bulletin</title>
    
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon.pns')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ics')}}">
    
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
        <link rel="stylesheet" href="{{asset('assets/examples/css/pages/register-v2.css')}}">
    
    
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
  <body class="animsition page-register-v2 layout-full page-dark">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content">
          <div class="page-brand-info">
            <div class="brand">
              <img class="brand-img" src="{{asset('assets/images/logo@2x.png')}}" alt="...">
              <h2 class="brand-text font-size-40">EBulletin</h2>
            </div>
            <p class="font-size-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
  
          <div class="page-register-main">
            <div class="brand hidden-md-up">
              <img class="brand-img" src="{{asset('assets/images/logo-colored@2x.png')}}" alt="...">
              <h3 class="brand-text font-size-40">EBulletin</h3>
            </div>
            <h3 class="font-size-24">Sign Up</h3>
            <p>Have account already? Please go to <a href="{{route('login')}}">Sign In</a></p>
  
            <form role="form" autocomplete="on" class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
              <div class="form-group form-material floating {{ $errors->has('name') ? ' has-error' : '' }}" style="color: #ff00009c;" data-plugin="formMaterial">
                <input type="text" class="form-control empty" id="inputName" name="name">
                <label class="floating-label" for="inputName">Name</label>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group form-material floating {{ $errors->has('email') ? ' has-error' : '' }}" style="color: #ff00009c;" data-plugin="formMaterial">
                <input type="email" class="form-control empty" id="inputEmail" name="email">
                <label class="floating-label" for="inputEmail">Email</label>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group form-material floating">
                    <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" autofocus> 
                    <label for="date_of_birth" class="floating-label">Date of Birth</label>
              </div>
              <div class="form-group form-material floating">
                    @include('partials.test')
              </div>
              
              <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input type="text" class="form-control empty" id="inputCity" name="city">
                    <label class="floating-label" for="inputCity">City</label>
              </div>
            
              <div class="form-group form-material floating" data-plugin="formMaterial">
                <input type="password" class="form-control empty {{ $errors->has('password') ? ' has-error' : '' }}" id="inputPassword" name="password">
                <label class="floating-label" for="inputPassword">Password</label>
                @if ($errors->has('password'))
                  <span class="help-block" style="color: #ff00009c;">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group form-material floating" data-plugin="formMaterial">
                <input type="password" class="form-control empty" id="inputPasswordCheck" name="password_confirmation">
                <label class="floating-label" for="inputPasswordCheck">Retype Password</label>

              </div>
              <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </form>
  
            
            <footer class="page-copyright">
              <p>It Another One</p>
              <p>© 2018. Victor Alagwu.</p>
            </footer>
          </div>
  
        </div>
      </div>
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
        <script src="{{asset('global/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
    
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
        <script src="{{asset('global/js/Plugin/jquery-placeholder.js')}}"></script>
        <script src="{{asset('global/js/Plugin/animate-list.js')}}"></script>
        <script src="{{asset('global/js/Plugin/material.js')}}"></script>
    
    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
    
  </body>
</html>

