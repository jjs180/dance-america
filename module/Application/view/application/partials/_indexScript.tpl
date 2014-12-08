<script type="text/javascript"
      src="https://maps.google.com/maps/api/js?v=3.5?key=AIzaSyBn99HZM0GslyS6nVachiC6QVGrJP27-6E">
</script>
<script type='text/javascript'>
// JQUERY UPDATE VIEW
//  MAP CONFIG
var last = {
			time : new Date(),    // last time we let an event pass.
            x    : -100,          // last x position af the event that passed.
            y    : -100};         // last y position af the event that passed.
var period = 800; // ms - don't let pass more than one event every 100ms.
var space  = 2;   // px - let event pass if distance between the last and
                  //      current position is greater than 2 px.
var iconURLPrefix = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=';
				  

function initialize () {
	map_div = document.getElementById("map")
	var mapOptions = {
      center: new google.maps.LatLng(-34.397, 150.644),
      zoom: 8
    };
    var map = new google.maps.Map(document.getElementById("map"),
        mapOptions);
		var showIcons = $j('#eventVenues-toggle').text();
		
		var locations = [
		{foreach $eventModelsArray eventModel}
			["<ul class='eventInformation-list'>{if $eventModel.name}<li><label>Name of the Event:</label><div>{$eventModel.name}</div></li>{/if}<li><label>Venue:</label><div>{$eventModel.venue.name}</div></li>{if $eventModel.web_links}<li><label>Websites:</label>{assign var= websites value=';'|explode:$eventModel.web_links}<ul>{foreach $websites website}<li>{$website}</li>{/foreach}</ul></li>{/if}{if $eventModel.repetitions != []}<label>Repetition Details:</label><ul>This event will repeat every{foreach $eventModel.repetitions repetition}{if $repetition.repetition_parameter == 'weeks'}<li>&nbsp;&nbsp;- {$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on {$repetition.day_of_week}s</li>{elseif $repetition.repetition_parameter == 'months' || $repetition.repetition_parameter == 'years'}<li>&nbsp;&nbsp;-{$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on the {$repetition.day_of_month}{if substr($repetition.day_of_month, -1) == '2'}nd{elseif substr($repetition.day_of_month, -1) == '3'}rd {elseif $repetition.day_of_month != 'last'}st{/if} {$repetition.day_of_week}{if $repetition.month_of_year} in&nbsp;{$repetition.month_of_year}{/if}</li>{else}&nbsp;day of the week</li>{/if}{/foreach}</ul>{else}<label>One Time Event:</label><div>{$eventModel.start_date|date_format} -{$eventModel.end_date|date_format}</div>{/if}<li><label>Time:</label> {$eventModel.start_time|date_format: '%I:%M %p'} - {$eventModel.end_time|date_format: '%I:%M %p'}</li>{if $eventModel.costs != []}<li><label>Cost:</label><ul>{foreach $eventModel.costs cost}<li>{$cost.person_type} pay ${$cost.amount}</li>{/foreach}</ul></li>{/if}<li><label>Minimum Age:</label>{$eventModel.minimum_age}</li><li><label>Status:</label>{$eventModel.status}</li></ul>", {$eventModel.venue.latitude}, {$eventModel.venue.longitude}],
		{/foreach}
		];
		icons = [
			{for $i=0 to count($eventModelsArray)-1}
			  iconURLPrefix + ({$i}+1) +'|FC6355|000000',
			{/for}
		];
		var icons_length = icons.length;

		var shadow = {
		  anchor: new google.maps.Point(15,33),
		  url: iconURLPrefix + 'msmarker.shadow.png'
		};

		var infowindow = new google.maps.InfoWindow({
		  maxWidth: 375
		});

		var marker;
		markers = new Array();
		var iconCounter = 0;

		// Add the markers and infowindows to the map
		for (var i = 0; i < locations.length; i++) {  
		  var marker = new google.maps.Marker({
		    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
			map: map,
		    icon : icons[iconCounter],
		    shadow: shadow,
		  });

		  markers.push(marker);

		  google.maps.event.addListener(marker, 'click', (function(marker, i) {
		    return function() {
		      infowindow.setContent(locations[i][0]);
		      infowindow.open(map, marker);
		    }
		  })(marker, i));

		  iconCounter++;
		  // We only have a limited number of possible icon colors, so we may have to restart the counter
		  if(iconCounter >= icons_length){
		  	iconCounter = 0;
		  }
		}
		function AutoCenter() {
		  //  Create a new viewpoint bound
		  bounds = new google.maps.LatLngBounds();
		  //  Go through each...
		  $j.each(markers, function (index, marker) {
		    bounds.extend(marker.position);
		  });
		  //  Fit these bounds to the map
		  map.fitBounds(bounds);
		}
		AutoCenter();
	map_div.addEventListener("mousemove", throttle_events, true);
}
function throttle_events(event) {
    var now = new Date();
    var distance = Math.sqrt(Math.pow(event.clientX - last.x, 2) + Math.pow(event.clientY - last.y, 2));
    var time = now.getTime() - last.time.getTime();
    if (distance * time < space * period) {    //event arrived too soon or mouse moved too little or both
        if (event.stopPropagation) { // W3C/addEventListener()
            event.stopPropagation();
        } else { // Older IE.
            event.cancelBubble = true;
        };
    } else {
        
        last.time = now;
        last.x    = event.clientX;
        last.y    = event.clientY;
    };
};

 


