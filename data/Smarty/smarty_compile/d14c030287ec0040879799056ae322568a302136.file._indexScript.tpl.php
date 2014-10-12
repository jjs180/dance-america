<?php /* Smarty version Smarty-3.1-DEV, created on 2014-07-29 23:49:20
         compiled from "/Users/cara/Sites/westie/module/Application/view/application/partials/_indexScript.tpl" */ ?>
<?php /*%%SmartyHeaderCode:452957940531e2f5bb98e29-81428526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd14c030287ec0040879799056ae322568a302136' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Application/view/application/partials/_indexScript.tpl',
      1 => 1406670557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '452957940531e2f5bb98e29-81428526',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_531e2f5bd8a4a7_33003245',
  'variables' => 
  array (
    'eventModelsArray' => 0,
    'eventModel' => 0,
    'websites' => 0,
    'website' => 0,
    'repetition' => 0,
    'cost' => 0,
    'i' => 0,
    'venueModelsArray' => 0,
    'venueModel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_531e2f5bd8a4a7_33003245')) {function content_531e2f5bd8a4a7_33003245($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/cara/Sites/westie/vendor/smarty/smarty/distribution/libs/plugins/modifier.date_format.php';
?><script type="text/javascript"
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
		<?php  $_smarty_tpl->tpl_vars['eventModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eventModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eventModel']->key => $_smarty_tpl->tpl_vars['eventModel']->value){
$_smarty_tpl->tpl_vars['eventModel']->_loop = true;
?>
			["<ul class='eventInformation-list'><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['name']){?><li><label>Name of the Event:</label><div><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['name'];?>
</div></li><?php }?><li><label>Venue:</label><div><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['name'];?>
</div></li><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['web_links']){?><li><label>Websites:</label><?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['eventModel']->value['web_links']), null, 0);?><ul><?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?><li><?php echo $_smarty_tpl->tpl_vars['website']->value;?>
</li><?php } ?></ul></li><?php }?><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['repetitions']!=array()){?><label>Repetition Details:</label><ul>This event will repeat every<?php  $_smarty_tpl->tpl_vars['repetition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['repetition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['repetitions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['repetition']->key => $_smarty_tpl->tpl_vars['repetition']->value){
$_smarty_tpl->tpl_vars['repetition']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='weeks'){?><li>&nbsp;&nbsp;- <?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
s</li><?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='months'||$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='years'){?><li>&nbsp;&nbsp;-<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on the <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_month'];?>
<?php if (substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='2'){?>nd<?php }elseif(substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='3'){?>rd <?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['day_of_month']!='last'){?>st<?php }?> <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
<?php if ($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']){?> in&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['month_of_year'];?>
<?php }?></li><?php }else{ ?>&nbsp;day of the week</li><?php }?><?php } ?></ul><?php }else{ ?><label>One Time Event:</label><div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_date']);?>
 -<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_date']);?>
</div><?php }?><li><label>Time:</label> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_time'],'%I:%M %p');?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_time'],'%I:%M %p');?>
</li><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['costs']!=array()){?><li><label>Cost:</label><ul><?php  $_smarty_tpl->tpl_vars['cost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['costs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cost']->key => $_smarty_tpl->tpl_vars['cost']->value){
$_smarty_tpl->tpl_vars['cost']->_loop = true;
?><li><?php echo $_smarty_tpl->tpl_vars['cost']->value['person_type'];?>
 pay $<?php echo $_smarty_tpl->tpl_vars['cost']->value['amount'];?>
</li><?php } ?></ul></li><?php }?><li><label>Minimum Age:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['minimum_age'];?>
</li><li><label>Status:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['status'];?>
</li></ul>", <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['latitude'];?>
, <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['longitude'];?>
],
		<?php } ?>
		];
		icons = [
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['eventModelsArray']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['eventModelsArray']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			  iconURLPrefix + (<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
+1) +'|FC6355|000000',
			<?php }} ?>
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
		<?php  $_smarty_tpl->tpl_vars['venueModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['venueModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['venueModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['venueModel']->key => $_smarty_tpl->tpl_vars['venueModel']->value){
$_smarty_tpl->tpl_vars['venueModel']->_loop = true;
?>
		["<ul class='venueInformation-list'><li><label>Name of the Venue:</label><div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</div></li><?php if ($_smarty_tpl->tpl_vars['venueModel']->value['web_links']){?><li><label>Websites:</label><?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['venueModel']->value['web_links']), null, 0);?><ul><?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?><li><?php echo $_smarty_tpl->tpl_vars['website']->value;?>
</li><?php } ?></ul></li><?php }?><li><label>Address:</label><div class='address-wrapper'><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_1'];?>
<br /><?php if ($_smarty_tpl->tpl_vars['venueModel']->value['address_2']!=''){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_2'];?>
<br /><?php }?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['state'];?>
 <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['postal_code'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
</div></li><li><label>Venue Type:</label><div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['type'];?>
</div></li><li><label>Minimum Age:</label><div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['minimum_age'];?>
</div></li><li><label>Status:</label><div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['status'];?>
</div></li></ul>", <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['latitude'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['longitude'];?>
],
		<?php } ?>
		];
		icons = [
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['venueModelsArray']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['venueModelsArray']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			  iconURLPrefix + (<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
+1) +'|55D7D7|000000',
			<?php }} ?>
		];
	} else {
		var locations = [
		<?php  $_smarty_tpl->tpl_vars['eventModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eventModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eventModel']->key => $_smarty_tpl->tpl_vars['eventModel']->value){
$_smarty_tpl->tpl_vars['eventModel']->_loop = true;
?>
			["<ul class='eventInformation-list'><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['name']){?><li><label>Name of the Event:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['name'];?>
</li><?php }?><li><label>Venue:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['name'];?>
</li><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['web_links']){?><li><label>Websites:</label><?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['eventModel']->value['web_links']), null, 0);?><ul><?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?><li><?php echo $_smarty_tpl->tpl_vars['website']->value;?>
</li><?php } ?></ul></li><?php }?><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['repetitions']!=array()){?><label>Repetition Details:</label><ul>This event will repeat every<?php  $_smarty_tpl->tpl_vars['repetition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['repetition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['repetitions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['repetition']->key => $_smarty_tpl->tpl_vars['repetition']->value){
$_smarty_tpl->tpl_vars['repetition']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='weeks'){?><li>&nbsp;&nbsp;- <?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
s</li><?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='months'||$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='years'){?><li>&nbsp;&nbsp;-<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on the <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_month'];?>
<?php if (substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='2'){?>nd<?php }elseif(substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='3'){?>rd <?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['day_of_month']!='last'){?>st<?php }?> <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
<?php if ($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']){?> in&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['month_of_year'];?>
<?php }?></li><?php }else{ ?>&nbsp;day of the week</li><?php }?><?php } ?></ul><?php }else{ ?><label>One Time Event:</label><div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_date']);?>
 -<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_date']);?>
</div><?php }?><li><label>Time:</label> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_time'],'%I:%M %p');?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_time'],'%I:%M %p');?>
</li><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['costs']!=array()){?><li><label>Cost:</label><ul><?php  $_smarty_tpl->tpl_vars['cost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['costs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cost']->key => $_smarty_tpl->tpl_vars['cost']->value){
$_smarty_tpl->tpl_vars['cost']->_loop = true;
?><li><?php echo $_smarty_tpl->tpl_vars['cost']->value['person_type'];?>
 pay $<?php echo $_smarty_tpl->tpl_vars['cost']->value['amount'];?>
</li><?php } ?></ul></li><?php }?><li><label>Minimum Age:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['minimum_age'];?>
</li><li><label>Status:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['status'];?>
</li></ul>", <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['latitude'];?>
, <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['longitude'];?>
],
		<?php } ?>
		];
		icons = [
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['eventModelsArray']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['eventModelsArray']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			  iconURLPrefix + (<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
+1) +'|FC6355|000000',
			<?php }} ?>
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
			<?php  $_smarty_tpl->tpl_vars['venueModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['venueModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['venueModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['venueModel']->key => $_smarty_tpl->tpl_vars['venueModel']->value){
$_smarty_tpl->tpl_vars['venueModel']->_loop = true;
?>
			["<ul class='venueInformation-list'><li><label>Name of the Venue:</label><div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</div></li><?php if ($_smarty_tpl->tpl_vars['venueModel']->value['web_links']){?><li><label>Websites:</label><?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['venueModel']->value['web_links']), null, 0);?><ul><?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?><li><?php echo $_smarty_tpl->tpl_vars['website']->value;?>
</li><?php } ?></ul></li><?php }?><li><label>Address:</label><div class='address-wrapper'><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_1'];?>
<br /><?php if ($_smarty_tpl->tpl_vars['venueModel']->value['address_2']!=''){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_2'];?>
<br /><?php }?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['state'];?>
 <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['postal_code'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
</div></li><li><label>Venue Type:</label><div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['type'];?>
</div></li><li><label>Minimum Age:</label><div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['minimum_age'];?>
</div></li><li><label>Status:</label><div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['status'];?>
</div></li></ul>", <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['latitude'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['longitude'];?>
],
			<?php } ?>
		];

		icons = [
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['venueModelsArray']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['venueModelsArray']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			  iconURLPrefix + (<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
+1) +'|55D7D7|000000',
			<?php }} ?>
		];

	} else {
		$j(this).text('Show Venues');
		$j('#venuesList-container').css('display', 'none');
		$j('#eventsList-container').css('display', 'block');

		var locations = [
		<?php  $_smarty_tpl->tpl_vars['eventModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eventModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eventModel']->key => $_smarty_tpl->tpl_vars['eventModel']->value){
$_smarty_tpl->tpl_vars['eventModel']->_loop = true;
?>
			["<ul class='eventInformation-list'><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['name']){?><li><label>Name of the Event:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['name'];?>
</li><?php }?><li><label>Venue:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['name'];?>
</li><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['web_links']){?><li><label>Websites:</label><?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['eventModel']->value['web_links']), null, 0);?><ul><?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?><li><?php echo $_smarty_tpl->tpl_vars['website']->value;?>
</li><?php } ?></ul></li><?php }?><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['repetitions']!=array()){?><label>Repetition Details:</label><ul>This event will repeat every<?php  $_smarty_tpl->tpl_vars['repetition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['repetition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['repetitions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['repetition']->key => $_smarty_tpl->tpl_vars['repetition']->value){
$_smarty_tpl->tpl_vars['repetition']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='weeks'){?><li>&nbsp;&nbsp;- <?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
s</li><?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='months'||$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='years'){?><li>&nbsp;&nbsp;-<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on the <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_month'];?>
<?php if (substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='2'){?>nd<?php }elseif(substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='3'){?>rd <?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['day_of_month']!='last'){?>st<?php }?> <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
<?php if ($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']){?> in&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['month_of_year'];?>
<?php }?></li><?php }else{ ?>&nbsp;day of the week</li><?php }?><?php } ?></ul><?php }else{ ?><label>One Time Event:</label><div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_date']);?>
 -<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_date']);?>
</div><?php }?><li><label>Time:</label> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_time'],'%I:%M %p');?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_time'],'%I:%M %p');?>
</li><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['costs']!=array()){?><li><label>Cost:</label><ul><?php  $_smarty_tpl->tpl_vars['cost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['costs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cost']->key => $_smarty_tpl->tpl_vars['cost']->value){
$_smarty_tpl->tpl_vars['cost']->_loop = true;
?><li><?php echo $_smarty_tpl->tpl_vars['cost']->value['person_type'];?>
 pay $<?php echo $_smarty_tpl->tpl_vars['cost']->value['amount'];?>
</li><?php } ?></ul></li><?php }?><li><label>Minimum Age:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['minimum_age'];?>
</li><li><label>Status:</label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['status'];?>
</li></ul>", <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['latitude'];?>
, <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['longitude'];?>
],
		<?php } ?>
		];
		icons = [
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? count($_smarty_tpl->tpl_vars['eventModelsArray']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['eventModelsArray']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			  iconURLPrefix + (<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
+1) +'|FC6355|000000',
			<?php }} ?>
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

</script> <?php }} ?>