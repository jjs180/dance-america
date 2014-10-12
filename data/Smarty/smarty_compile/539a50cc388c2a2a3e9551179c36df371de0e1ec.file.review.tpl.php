<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-04 15:52:47
         compiled from "/Users/cara/Sites/westie/module/Venues/view/venues/venues/review.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70054066452f5767f14d9d4-48770194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '539a50cc388c2a2a3e9551179c36df371de0e1ec' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Venues/view/venues/venues/review.tpl',
      1 => 1401889933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70054066452f5767f14d9d4-48770194',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f5767f855b41_39643638',
  'variables' => 
  array (
    'venueModel' => 0,
    'websites' => 0,
    'website' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5767f855b41_39643638')) {function content_52f5767f855b41_39643638($_smarty_tpl) {?><h1>Please review the venue information below</h1>
<ul id='venueInformation-list'>
	<li>
		<label>Name of the Venue:</label><div><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</div>
	</li>
	<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['web_links']){?>
		<li>
			<label>Websites:</label>
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
		</li>
	<?php }?>
	<li><label>Address:</label>
		<div id='address-wrapper'>
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
		<label>Venue Type:</label> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['type'];?>

	</li>
	<li>
		<label>Minimum Age:</label> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['minimum_age'];?>

	</li>
	<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['description']){?>
		<li>
			<label>Description:</label>
			<div><?php echo nl2br($_smarty_tpl->tpl_vars['venueModel']->value['description']);?>
</div>
		</li>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']){?>
		<li>
			<label>Special Notes:</label>
			<div><?php echo nl2br($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']);?>
</div>
		</li>
	<?php }?>
</ul>
<div id='mapAndButton-wrapper'>
	<div><img src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" /></div>
	<div id='button-wrapper'>
		<?php if (isset($_smarty_tpl->tpl_vars['venueModel']->value['id'])){?>
			<a class='new btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/approve',array('venueId'=>$_smarty_tpl->tpl_vars['venueModel']->value['id'])); ?>">The venue information looks correct</a>
			<a id='editVenue-button' class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/edit',array('venueId'=>$_smarty_tpl->tpl_vars['venueModel']->value['id'])); ?>">I need to change some details about the venue</a>
		<?php }else{ ?>
			<a class='new btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/approve'); ?>">The venue information looks correct</a>
			<a id='editVenue-button' class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/edit'); ?>">I need to change some details about the venue</a>
		<?php }?>
	</div>
</div>
<?php }} ?>