function displayInfoWindow(index) {
	google.maps.event.trigger(markers[index], 'click');
}


$j('#map-toggle').click(function() {
	$j('#map-wrapper').toggle();
	if ($j('#list-toggle').text() == 'Hide List' && $j(this).text() == 'Hide Map') {
	// 	$j('#map-wrapper').css('width', '0%');
		$j('#eventsVenues-list').css('width', '99%');
		$j(this).text('Show Map');
	} else if ($j('#list-toggle').text() == 'Hide List' && $j(this).text() == 'Show Map') {
	// 	$j('#map-wrapper').css('width', '73%');
		$j('#eventsVenues-list').css('width', '25%');
		$j(this).text('Hide Map');
	} else if ($j('#list-toggle').text() == 'Show List' && $j(this).text() == 'Hide Map') {
		$j(this).text('Show Map');
	// 	$j('#map-wrapper').css('width', '0%');
		$j('#eventsVenues-list').css('width', '0%');
	} else if ($j('#list-toggle').text() == 'Show List' && $j(this).text() == 'Show Map') {
		$j('#eventsVenues-list').css('width', '0%');
	// 	$j('#map-wrapper').css('width', '99%');
		$j(this).text('Hide Map');
	}
	var showIcons = $j('#eventVenues-toggle').text();
	if (showIcons == 'Show Events') {
		var locations = [
		{foreach $venueModelsArray venueModel}
		["<ul class='venueInformation-list'><li><label>Name of the Venue:</label><div>{$venueModel.name}</div></li>{if $venueModel.web_links}<li><label>Websites:</label>{assign var= websites value=';'|explode:$venueModel.web_links}<ul>{foreach $websites website}<li>{$website}</li>{/foreach}</ul></li>{/if}<li><label>Address:</label><div class='address-wrapper'>{$venueModel.address_1}<br />{if $venueModel.address_2 !=''}{$venueModel.address_2}<br />{/if}{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}<br /></div></li><li><label>Venue Type:</label><div>{$venueModel.type}</div></li><li><label>Minimum Age:</label><div>{$venueModel.minimum_age}</div></li><li><label>Status:</label><div>{$venueModel.status}</div></li></ul>", {$venueModel.latitude}, {$venueModel.longitude}],
		{/foreach}
		];
		icons = [
			{for $i=0 to count($venueModelsArray)-1}
			  iconURLPrefix + ({$i}+1) +'|55D7D7|000000',
			{/for}
		];
	} else {
		var locations = [
		{foreach $eventModelsArray eventModel}
			["<ul class='eventInformation-list'>{if $eventModel.name}<li><label>Name of the Event:</label>{$eventModel.name}</li>{/if}<li><label>Venue:</label>{$eventModel.venue.name}</li>{if $eventModel.web_links}<li><label>Websites:</label>{assign var= websites value=';'|explode:$eventModel.web_links}<ul>{foreach $websites website}<li>{$website}</li>{/foreach}</ul></li>{/if}{if $eventModel.repetitions != []}<label>Repetition Details:</label><ul>This event will repeat every{foreach $eventModel.repetitions repetition}{if $repetition.repetition_parameter == 'weeks'}<li>&nbsp;&nbsp;- {$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on {$repetition.day_of_week}s</li>{elseif $repetition.repetition_parameter == 'months' || $repetition.repetition_parameter == 'years'}<li>&nbsp;&nbsp;-{$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on the {$repetition.day_of_month}{if substr($repetition.day_of_month, -1) == '2'}nd{elseif substr($repetition.day_of_month, -1) == '3'}rd {elseif $repetition.day_of_month != 'last'}st{/if} {$repetition.day_of_week}{if $repetition.month_of_year} in&nbsp;{$repetition.month_of_year}{/if}</li>{else}&nbsp;day of the week</li>{/if}{/foreach}</ul>{else}<label>One Time Event:</label><div>{$eventModel.start_date|date_format} -{$eventModel.end_date|date_format}</div>{/if}<li><label>Time:</label> {$eventModel.start_time|date_format: '%I:%M %p'} - {$eventModel.end_time|date_format: '%I:%M %p'}</li>{if $eventModel.costs != []}<li><label>Cost:</label><ul>{foreach $eventModel.costs cost}<li>{$cost.person_type} pay ${$cost.amount}</li>{/foreach}</ul></li>{/if}<li><label>Minimum Age:</label>{$eventModel.minimum_age}</li><li><label>Status:</label>{$eventModel.status}</li></ul>", {$eventModel.venue.latitude}, {$eventModel.venue.longitude}],
		{/foreach}
		];
		icons = [
			{for $i=0 to count($eventModelsArray)-1}
			  iconURLPrefix + ({$i}+1) +'|FC6355|000000',
			{/for}
		];
	}
	icons_length = icons.length;

	var shadow = {
	  anchor: new google.maps.Point(15,33),
	  url: iconURLPrefix + 'msmarker.shadow.png'
	};

	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 10,
	  center: new google.maps.LatLng(-37.92, 151.25),
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  mapTypeControl: false,
	  streetViewControl: false,
	  panControl: false,
	  zoomControlOptions: {
	     position: google.maps.ControlPosition.LEFT_BOTTOM
	  }
	});

	var infowindow = new google.maps.InfoWindow({
	  maxWidth: 375
	});

	var marker;
	markers = new Array();
	var iconCounter = 0;

	// Add the markers and infowindows to the map
	for (var i = 0; i < locations.length; i++) {
	  marker = new google.maps.Marker({
	    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
	    map: map,
	    icon : icons[iconCounter],
	    shadow: shadow,
	  });

	  markers.push(marker);

	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
	    return function() {
	      infowindow.setContent(locations[i][0]);
	      infowindow.open(map, marker);
	    }
	  })(marker, i));

	  iconCounter++;
	  // We only have a limited number of possible icon colors, so we may have to restart the counter
	  if(iconCounter >= icons_length){
	  	iconCounter = 0;
	  }
	}

	function AutoCenter() {
	  //  Create a new viewpoint bound
	  bounds = new google.maps.LatLngBounds();
	  //  Go through each...
	  $j.each(markers, function (index, marker) {
	    bounds.extend(marker.position);
	  });
	  //  Fit these bounds to the map
	  map.fitBounds(bounds);
		google.maps.event.trigger(map, 'resize');
	}

	AutoCenter();


});

