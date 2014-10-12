<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-12 05:47:43
         compiled from "/Users/cara/Sites/westie/module/Venues/view/venues/venues/partials/_indexScript.tpl" */ ?>
<?php /*%%SmartyHeaderCode:280893586531fe5f05e6b89-13621445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7a5ae12766aea77e2fd37aadf296996266fe700' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Venues/view/venues/venues/partials/_indexScript.tpl',
      1 => 1394599659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280893586531fe5f05e6b89-13621445',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_531fe5f075c5c4_99011429',
  'variables' => 
  array (
    'venueModelsArray' => 0,
    'venueModel' => 0,
    'key' => 0,
    'webLink' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531fe5f075c5c4_99011429')) {function content_531fe5f075c5c4_99011429($_smarty_tpl) {?><script type="text/javascript">
  // Define your locations: HTML content for the info window, latitude, longitude

var locations = [
	<?php  $_smarty_tpl->tpl_vars['venueModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['venueModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['venueModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['venueModel']->key => $_smarty_tpl->tpl_vars['venueModel']->value){
$_smarty_tpl->tpl_vars['venueModel']->_loop = true;
?>
	["<ul class='venueInformation-list'><li><label>Name of the Venue:</label> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</li><li><label>Website:</label><?php if ($_smarty_tpl->tpl_vars['venueModel']->value['web_links']){?><ul><?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_smarty_tpl->tpl_vars['webLink'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['venueModel']->value['web_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
 $_smarty_tpl->tpl_vars['webLink']->value = $_smarty_tpl->tpl_vars['key']->key;
?><li><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['webLink']->value;?>
</li><?php } ?></ul><?php }else{ ?>None listed<?php }?></li><li><label>Address:</label><div class='address-wrapper'><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_1'];?>
<br /><?php if ($_smarty_tpl->tpl_vars['venueModel']->value['address_2']!=''){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_2'];?>
<br /><?php }?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['state'];?>
 <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['postal_code'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
</div></li><li><label>Venue Type:</label> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['type'];?>
</li><li><label>Minimum Age:</label> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['minimum_age'];?>
</li><li><label>Description:</label> <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['description']){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['description'];?>
<?php }else{ ?>None listed<?php }?></li><li><label>Special Notes:</label>  <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['special_notes'];?>
<?php }else{ ?>None listed<?php }?></li><li><label>Status:</label> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['status'];?>
</li></ul>", <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['latitude'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['longitude'];?>
],
	<?php } ?>
];
var iconURLPrefix = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=';

var icons = [
<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['venueModelsArray']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['venueModelsArray']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
  iconURLPrefix + (<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
+1) +'|55D7D7|000000',
<?php }} ?>
]
var icons_length = icons.length;


var shadow = {
  anchor: new google.maps.Point(15,33),
  url: iconURLPrefix + 'msmarker.shadow.png'
};

var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 10,
  center: new google.maps.LatLng(0, 0),
  mapTypeId: google.maps.MapTypeId.ROADMAP,
  mapTypeControl: false,
  streetViewControl: false,
  panControl: false,
  zoomControlOptions: {
     position: google.maps.ControlPosition.LEFT_BOTTOM
  }
});

var infowindow = new google.maps.InfoWindow({
  maxWidth: 300
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
</script> <?php }} ?>