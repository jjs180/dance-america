<?php /* Smarty version Smarty-3.1-DEV, created on 2014-10-27 18:00:38
         compiled from "/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_nav-main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16443100235439c8d726f8b8-90290622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8365ae731b94390f2433fb123dffcb274efaf530' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_nav-main.tpl',
      1 => 1414429187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16443100235439c8d726f8b8-90290622',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5439c8d72e99a4_67928974',
  'variables' => 
  array (
    'route' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5439c8d72e99a4_67928974')) {function content_5439c8d72e99a4_67928974($_smarty_tpl) {?><ul class='nav nav-type-horizontal'>
	<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='about'){?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('about'); ?>">About</a></li>
	<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='contact'){?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('contact'); ?>">Contact</a></li>
	<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='venues/add'){?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>">Add Venue</a></li>
	<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='events/add'){?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/add'); ?>">Add Event</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='people/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('people/add'); ?>">Add Instructor</a></li>
</ul><?php }} ?>