$j('#list-toggle').click(function() {
	if ($j(this).text() == 'Hide List' && $j('#map-toggle').text() == 'Hide Map') {
		$j('#map-wrapper').css('width', '99%');
		$j('#eventsVenues-list').css('width', '0%');
		$j(this).text('Show List');
	} else if ($j(this).text() == 'Hide List' && $j('#map-toggle').text() == 'Show Map') {
		$j('#map-wrapper').css('width', '0%');
		$j('#eventsVenues-list').css('width', '0%');
		$j(this).text('Show List');
	} else if ($j(this).text() == 'Show List' &&  $j('#map-toggle').text() == 'Hide Map') {
		$j('#map-wrapper').css('width', '73%');
		$j('#eventsVenues-list').css('width', '25%');
		$j(this).text('Hide List');
	} else if ($j(this).text() == 'Show List' && $j('#map-toggle').text() == 'Show Map') {
		$j('#eventsVenues-list').css('width', '99%');
		$j('#map-wrapper').css('width', '0%');
		$j(this).text('Hide List');
	}

	// google.maps.event.trigger(map, 'resize');

	function AutoCenter() {
	  //  Create a new viewpoint bound
	  bounds = new google.maps.LatLngBounds();
	  //  Go through each...
	  $j.each(markers, function (index, marker) {
	    bounds.extend(marker.position);
	  });
	  //  Fit these bounds to the map
	  map.fitBounds(bounds);

	}
	AutoCenter();

});

