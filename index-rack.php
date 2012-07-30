<?php include 'php/ranking.php'; ?>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!-- Consider specifying the language of your content by adding the `lang` attribute to <html> -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <!-- Use the .htaccess and remove these lines to avoid edge case issues.
         More info: h5bp.com/i/378 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Rad Routes - Bike rides made social</title>
    <meta name="description" content="">

    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

    <link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.22.custom.css">
	

    <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.7.2.min.js"><\/script>')</script>
	<script src="js/jquery-ui-1.8.22.custom.min.js"></script>
    <script src="js/vendor/modernizr-2.6.1.min.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB31yLcjlGPKHBV_d7uJrIw7JflR-HHlbI&sensor=false"></script>
    <script src="js/main-rack.js"></script>
    <script src="js/plugins.js"></script>

</head>
<body onload="initialize()">
    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
         chromium.org/developers/how-tos/chrome-frame-getting-started -->
    <!--[if lt IE 7]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    <!-- Add your site or application content here -->
  <div id="blanket">
  	<div id="map_canvas"></div>
	<div id="controls"></div>
	<div id="ranking"></div>

  </div><!-- #wrapper -->
  <div id="route_ranker_wrapper">
  	<div id="route_ranker_toolbar">Maximize</div>
  	<form id="rank_form">
  	  <div id="route_ranker">
		<h4>Rank your Route</h4>
  		<table>
  			<tr>
  				<td colspan="3" class="rank_category">Beauty</td>
  			</tr>
  			<tr class="slide_hold">
  				<td class="left_label label">Ugly</td>
  				<td><div id="beauty_slider" class="slider"></div></td>
  				<td class="label">Pretty</td>
  			</tr>
  			<tr>
  				<td colspan="3" class="rank_category">Ease</td>
  			</tr>
  			<tr class="slide_hold">
  				<td class="left_label label">Hard</td>
  				<td><div id="difficulty_slider" class="slider"></div></td>
  				<td class="label">Easy</td>
  			</tr>
  			<tr>
  				<td colspan="3" class="rank_category">Safety</td>
  			</tr>
  			<tr class="slide_hold">
  				<td class="left_label label">Dangerous</td>
  				<td><div id="safety_slider" class="slider"></div></td>
  				<td class="label">Safe</td>
  			</tr>
  		</table>
  		
  	  </div>
  	  <div id="route_info">
  		<h4>Leg Name</h4>
  		<ul id="leg_list"><input type='hidden' name='legstring' id='legstring' value="" /><input type='hidden' name='legnamestring' id='legnamestring' value="" /></ul>
  		
  		<input type="button" value="Rate Route" class="button" id="rateSubmit">
  	  </div>
  	</form>
  	<div class="message"></div>
  </div>
	
	<script type="text/javascript">
	
	</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    <!-- JavaScript at the bottom for fast page loading: http://developer.yahoo.com/performance/rules.html#js_bottom -->

    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->

    <!-- scripts concatenated and minified via build script -->
    <!-- end scripts -->

    <script>
        var _gaq=[['_setAccount','UA-33720151-1'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>
