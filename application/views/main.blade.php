<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Social Pledge - Sharing is Caring</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/override.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="/assets/css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/assets/css/slider.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://bridge.paymill.de/"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="/assets/ico/favicon.png">
  </head>

  <body>
  <div class="container">
        @if( Auth::check() )

        <p style='text-align:right;'>
          <strong>Hello, {{ Auth::user()->first_name  }}!</strong>
        </p>

        @endif
      <div class="masthead">

        <ul class="nav nav-pills pull-right">
           <li @if(isset($link) && $link=='home')
            class='active' 
            @endif
            ><a href="{{ URL::home()  }}">Home</a></li>
           <li @if(!isset($link))
            class='active'
            @endif
            ><a href="{{ URL::to_action('charity@index') }}">All Charities</a></li>
           @if(! Auth::check() )
             <li><a href="{{ URL::to('auth/session/facebook') }}">Sign In</a></li>
           @else
            <li><a href="{{ URL::to_action('auth@logout') }}">Sign out</a></li>
           @endif
<!--            <li><a href="about.php">About</a></li>
 -->        </ul>

         <h3 class="muted"><a href="{{ URL::home() }}"><img src="{{ URL::to_asset('images/logo.png') }}"></a></h3>
      </div>

      <hr>

      @yield('content')

	<hr />
<div class="footer">
  <div class="row">
    <div class="span3">
      <h3>Contact Us</h3>
      <address>
      <strong>Social Pledge Inc.</strong><br>
      Gower St, UCL<br>
      London, Gower St<br>
      <abbr title="Phone">P:</abbr> (020) 7679-2000
      </address>
      <address>
      <strong>Full Name</strong><br>
      <a href="mailto:#">social.pledge@ucl.ac.uk</a>
      </address>
    </div>
    <div class="span3">
      <h3>Site Map</h3>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/charity/index">All Charities</a></li>
      </ul>
    </div>
    <div class="span3">
      <h3>Supporters</h3>
      <img src="/assets/img/level39logo.jpg" />
      <img src="/assets/img/ucllogo.jpg" />
    </div>
  </div>
  <p>&copy; Social Pledge 2013</p>
</div>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="/assets/js/bootstrap-transition.js"></script>
    <script src="/assets/js/bootstrap-alert.js"></script>
    <script src="/assets/js/bootstrap-modal.js"></script>
    <script src="/assets/js/bootstrap-dropdown.js"></script>
    <script src="/assets/js/bootstrap-scrollspy.js"></script>
    <script src="/assets/js/bootstrap-tab.js"></script>
    <script src="/assets/js/bootstrap-tooltip.js"></script>
    <script src="/assets/js/bootstrap-popover.js"></script>
    <script src="/assets/js/bootstrap-button.js"></script>
    <script src="/assets/js/bootstrap-collapse.js"></script>
    <script src="/assets/js/bootstrap-carousel.js"></script>
    <script src="/assets/js/bootstrap-typeahead.js"></script>
   
    <script src="/assets/js/bootstrap-slider.js"></script> 
    <script>
        $(function(){ $('.sl1').slider(); });
    </script>  
    <!-- Load JS here for greater good =============================-->    
    <script src="/assets/js/jquery.dropkick-1.0.0.js"></script>
    <script src="/assets/js/custom_checkbox_and_radio.js"></script>
    <script src="/assets/js/custom_radio.js"></script>
    <script src="/assets/js/jquery.tagsinput.js"></script>
    <script src="/assets/js/bootstrap-tooltip.js"></script>
    <script src="/assets/js/jquery.placeholder.js"></script>
    <script src="http://vjs.zencdn.net/c/video.js"></script>
    <script src="/assets/js/application.js"></script>


    @yield('scripts')


    <!--[if lt IE 8]>
      <script src="js/icon-font-ie7.js"></script>
      <script src="js/icon-font-ie7-24.js"></script>
    <![endif]-->
  </body>
</html>
