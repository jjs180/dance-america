<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-12 02:54:22
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/authentication/emails/reset-password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93033151952fad44e350595-96796915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dbe4e32cab54ac629bd6fd1816b4004a2451902' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/authentication/emails/reset-password.tpl',
      1 => 1376346304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93033151952fad44e350595-96796915',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'resetLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52fad44e379690_28564437',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fad44e379690_28564437')) {function content_52fad44e379690_28564437($_smarty_tpl) {?><h1>Reset Your Password</h1>
<p>To reset your password, please click on the link below:</p>
<p><a href='<?php echo $_smarty_tpl->tpl_vars['resetLink']->value;?>
' target='_blank'><?php echo $_smarty_tpl->tpl_vars['resetLink']->value;?>
</a></p><?php }} ?>
