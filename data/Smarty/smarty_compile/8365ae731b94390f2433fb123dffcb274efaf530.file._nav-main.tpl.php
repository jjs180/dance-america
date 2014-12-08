<?php /* Smarty version Smarty-3.1-DEV, created on 2014-12-08 03:05:51
         compiled from "/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_nav-main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16443100235439c8d726f8b8-90290622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8365ae731b94390f2433fb123dffcb274efaf530' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_nav-main.tpl',
      1 => 1418004181,
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
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='about'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('about'); ?>">About</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='contact'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('contact'); ?>">Contact</a></li>
	<li class='dropdown'>
		<a>Add another...</a>
		<ul class='nav'>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='venues/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>">Venue</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='events/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/add'); ?>">Event</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='people/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('people/add'); ?>">Instructor</a></li>
		</ul>
	</li>
</ul>
<ul id='navTag-phone'>
	<li>
		<a class='icon-menu'></a>
		<ul class='nav'>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='about'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('about'); ?>">About</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='contact'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('contact'); ?>">Contact</a></li>
			<li class='nav-divider'></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='venues/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>">Add Venue</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='events/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/add'); ?>">Add Event</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='people/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('people/add'); ?>">Add Instructor</a></li>
		</ul>
	</li>
</ul><?php }} ?>