<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-12 03:43:55
         compiled from "/Users/cara/Sites/westie/module/Application/view/layout/partials/_nav-main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100591477452f516eacf02a3-46082833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '205c02e9f7f85eecb33aa6f707b61da8333fda39' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Application/view/layout/partials/_nav-main.tpl',
      1 => 1392171470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100591477452f516eacf02a3-46082833',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f516eb1205c4_63283953',
  'variables' => 
  array (
    'route' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f516eb1205c4_63283953')) {function content_52f516eb1205c4_63283953($_smarty_tpl) {?><ul class='nav nav-type-horizontal'>
	<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='about') {?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('about'); ?>">About</a></li>
	<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='contact') {?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('contact'); ?>">Contact</a></li>
	<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='venues/add') {?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>">Add Venue</a></li>
	<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='events/add') {?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/add'); ?>">Add Event</a></li>
</ul><?php }} ?>
