<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-08 19:35:23
         compiled from "/Users/cara/Sites/dance_america/module/Authentication/view/authentication/authentication/forgot-password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:748961459545e626b3e9ef5-78068694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21e4e140c2dac2104b9781fcd7f25063da673637' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Authentication/view/authentication/authentication/forgot-password.tpl',
      1 => 1389120347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '748961459545e626b3e9ef5-78068694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_545e626b4b0c03_13520516',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545e626b4b0c03_13520516')) {function content_545e626b4b0c03_13520516($_smarty_tpl) {?><h1>Forgot Password</h1>
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