<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-30 05:44:40
         compiled from "/Users/cara/Sites/westie/module/Application/view/layout/partials/_nav-main-member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69919424852fad60aea5fa2-48725864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cfaaedc0426c72fbea34a8239f7961323f54d9f' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Application/view/layout/partials/_nav-main-member.tpl',
      1 => 1392171453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69919424852fad60aea5fa2-48725864',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52fad60b01a325_34514560',
  'variables' => 
  array (
    'route' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fad60b01a325_34514560')) {function content_52fad60b01a325_34514560($_smarty_tpl) {?><ul class='nav nav-type-horizontal' id='member-mainNavBar'>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='about'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('about'); ?>">About</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='contact'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('contact'); ?>">Contact</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='venues/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>">Add Venue</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='events/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/add'); ?>">Add Event</a></li>
</ul><?php }} ?>