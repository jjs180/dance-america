<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-08 19:36:12
         compiled from "/Users/cara/Sites/dance_america/module/Authentication/view/registration/registration/thanks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:441023893545e629ccb7229-47080003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b6f0316330209d1fb52dd49f2f6f377946c7de0' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Authentication/view/registration/registration/thanks.tpl',
      1 => 1389120347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '441023893545e629ccb7229-47080003',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_545e629ccf8617_12148628',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545e629ccf8617_12148628')) {function content_545e629ccf8617_12148628($_smarty_tpl) {?><h1>Thank You!</h1>
<p>We've sent an email to the address you provided.  Please click the link found in that email to verify your email address</p>
<p>(Don't forget to check your spam folder!)</p>
<p><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('register/verify-email-resend',array('email'=>$_smarty_tpl->tpl_vars['email']->value)); ?>"><button class='neutral'>Resend Verifcation Email</button></a></p><?php }} ?>