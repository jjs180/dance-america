<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-01 05:52:55
         compiled from "/Users/cara/Sites/westie/module/Venues/view/venues/venues/results.tpl" */ ?>
<?php /*%%SmartyHeaderCode:115634175152f65626284022-93622204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb15ff760441e4ab1f48d4f27d244528bda4eee2' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Venues/view/venues/venues/results.tpl',
      1 => 1396323809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115634175152f65626284022-93622204',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f65626a23da1_88036236',
  'variables' => 
  array (
    'venueModelsArray' => 0,
    'searchCriteria' => 0,
    'searchPhrase' => 0,
    'count' => 0,
    'venueModel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f65626a23da1_88036236')) {function content_52f65626a23da1_88036236($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['venueModelsArray']->value){?>
	<div id='resultsHeader-wrapper'>
		<h1>Results for <?php echo $_smarty_tpl->tpl_vars['searchCriteria']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['searchPhrase']->value;?>
</h1>
		<a class='btn neutral' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/search'); ?>">Change search criteria</a>
		<a class='btn' id='addNewVenue-button' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>">Add your own venue to the site</a>
	</div>
	<div id='resultsList-wrapper'>
		<ul>
			<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(0, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['venueModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['venueModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['venueModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['venueModel']->key => $_smarty_tpl->tpl_vars['venueModel']->value){
$_smarty_tpl->tpl_vars['venueModel']->_loop = true;
?>
				<li>
					<div>
						<img onclick="displayInfoWindow(<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
)" src="https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=<?php echo $_smarty_tpl->tpl_vars['count']->value+1;?>
|55D7D7|000000">
						<h2><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</h2>
					</div>
					<div class='description-container'>
						<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_1'];?>
<br />
						<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['address_2']){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_2'];?>
<br /><?php }?>
						<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['state'];?>
 <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['postal_code'];?>
<br />
						<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
<br />
						<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['description']){?>
							<div>Description: <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['description'];?>
</div>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']){?>
							<div>Special Notes: <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['special_notes'];?>
</div>
						<?php }?>
					</div>
					<a class='btn new' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/add',array('venueId'=>$_smarty_tpl->tpl_vars['venueModel']->value['id'])); ?>">This is the venue!</a>
				</li>
			<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?>
			<?php } ?>
		</ul>
	</div>
	<div id='resultsMap-wrapper'>
		<div id="map"></div>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate ('./partials/_resultsScript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }else{ ?>
	<p>Sorry, but it appears that we could not find anything matching your criteria. Your options are to:</p>
	<a class='btn new' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>">Add a new venue</a>
	<a class='btn new' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/search'); ?>">Change search criteria</a>
<?php }?>
<?php }} ?>