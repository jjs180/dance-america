<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-12 03:34:49
         compiled from "/Users/cara/Sites/westie/module/Application/view/layout/partials/_nav-main-admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:83169524752f516bbc33173-29124977%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a163c9247c487cd55007fd64e83ff12681e262ad' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Application/view/layout/partials/_nav-main-admin.tpl',
      1 => 1392171463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83169524752f516bbc33173-29124977',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f516bbcee7b3_62810791',
  'variables' => 
  array (
    'route' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f516bbcee7b3_62810791')) {function content_52f516bbcee7b3_62810791($_smarty_tpl) {?><ul class='nav nav-type-horizontal'>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='about') {?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('about'); ?>">About</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='contact') {?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('contact'); ?>">Contact</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='venues/add') {?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>">Add Venue</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='events/add') {?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/add'); ?>">Add Event</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='manage-events') {?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-events'); ?>">Manage Events</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='manage-venues') {?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-venues'); ?>">Manage Venues</a></li>
</ul><?php }} ?>
