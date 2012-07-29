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

    <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.7.2.min.js"><\/script>')</script>

    <script src="js/vendor/modernizr-2.6.1.min.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB31yLcjlGPKHBV_d7uJrIw7JflR-HHlbI&sensor=false"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins.js"></script>

</head>
<body onload="initialize()">
    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
         chromium.org/developers/how-tos/chrome-frame-getting-started -->
    <!--[if lt IE 7]><p class="chromeframe">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    <!-- Add your site or application content here -->
  <div id="blanket">
  	<div id="map_canvas"></div>
	
	
	<div id="rankings">
			<table id="top_rank">
				<th>Top Ranked Routes</th>
				<tr>
					<td>Route Name</td>
					<td>Route Rating</td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $top[0][0]; ?></td>
					<td class="route_score"><?php echo substr($top[0][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $top[1][0]; ?></td>
					<td class="route_score"><?php echo substr($top[1][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $top[2][0]; ?></td>
					<td class="route_score"><?php echo substr($top[2][1],0,3); ?></td>
				</tr>
			</table>
			<table id="bottom_rank">
				<th>Bottom Ranked Routes</th>
				<tr>
					<td>Route Name</td>
					<td>Route Rating</td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $bottom[0][0]; ?></td>
					<td class="route_score"><?php echo substr($bottom[0][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $bottom[1][0]; ?></td>
					<td class="route_score"><?php echo substr($bottom[1][1],0,3); ?></td>
				</tr>
				<tr>
					<td class="route_name"><?php echo $bottom[2][0]; ?></td>
					<td class="route_score"><?php echo substr($bottom[2][1],0,3); ?></td>
				</tr>
			</table>
	</div><!-- #rankings -->

  </div><!-- #wrapper -->
  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

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
