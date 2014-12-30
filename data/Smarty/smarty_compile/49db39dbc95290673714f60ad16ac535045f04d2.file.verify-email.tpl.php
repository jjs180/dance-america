<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-08 19:36:12
         compiled from "/Users/cara/Sites/dance_america/module/Authentication/view/registration/emails/verify-email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1942395939545e629c6c6a10-95095963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49db39dbc95290673714f60ad16ac535045f04d2' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Authentication/view/registration/emails/verify-email.tpl',
      1 => 1376346304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1942395939545e629c6c6a10-95095963',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'verificationLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_545e629c6f8ff5_37947046',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545e629c6f8ff5_37947046')) {function content_545e629c6f8ff5_37947046($_smarty_tpl) {?><h1>Thank You!</h1>
<p>Thank you for registering with us.  To verify your email address, please click on the link below:</p>
<p><a href='<?php echo $_smarty_tpl->tpl_vars['verificationLink']->value;?>
' target='_blank'><?php echo $_smarty_tpl->tpl_vars['verificationLink']->value;?>
</a></p><?php }} ?>