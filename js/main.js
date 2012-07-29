/* Author:

*/
function initialize() {

  //Create the map
  map = new google.maps.Map(document.getElementById('map_canvas'), {
    mapTypeId: google.maps.MapTypeId.TERRAIN,
    center: new google.maps.LatLng(39.737571, -104.984708),
    zoom: 13
    
    
  });

  //Create the FusionTablesLayer
  layer = new google.maps.FusionTablesLayer(4728744, {
    query: "SELECT * FROM 4728744",
    suppressInfoWindows: true //IMPORTANT - this suppresses info windows so you can create your own
  });
  
  //Add a listener to the layer 
  google.maps.event.addListener(layer, 'click', 
    function(e){
      infowindow = new google.maps.InfoWindow();

      //Set the content of the infowindow to contain a form
      infowindow.setContent("<p>Please rate the segment: <b>" + e.row['legname'].value + "</b></p>" +
		"<form name='rate_form' action='php/process.php' method='post'>" +
		"<input type='hidden' name='legid' id='legid' value='" + e.row['legid'].value + "' />" +
		"<input type='hidden' name='legname' id='legname' value='" + e.row['legname'].value + "' />" +
		"<table class='ratings'>" +
		"<tr><td>Safety</td>" +
		"<td><select name='safety'><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option></select></td></tr>" +
		"<tr><td>Beauty</td>" +
		"<td><select name='beauty'><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option></select></td></tr>" +
		"<tr><td>Difficulty</td>" +
		"<td><select name='difficulty'><option value=1>1</option><option value=2>2</option><option value=3>3</option><option value=4>4</option><option value=5>5</option></select></td></tr>" +
		//"<tr><td></td><td></td></tr><tr><td colspan=2><input type=submit value='Rate'></td></tr>" +
		"<tr><td></td><td></td></tr><tr><td colspan=2><input type='submit' value='Rate' id='submit'></td></tr>" +
		"</table>" +
		"</form>" +
		"<div class='message'></div>"); 
      infowindow.setPosition(e.latLng);
      infowindow.open(map);
  });
  
  layer.setMap(map); 
  
}





$(document).ready(function(){
 
 	$("#rate_form").submit(function(e){
 		//e.preventDefault();
 		
 		$.ajax({
			type: "POST",
			url: "php/process.php",
			data: $("#rate_form").serialize(),
			success: function(msg) {
				$('.message').html(msg);
			}
		});
 	
    	return false;
	});
	
	$('#submit').click(function() {
		$.ajax({
			type: "POST",
			url: "php/process.php",
			data: $("#rate_form").serialize(),
			success: function(msg) {
				$('.message').html(msg);
			}
		});
		
	});
  
});
