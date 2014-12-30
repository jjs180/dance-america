<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-10 03:20:19
         compiled from "/Users/cara/Sites/dance_america/module/Authentication/view/account/account/account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:404717985546020e3309d59-06078622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70a4863b4f814d2625762a8b6ede4fef25b4aa04' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Authentication/view/account/account/account.tpl',
      1 => 1391960608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '404717985546020e3309d59-06078622',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'memberModel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_546020e334d3f4_06289571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546020e334d3f4_06289571')) {function content_546020e334d3f4_06289571($_smarty_tpl) {?><h1>My Account</h1>

<div id='myAccount-basicInfo'>
	<h2>Basic Information</h2>
	<div><label>Email</label> <?php echo $_smarty_tpl->tpl_vars['memberModel']->value['email'];?>
</div>
	<div><label>Password</label> <a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('password/forgot'); ?>">Change Password</a></div>
</div><?php }} ?>