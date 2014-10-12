<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-09 16:22:36
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/account/account/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:126903650652f79d3c82d754-53920847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43b3648878782f22f1bd744f1ee6918e71397cc1' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/account/account/index.tpl',
      1 => 1391531647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126903650652f79d3c82d754-53920847',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f79d3c8a84c2_87113483',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f79d3c8a84c2_87113483')) {function content_52f79d3c8a84c2_87113483($_smarty_tpl) {?><h1>My Account</h1>

<div id='myAccount-basicInfo'>
	<h2>Basic Information</h2>
	<div><label>Email</label> <?php echo $_smarty_tpl->tpl_vars['member']->value['email'];?>
</div>
	<div><label>Password</label> <a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('password/forgot'); ?>">Change Password</a></div>
</div><?php }} ?>
