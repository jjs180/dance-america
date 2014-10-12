<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-27 05:26:36
         compiled from "/Users/cara/Sites/westie/module/Application/view/application/partials/_indexScript-map-partial.php" */ ?>
<?php /*%%SmartyHeaderCode:5848282165333a53f676560-97840528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47a3d951c2d1ff4b25f3ce69906f619c2e62dccc' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Application/view/application/partials/_indexScript-map-partial.php',
      1 => 1395894384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5848282165333a53f676560-97840528',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5333a53f69b841_52960109',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5333a53f69b841_52960109')) {function content_5333a53f69b841_52960109($_smarty_tpl) {?>var icons_length = icons.length;

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
  maxWidth: 350
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
	google.maps.event.trigger(clickedMarker, 'click')
}<?php }} ?>