<?php /* Smarty version Smarty-3.1-DEV, created on 2014-07-29 23:49:19
         compiled from "/Users/cara/Sites/westie/module/Application/view/application/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58944715652f578fbe8d1e7-90541785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a11dc0c9fcb56e1d9a4af785f60e6c437426c3ef' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Application/view/application/index/index.tpl',
      1 => 1406670542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58944715652f578fbe8d1e7-90541785',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f578fc004447_08000903',
  'variables' => 
  array (
    'venueModelsArray' => 0,
    'count' => 0,
    'venueModel' => 0,
    'websites' => 0,
    'website' => 0,
    'eventModelsArray' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f578fc004447_08000903')) {function content_52f578fc004447_08000903($_smarty_tpl) {?><div id='displayAdjustment-container'>
	<button class='new' id='eventVenues-toggle'>Show Venues</button>
	<button class='neutral' id='list-toggle'>Show List</button>
	<button class='neutral' id='map-toggle'>Hide Map</button>
</div>
<div id='eventsVenues-list'>
	<div id='venuesList-container'>
		<h1>Venues List</h1>
		<?php if ($_smarty_tpl->tpl_vars['venueModelsArray']->value){?>
			<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(0, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['venueModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['venueModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['venueModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['venueModel']->key => $_smarty_tpl->tpl_vars['venueModel']->value){
$_smarty_tpl->tpl_vars['venueModel']->_loop = true;
?>
				<div>
					<img onclick="displayInfoWindow(<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
)" src="https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=<?php echo $_smarty_tpl->tpl_vars['count']->value+1;?>
|55D7D7|000000">
					<ul class='venueInformation-list'>
						<li>
							<label>Name of the Venue:</label>
							<div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</div>
						</li>
						<li>
							<label>Websites:</label>
							<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['web_links']){?>
								<?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['venueModel']->value['web_links']), null, 0);?>
								<ul>
									<?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?>
										<li><?php echo $_smarty_tpl->tpl_vars['website']->value;?>
</li>
									<?php } ?>
								</ul>
							<?php }else{ ?><div>None listed</li>
							<?php }?>
						</li>
						<li><label>Address:</label>
							<div class='address-wrapper'>
								<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_1'];?>
<br />
								<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['address_2']!=''){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_2'];?>
<br /><?php }?>
								<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['state'];?>
 <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['postal_code'];?>
<br />
								<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>

							</div>
						</li>
						<li>
							<label>Venue Type:</label>
							<div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['type'];?>
</div>
						</li>
						<li>
							<label>Minimum Age:</label>
							<div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['minimum_age'];?>
</div>
						</li>
						<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['description']){?>
							<li>
								<label>Description:</label>
								<div class='longText-wrapper'><?php echo nl2br($_smarty_tpl->tpl_vars['venueModel']->value['description']);?>
</div>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']){?>
							<li>
								<label>Special Notes:</label>
								<div class='longText-wrapper'><?php echo nl2br($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']);?>
</div>
							</li>
						<?php }?>
						<li>
							<label>Status:</label>
							<div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['status'];?>
</div>
						</li>
					</ul>
				</div>
				<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?>
			<?php } ?>
		<?php }else{ ?><p>No venues currently listed</p>
		<?php }?>
	</div>
	<div id='eventsList-container'>
		<h1>Events List</h1>
		<?php if ($_smarty_tpl->tpl_vars['eventModelsArray']->value){?>
			<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(0, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['eventModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eventModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eventModel']->key => $_smarty_tpl->tpl_vars['eventModel']->value){
$_smarty_tpl->tpl_vars['eventModel']->_loop = true;
?>
				<div>
					<img onclick="displayInfoWindow(<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
)" src="https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=<?php echo $_smarty_tpl->tpl_vars['count']->value+1;?>
|FC6355|000000">
					<ul class='eventInformation-list'>
						<?php echo $_smarty_tpl->getSubTemplate ('./../../../../Events/view/events/partials/_eventInformation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					</ul>
				</div>
			<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?>
			<?php } ?>
		<?php }else{ ?><p>None listed</p>
		<?php }?>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_indexScript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id='map-wrapper'>
	<div id="map"></div>
</div>
<?php }} ?>