<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-08 01:23:32
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/authentication/authentication/forgot-password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148478195552f57904a2bde7-94615964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c51a94cf9ff015fe22d0f780e2c5690dcd3750a3' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/authentication/authentication/forgot-password.tpl',
      1 => 1389120347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148478195552f57904a2bde7-94615964',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f57904a698b0_44277144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f57904a698b0_44277144')) {function content_52f57904a698b0_44277144($_smarty_tpl) {?><h1>Forgot Password</h1>
<div class='spacer-large'></div>
<p>Please enter your email and we will send you a link to change your password:</p>
<form id='forgotPasswordForm' method='post' action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('password/forgot'); ?>">
	<div>
		<label for='forgotPasswordForm-email'>Email</label>
		<input type='text' id='forgotPasswordForm-email' name='forgotPasswordForm[email]' />
	</div>
	<div>
		<button type='submit'>Submit</button>
	</div>
</form>
<?php }} ?>
