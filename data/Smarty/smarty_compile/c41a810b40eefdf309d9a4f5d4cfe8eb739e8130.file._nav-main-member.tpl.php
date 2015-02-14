<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-11 07:33:24
         compiled from "/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_nav-main-member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:449133806546021445c7ae1-87135568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c41a810b40eefdf309d9a4f5d4cfe8eb739e8130' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_nav-main-member.tpl',
      1 => 1423636375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '449133806546021445c7ae1-87135568',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_546021447b11a7_92137592',
  'variables' => 
  array (
    'route' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546021447b11a7_92137592')) {function content_546021447b11a7_92137592($_smarty_tpl) {?><ul class='nav nav-type-horizontal'>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='about'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('about'); ?>">About</a></li>
	<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='contact'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('contact'); ?>">Contact</a></li>
	<li class='dropdown'>
		<ul class='nav'>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='venues/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>">Venue</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='events/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/add'); ?>">Event</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='people/add'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('people/add'); ?>">Instructor</a></li>
		</ul>
		<a>Add another</a>
	</li>
	<li class='dropdown'>
		<ul class='nav'>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='manage-events'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account/my-events'); ?>">Events</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='manage-venues'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account/my-venues'); ?>">Venues</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='manage-people'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account/my-instructors'); ?>">Instructors</a></li>
		</ul>
		<a>Manage my</a>
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
			<li class='nav-divider'></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='manage-events'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account/my-events'); ?>">My Events</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='manage-venues'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account/my-venues'); ?>">My Venues</a></li>
			<li><a <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='manage-people'){?>class='active'<?php }?> href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account/my-instructors'); ?>">My Instructors</a></li>
			<li class='nav-divider'></li>
			<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='account'){?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account'); ?>">My Account</a></li>
			<li><a href='<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('logout'); ?>'>Logout</a></li>
		</ul>
	</li>
</ul><?php }} ?>