<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-09 16:43:37
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/account/account/account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53304207652f7a1f549b417-50316473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98b57b7f1c2fa3b47826d0ca82151e717d6283d5' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/account/account/account.tpl',
      1 => 1391960608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53304207652f7a1f549b417-50316473',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f7a1f558f2e7_28869852',
  'variables' => 
  array (
    'memberModel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f7a1f558f2e7_28869852')) {function content_52f7a1f558f2e7_28869852($_smarty_tpl) {?><h1>My Account</h1>

<div id='myAccount-basicInfo'>
	<h2>Basic Information</h2>
	<div><label>Email</label> <?php echo $_smarty_tpl->tpl_vars['memberModel']->value['email'];?>
</div>
	<div><label>Password</label> <a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('password/forgot'); ?>">Change Password</a></div>
</div><?php }} ?>
