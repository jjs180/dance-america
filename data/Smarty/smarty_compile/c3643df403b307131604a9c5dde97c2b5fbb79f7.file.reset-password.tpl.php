<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-10 03:25:50
         compiled from "/Users/cara/Sites/dance_america/module/Authentication/view/authentication/emails/reset-password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20363976795460222e604489-83858272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3643df403b307131604a9c5dde97c2b5fbb79f7' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Authentication/view/authentication/emails/reset-password.tpl',
      1 => 1376346304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20363976795460222e604489-83858272',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resetLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5460222e636291_02293422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5460222e636291_02293422')) {function content_5460222e636291_02293422($_smarty_tpl) {?><h1>Reset Your Password</h1>
<p>To reset your password, please click on the link below:</p>
<p><a href='<?php echo $_smarty_tpl->tpl_vars['resetLink']->value;?>
' target='_blank'><?php echo $_smarty_tpl->tpl_vars['resetLink']->value;?>
</a></p><?php }} ?>