$j('#eventVenues-toggle').click(function() {
	if ($j(this).text() == 'Show Venues') {
		$j(this).text('Show Events');
		$j('#venuesList-container').css('display', 'block');
		$j('#eventsList-container').css('display', 'none');

		var locations = [
			{foreach $venueModelsArray venueModel}
			["<ul class='venueInformation-list'><li><label>Name of the Venue:</label><div>{$venueModel.name}</div></li>{if $venueModel.web_links}<li><label>Websites:</label>{assign var= websites value=';'|explode:$venueModel.web_links}<ul>{foreach $websites website}<li>{$website}</li>{/foreach}</ul></li>{/if}<li><label>Address:</label><div class='address-wrapper'>{$venueModel.address_1}<br />{if $venueModel.address_2 !=''}{$venueModel.address_2}<br />{/if}{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}</div></li><li><label>Venue Type:</label><div>{$venueModel.type}</div></li><li><label>Minimum Age:</label><div>{$venueModel.minimum_age}</div></li><li><label>Status:</label><div>{$venueModel.status}</div></li></ul>", {$venueModel.latitude}, {$venueModel.longitude}],
			{/foreach}
		];

		icons = [
			{for $i=0 to count($venueModelsArray)-1}
			  iconURLPrefix + ({$i}+1) +'|55D7D7|000000',
			{/for}
		];

	} else {
		$j(this).text('Show Venues');
		$j('#venuesList-container').css('display', 'none');
		$j('#eventsList-container').css('display', 'block');

		var locations = [
		{foreach $eventModelsArray eventModel}
			["<ul class='eventInformation-list'>{if $eventModel.name}<li><label>Name of the Event:</label>{$eventModel.name}</li>{/if}<li><label>Venue:</label>{$eventModel.venue.name}</li>{if $eventModel.web_links}<li><label>Websites:</label>{assign var= websites value=';'|explode:$eventModel.web_links}<ul>{foreach $websites website}<li>{$website}</li>{/foreach}</ul></li>{/if}{if $eventModel.repetitions != []}<label>Repetition Details:</label><ul>This event will repeat every{foreach $eventModel.repetitions repetition}{if $repetition.repetition_parameter == 'weeks'}<li>&nbsp;&nbsp;- {$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on {$repetition.day_of_week}s</li>{elseif $repetition.repetition_parameter == 'months' || $repetition.repetition_parameter == 'years'}<li>&nbsp;&nbsp;-{$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on the {$repetition.day_of_month}{if substr($repetition.day_of_month, -1) == '2'}nd{elseif substr($repetition.day_of_month, -1) == '3'}rd {elseif $repetition.day_of_month != 'last'}st{/if} {$repetition.day_of_week}{if $repetition.month_of_year} in&nbsp;{$repetition.month_of_year}{/if}</li>{else}&nbsp;day of the week</li>{/if}{/foreach}</ul>{else}<label>One Time Event:</label><div>{$eventModel.start_date|date_format} -{$eventModel.end_date|date_format}</div>{/if}<li><label>Time:</label> {$eventModel.start_time|date_format: '%I:%M %p'} - {$eventModel.end_time|date_format: '%I:%M %p'}</li>{if $eventModel.costs != []}<li><label>Cost:</label><ul>{foreach $eventModel.costs cost}<li>{$cost.person_type} pay ${$cost.amount}</li>{/foreach}</ul></li>{/if}<li><label>Minimum Age:</label>{$eventModel.minimum_age}</li><li><label>Status:</label>{$eventModel.status}</li></ul>", {$eventModel.venue.latitude}, {$eventModel.venue.longitude}],
		{/foreach}
		];
		icons = [
			{for $i=0 to count($eventModelsArray)-1}
			  iconURLPrefix + ({$i}+1) +'|FC6355|000000',
			{/for}
		];
	}
	icons_length = icons.length;

	var shadow = {
	  anchor: new google.maps.Point(15,33),
	  url: iconURLPrefix + 'msmarker.shadow.png'
	};

	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 10,
	  center: new google.maps.LatLng(-37.92, 151.25),
	  mapTypeId: google.maps.MapTypeId.ROADMAP,
	  mapTypeControl: false,
	  streetViewControl: false,
	  panControl: false,
	  zoomControlOptions: {
	     position: google.maps.ControlPosition.LEFT_BOTTOM
	  }
	});

	var infowindow = new google.maps.InfoWindow({
	  maxWidth: 375
	});

	var marker;
	markers = new Array();
	var iconCounter = 0;

	// Add the markers and infowindows to the map
	for (var i = 0; i < locations.length; i++) {
	  marker = new google.maps.Marker({
	    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
	    map: map,
	    icon : icons[iconCounter],
	    shadow: shadow,
	  });

	  markers.push(marker);

	  google.maps.event.addListener(marker, 'click', (function(marker, i) {
	    return function() {
	      infowindow.setContent(locations[i][0]);
	      infowindow.open(map, marker);
	    }
	  })(marker, i));

	  iconCounter++;
	  // We only have a limited number of possible icon colors, so we may have to restart the counter
	  if(iconCounter >= icons_length){
	  	iconCounter = 0;
	  }
	}

	function AutoCenter() {
	  //  Create a new viewpoint bound
	  bounds = new google.maps.LatLngBounds();
	  //  Go through each...
	  $j.each(markers, function (index, marker) {
	    bounds.extend(marker.position);
	  });
	  //  Fit these bounds to the map
	  map.fitBounds(bounds);
	google.maps.event.trigger(map, 'resize');
	}

	AutoCenter();

});

google.maps.event.addDomListener(window, 'load', initialize);

</script> 