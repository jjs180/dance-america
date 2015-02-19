<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-17 03:38:22
         compiled from "/Users/cara/Sites/dance_america/module/Admin/view/admin/emails/approve-venue-email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77272880054e2a99e7b14a7-17444018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a85ef976d875ca9e982bc4f96ccf28cdab7c23d9' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Admin/view/admin/emails/approve-venue-email.tpl',
      1 => 1398829674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77272880054e2a99e7b14a7-17444018',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'venueModel' => 0,
    'websites' => 0,
    'website' => 0,
    'acceptVenueLink' => 0,
    'rejectVenueLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54e2a99e8c5be1_33843523',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e2a99e8c5be1_33843523')) {function content_54e2a99e8c5be1_33843523($_smarty_tpl) {?><style>
.indent-wrapper {
	position:relative;
	left:40px;
}
</style>
<h1>A new venue has been added</h1>
<div><label><strong>Name of the Venue:</strong></label> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</div>
<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['web_links']){?>
	<div>
		<label><strong>Websites:</strong></label>
		<div class='indent-wrapper'>
			<?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['venueModel']->value['web_links']), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?>
				<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
<br/>
			<?php } ?>
		</div>
	</div>
<?php }?>
<div>
	<label><strong>Address:</strong></label>
	<div class='indent-wrapper'>
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
</div>
<div><label><strong>Venue Type:</strong></label> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['type'];?>
</div>
<div><label><strong>Minimum Age:</strong></label> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['minimum_age'];?>
</div>
<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['description']){?>
	<div>
		<label><strong>Description:</strong></label>
		<div class='indent-wrapper'><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['description'];?>
</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']){?>
	<div>
		<label><strong>Special Notes:</strong></label>
		<div class='indent-wrapper'><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['special_notes'];?>
</div>
	</div>
<?php }?>

<p>To approve this venue, click <a href="<?php echo $_smarty_tpl->tpl_vars['acceptVenueLink']->value;?>
" target='_blank'>HERE</a></p>
<div><strong>OR</strong></div>
<p>To reject this venue, click <a href="<?php echo $_smarty_tpl->tpl_vars['rejectVenueLink']->value;?>
" target='_blank'>HERE</a></p><?php }} ?>