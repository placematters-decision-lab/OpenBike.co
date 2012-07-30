/* Author:

*/
function initialize() {

  //Create the map
  map = new google.maps.Map(document.getElementById('map_canvas'), {
    mapTypeId: google.maps.MapTypeId.TERRAIN,
    center: new google.maps.LatLng(39.737571, -104.984708),
    zoom: 13
    
    
  });

  //Create Bike Route layer
  routeLayer = new google.maps.FusionTablesLayer(4728744, {
    query: "SELECT * FROM 4728744",
    suppressInfoWindows: true //IMPORTANT - this suppresses info windows so you can create your own
  });
  
  //Create Bike Storage layer
  rackLayer = new google.maps.FusionTablesLayer(4733987, {
   query: "SELECT * FROM 4733987",
    suppressInfoWindows: true //IMPORTANT - this suppresses info windows so you can create your own
  });
  
  //Create Bike Safety layer
  safetyLayer = new google.maps.FusionTablesLayer(4735432, {
   query: "SELECT * FROM 4735432 WHERE risk>4",
    suppressInfoWindows: true //IMPORTANT - this suppresses info windows so you can create your own
  });
  
  //Add a listener to the layer 
  google.maps.event.addListener(routeLayer, 'click', 
    function(e){
    	// display leg rating toolbar
    	openLegToolbar();
    	
    	// add route data to for
    	var legName = e.row['legname'].value;
    	var legId = e.row['legid'].value;
    	
    	//$('#leg_list').append("<li class='leg'>"+legName+": <span class='leg_id'>"+legId+"</span><span class='del_item'> [x]</span></li>");
    	$('#leg_list').append("<li class='leg'>"+legName+": <span class='leg_id'>"+legId+"</span><span class='del_item'> [x]</span></li>");
    	removeLeg();
    	
	  	var totalString = $('#legstring').val();
	  	if (totalString == "" || totalString == null) {
		  	$('#legstring').val(legId);
	  		
	  	} else {
		  	$('#legstring').val(totalString+','+legId);
	  	}
	  	var totalNameString = $('#legnamestring').val();
	  	if (totalNameString=="" || totalNameString == null) {
	  		$('#legnamestring').val(legName);
		} else {
	  		$('#legnamestring').val(totalNameString+','+legName);
	  	}
	  	
  });
  
  routeLayer.setMap(map); 
  rackLayer.setMap(map);
  //safetyLayer.setMap(map);
  
}


function toggleLayer( layer, map ){
     layer.setMap( layer.getMap() ? null : map );
}

function openLegToolbar() {
	var routeRanker = $('#route_ranker');
	var legToolbar = $('#route_ranker_wrapper');
	var legToolbarText = $('#route_ranker_toolbar');

	// determine if open
	if ( routeRanker.is(':visible') ) {	
		// if open, leave open
		
	// if not open, open
	} else {
		routeRanker.show();
			
		legToolbar.animate({
			height:'+=250px',
		},500,function(){
			legToolbarText.html('Minimize');
		});		
	}
}


function removeLeg() {
	$('.del_item').click(function() {
		$(this).parent().remove();
	});
}

function toggleBikeLayer() {
	// toggle bike rack layer
	$('#rack_toggle').change(function() {
		toggleLayer('rackLayer','map');
	});
}


function submitForm() {
	// set values of sliders
	var dataString = "";
	
	dataString += "legid=" + $('#beauty_slider').slider("option","value");
	data = {'legid':$('#legstring').val(),'legname':$('#legnamestring').val(),
	'beauty':$('#beauty_slider').slider("option","value"),
	'ease':$('#difficulty_slider').slider("option","value"),
	'safety':$('#safety_slider').slider("option","value"),
	};
	// gather all leg
	// send data to process.php

 		//e.preventDefault();
 		
 		$.ajax({
			type: "POST",
			url: "php/insertRatingMultiple.php",
			data: data,
			success: function(msg) {
				alert(msg);
			}
		});
}

$(document).ready(function(){
	
	// show/hide ranking tool
	$('#route_ranker_toolbar').click(function() {
		var routeRanker = $('#route_ranker');
		var legToolbar = $('#route_ranker_wrapper');
		var legToolbarText = $('#route_ranker_toolbar');

		// determine if open
		if ( routeRanker.is(':visible') ) {		
			// if open, change text and hide
			legToolbar.animate({
				height:'-=250px',
			},500, function() {
				routeRanker.hide();
				legToolbarText.html('Maximize');
			})
		} else {	
			// else change text and show
		routeRanker.show();
			
		legToolbar.animate({
			height:'+=250px',
		},500,function(){
			legToolbarText.html('Minimize');
		});		
		}
	});

	// Load control toolbar
	$('#controls').load('php/controls.php').dialog({
		position: ['left','top'],
		title: 'Map Layers',
		resizable: false
	});
	
	// Load Rankings Dialog
	$('#ranking').load('php/ranking2.php').dialog({
		position: ['right','top'],
		title: 'Route Rankings',
		zIndex: 9
	});
	
	$(function() {
		$( ".slider" ).slider({value:50});
		$(".button").button();
	});

	
	$('#rateSubmit').click(function() {
		submitForm();
		
	});
	
});


