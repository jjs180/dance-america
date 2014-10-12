<script type="text/javascript">
  // Define your locations: HTML content for the info window, latitude, longitude

var locations = [
	{foreach $venueModelsArray venueModel}
		["<ul class='venueInformation-list'><li><label>Name of the Venue:</label><div>{$venueModel.name}</div></li><label>Address:</label><div class='address-wrapper'>{$venueModel.address_1}<br />{if $venueModel.address_2 != ''}{$venueModel.address_2}<br />{/if}{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}<br />{$venueModel.country}</div></li><li><label>Venue Type:</label> {$venueModel.type}</li><li><label>Minimum Age:</label> {$venueModel.minimum_age}</li><li><label>Description:</label><div class='longText-wrapper'>{if $venueModel.description}{$venueModel.description}{else}None listed{/if}</div></li><li><label>Special Notes:</label><div class='longText-wrapper'>{if $venueModel.special_notes}{$venueModel.special_notes}{else}None listed{/if}</div></li><li><label>Status:</label> {$venueModel.status}</li></ul>", {$venueModel.latitude}, {$venueModel.longitude}],
	{/foreach}
];
var iconURLPrefix = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=';

var icons = [
{for $i=0 to count($venueModelsArray)-1}
  iconURLPrefix + ({$i}+1) +'|55D7D7|000000',
{/for}
]
var icons_length = icons.length;


var shadow = {
  anchor: new google.maps.Point(15,33),
  url: iconURLPrefix + 'msmarker.shadow.png'
};

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 2,
  center: new google.maps.LatLng(0, 0),
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  mapTypeControl: false,
  streetViewControl: false,
  panControl: false,
  size: false,
  zoomControlOptions: {
     position: google.maps.ControlPosition.LEFT_BOTTOM
  }
});

var infowindow = new google.maps.InfoWindow({
  maxWidth: 400
});

var marker;
var markers = new Array();

var iconCounter = 0;
var clusterJitterMax = 0.2;
var rnd = Math.random;
var clusterJitter = clusterJitterMax * rnd();

// Add the markers and infowindows to the map
for (var i = 0; i < locations.length; i++) {  
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1] - clusterJitter + rnd() * clusterJitter, locations[i][2] - clusterJitter + rnd() * clusterJitter),
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
  var bounds = new google.maps.LatLngBounds();
  //  Go through each...
  $j.each(markers, function (index, marker) {
    bounds.extend(marker.position);
  });
  //  Fit these bounds to the map
  map.fitBounds(bounds);
}
AutoCenter();

function displayInfoWindow(index) {
	var clickedMarker = markers[index];
	google.maps.event.trigger(clickedMarker, 'click');
}
</script> 