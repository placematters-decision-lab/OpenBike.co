
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Open Bike</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="css/smoothness/jquery-ui-1.8.24.custom.css">
	
	<script src="/js/vendor/jquery-1.7.2.min.js"></script>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.7.2.min.js"><\/script>')</script>
	
	<script src="js/jquery-ui-1.8.24.custom.min.js"></script>
	
	
    <script src="/js/vendor/modernizr-2.6.1.min.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB31yLcjlGPKHBV_d7uJrIw7JflR-HHlbI&sensor=false"></script>
    <script src="/js/main.js"></script>
    <script src="/js/plugins.js"></script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body onload="initialize()">

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner"><div class="navbar-color">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><img src="img/open_bike_logo.png"></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="#" id="rate_button">Rate</a></li>
              <li><a href="#about">Find</a></li>
              <li><a href="#contact">Explore</a></li>
              <li><a href="#contact">Challenge</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div></div>
    </div>


		  <div class="content">

		    <div class="wrapper">
		      <div class="proper-content">
		        <div id="map_canvas"></div>
					
	
				<div class="right-sidebar"><div class="right-sidebar-color">
					<div class="pull"></div>
					<div id="controls"></div>
					<div id="ranking"></div>

				</div></div><!-- .right-sidebar -->
				
				<div class="directions_panel"><div id="directions_panel-color">
					<div class="pull"></div>

					<h2>Directions</h2>

					<h3 id="total"></h3>
				</div></div><!-- #directionsPanel -->
				
				<div class="route_ranker_wrapper"><div class="route_ranker_wrapper-color">
					
					  <div class="route_ranker">
						<form id="rank_form">
							<div id="rank_controls">

								<table>
									<tr>
										<td class="left_label label">Ugly</td>
										<td><h3>Beauty</h3></td>
										<td class="label">Pretty</td>
									</tr>
									<tr class="slide_hold">
										<td colspan="3" class="slider_row"><div id="beauty_slider" class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 50%; "></a></div></td>
									</tr>
									<tr>
										<td class="left_label label">Hard</td>
										<td><h3>Ease</h3></td>
										<td class="label">Easy</td>
									</tr>
									<tr class="slide_hold">
										<td colspan="3" class="slider_row"><div id="difficulty_slider" class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 50%; "></a></div></td>
									</tr>
									<tr>
										<td class="left_label label">Dangerous</td>
										<td><h3>Safety</h3></td>
										<td class="label">Safe</td>
									</tr>
									<tr class="slide_hold">
										<td colspan="3"><div id="safety_slider" class="slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 50%; "></a></div></td>
									</tr>
								</table>
							</div>

							<div id="route_info">
								<h2>Leg Name</h2>
								<ul id="leg_list"><input type="hidden" name="legstring" id="legstring" value=""><input type="hidden" name="legnamestring" id="legnamestring" value=""></ul>

								<input type="button" value="Rate Route" class="button ui-button ui-widget ui-state-default ui-corner-all" id="rateSubmit" role="button" aria-disabled="false">
							</div>
							
							<!-- <div id="social">
								<h4>Share My Route</h4>
								<span id="sharethis">Share My Route</span>
							</div><!-- #social -->
						</form>
					  </div><!-- #route_ranker -->
					  <div class="route_ranker_toolbar">Maximize</div>
				  </div></div><!-- .route_ranker_wrapper -->
  
		      </div><!-- /.proper-content -->

		      <div class="push"></div>

		    </div><!-- /.wrapper -->

		    <div class="footer-wrapper"><div class="footer-color">
					<footer>
						<ul>
							<li><a href="">about</a></li>
							<li><a href="">help</a></li>
							<li><a href="">contact</a></li>
						</ul>
						<div class="clearfix"></div>
					</footer>
		    </div></div>
		  </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/bootstrap-transition.js"></script>
    <script src="/js/bootstrap-alert.js"></script>
    <script src="/js/bootstrap-modal.js"></script>
    <script src="/js/bootstrap-dropdown.js"></script>
    <script src="/js/bootstrap-scrollspy.js"></script>
    <script src="/js/bootstrap-tab.js"></script>
    <script src="/js/bootstrap-tooltip.js"></script>
    <script src="/js/bootstrap-popover.js"></script>
    <script src="/js/bootstrap-button.js"></script>
    <script src="/js/bootstrap-collapse.js"></script>
    <script src="/js/bootstrap-carousel.js"></script>
    <script src="/js/bootstrap-typeahead.js"></script>
    
	<script>
		var _gaq=[['_setAccount','UA-33720151-1'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>


  </body>
</html>
