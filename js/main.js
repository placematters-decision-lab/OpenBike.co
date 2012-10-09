/* Author:

*/
function initialize() {

  var styles = [
    {
      stylers: [
        { hue: "" },
        { saturation: -100 }
      ]
    },{
      featureType: "road",
      elementType: "geometry",
      stylers: [
        { lightness: 100 },
        { visibility: "simplified" }
      ]
    },{
      featureType: "road",
      elementType: "labels",
      stylers: [
        { visibility: "off" }
      ]
    }
  ];


  
  
  //Create the map
  map = new google.maps.Map(document.getElementById('map_canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: new google.maps.LatLng(39.737571, -104.984708),
    zoom: 13
  });
  
  map.setOptions({styles: styles});

  //Create Bike Route layer
  routeLayer = new google.maps.FusionTablesLayer(5369349, {
    query: "SELECT * FROM 5369349",
    suppressInfoWindows: true //IMPORTANT - this suppresses info windows so you can create your own
  });
  
  //Create Bike Storage layer
  rackLayer = new google.maps.FusionTablesLayer(4733987, {
   query: "SELECT * FROM 4733987",
    suppressInfoWindows: true //IMPORTANT - this suppresses info windows so you can create your own
  });
  
  //Create Bike Crash layer
  crashLayer = new google.maps.FusionTablesLayer(4735432, {
   query: "SELECT * FROM 4735432 WHERE risk>4",
    suppressInfoWindows: true //IMPORTANT - this suppresses info windows so you can create your own
  });  

  //Create Bike Beauty layer
  beautyLayer = new google.maps.FusionTablesLayer(5390867, {
   query: "SELECT * FROM 5390867",
    suppressInfoWindows: true //IMPORTANT - this suppresses info windows so you can create your own
  });
  
  //Create Bike Ease layer
  easeLayer = new google.maps.FusionTablesLayer(5390961, {
   query: "SELECT * FROM 5390961",
    suppressInfoWindows: true //IMPORTANT - this suppresses info windows so you can create your own
  });
  
  //Create Bike Safety layer
  safetyLayer = new google.maps.FusionTablesLayer(5390390, {
   query: "SELECT * FROM 5390390",
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
  //rackLayer.setMap(map);
  crashLayer.setMap(map);
  
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
	// Control map layer toggle checkboxes
	$('#routes_toggle').change(function() {
		if ($(this).is(':checked')) {
			routeLayer.setMap(map); // show
		} else {
			routeLayer.setMap(null); // hide
		}
	});
	$('#rack_toggle').change(function() {
		if ($(this).is(':checked')) {
			rackLayer.setMap(map); // show
		} else {
			rackLayer.setMap(null); // hide
		}
	});
	$('#crash_toggle').change(function() {
		if ($(this).is(':checked')) {
			crashLayer.setMap(map); // show
		} else {
			crashLayer.setMap(null); // hide
		}
	});
	$('#beauty_toggle').change(function() {
		if ($(this).is(':checked')) {
			beautyLayer.setMap(map); // show
		} else {
			beautyLayer.setMap(null); // hide
		}
	});
	$('#beauty_toggle').change(function() {
		if ($(this).is(':checked')) {
			beautyLayer.setMap(map); // show
		} else {
			beautyLayer.setMap(null); // hide
		}
	});
	$('#ease_toggle').change(function() {
		if ($(this).is(':checked')) {
			easeLayer.setMap(map); // show
		} else {
			easeLayer.setMap(null); // hide
		}
	});
	$('#safety_toggle').change(function() {
		if ($(this).is(':checked')) {
			safetyLayer.setMap(map); // show
		} else {
			safetyLayer.setMap(null); // hide
		}
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
	$('#controls').load('php/controls.php', function() {
		 toggleBikeLayer()
	});
	
	// Load Rankings Dialog
	$('#ranking').load('php/ranking2.php');
	
	$('#sharethis').click(function(){
		$(this).load('cgi-bin/share.php').dialog({
			title: 'Share',
			position: 'top',
			resizable: false
		});
	});
	
	$(function() {
		$( ".slider" ).slider({value:50});
		$(".button").button();
	});

	
	$('#rateSubmit').click(function() {
		submitForm();
	});
	

});


