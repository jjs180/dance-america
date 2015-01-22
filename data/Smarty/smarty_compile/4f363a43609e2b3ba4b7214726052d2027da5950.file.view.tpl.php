<?php /* Smarty version Smarty-3.1-DEV, created on 2014-12-31 22:00:08
         compiled from "/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164681263554a462de68afc9-08130743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f363a43609e2b3ba4b7214726052d2027da5950' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/view.tpl',
      1 => 1420059607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164681263554a462de68afc9-08130743',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54a462de7ff1d7_16660521',
  'variables' => 
  array (
    'venueModel' => 0,
    'websites' => 0,
    'website' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a462de7ff1d7_16660521')) {function content_54a462de7ff1d7_16660521($_smarty_tpl) {?><h1><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</h1>
<ul id='venueInformation-list'>
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
			<!-- <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
 -->
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
</div>
<?php }} ?>