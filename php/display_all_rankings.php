<?php

include 'ranking_new_all.php';

?>
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

    <title>Open Bike - Bike rides made social</title>
    <meta name="description" content="">

    <!-- Mobile viewport optimized: h5bp.com/viewport -->
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

    <link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.24.custom.css">
	

    <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

	<script src="../js/jquery-ui-1.8.24.custom.min.js"></script>
    <script src="../js/vendor/modernizr-2.6.1.min.js"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB31yLcjlGPKHBV_d7uJrIw7JflR-HHlbI&sensor=false"></script>
    <script src="../js/main.js"></script>
    <script src="../js/plugins.js"></script>

	<style TYPE="text/css">

	</style>
</head>
<div id="rankings_list">
			<h1>All Routes</h1>
			<table id="all_rank">
				
				<tr>
					<td>Route Name</td>
					<td>Route Rating</td>
				</tr>				<?php				$index = 0;				foreach($top as $item) {				echo "<tr>";				echo "<td class=\"route_name\">";				echo $item[0];				echo "</td>";				echo "<td class=\"route_score\">";				echo substr($item[1],0,3);				echo "</td>";				echo "</tr>";				}				
								?>

			</table>
		<a href="http://openbike.co" class="bottom">Home</a>
	</div><!-- #rankings -->
