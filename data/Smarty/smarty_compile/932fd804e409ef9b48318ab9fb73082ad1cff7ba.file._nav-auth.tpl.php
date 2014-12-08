<?php /* Smarty version Smarty-3.1-DEV, created on 2014-12-08 03:03:07
         compiled from "/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_nav-auth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13024524985439c8d72faef9-60679087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '932fd804e409ef9b48318ab9fb73082ad1cff7ba' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_nav-auth.tpl',
      1 => 1418004170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13024524985439c8d72faef9-60679087',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5439c8d73a55f1_03001373',
  'variables' => 
  array (
    'loggedInMember' => 0,
    'route' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5439c8d73a55f1_03001373')) {function content_5439c8d73a55f1_03001373($_smarty_tpl) {?><ul class='nav-auth desktop-visible'>
	<?php if (isset($_smarty_tpl->tpl_vars['loggedInMember']->value)){?>
		<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='account'){?>class='active'<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('account'); ?>">My Account</a></li>
		<li><a href='<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('logout'); ?>'>Logout</a></li>
	<?php }else{ ?>
		<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='login'){?>class='active'<?php }?>><a href='<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('login'); ?>'>Login</a></li>
		<li <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value)===null||$tmp==='' ? '' : $tmp)=='register'){?>class='active'<?php }?>><a href='<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('register'); ?>'>Register</a></li>
	<?php }?>
</ul><?php }} ?>