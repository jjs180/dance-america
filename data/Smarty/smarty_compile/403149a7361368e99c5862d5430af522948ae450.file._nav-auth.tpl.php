<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-12 03:18:37
         compiled from "/Users/cara/Sites/westie/module/Application/view/layout/partials/_nav-auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100181474152f516bbcfc895-12324162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '403149a7361368e99c5862d5430af522948ae450' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Application/view/layout/partials/_nav-auth.tpl',
      1 => 1392171515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100181474152f516bbcfc895-12324162',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f516bbd4c209_69143714',
  'variables' => 
  array (
    'loggedInMember' => 0,
    'route' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f516bbd4c209_69143714')) {function content_52f516bbd4c209_69143714($_smarty_tpl) {?><ul class='nav-auth'>
	<?php if (isset($_smarty_tpl->tpl_vars['loggedInMember']->value)) {?>
		<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='account') {?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account'); ?>">My Account</a></li>
		<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='account/my-events') {?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account/my-events'); ?>">My Events</a></li>
		<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='account/my-venues') {?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account/my-venues'); ?>">My Venues</a></li>
		<li><a href='<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('logout'); ?>'>Logout</a></li>
	<?php } else { ?>
		<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='login') {?>class='active'<?php }?>><a href='<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('login'); ?>'>Login</a></li>
		<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='register') {?>class='active'<?php }?>><a href='<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('register'); ?>'>Register</a></li>
	<?php }?>
</ul><?php }} ?>
