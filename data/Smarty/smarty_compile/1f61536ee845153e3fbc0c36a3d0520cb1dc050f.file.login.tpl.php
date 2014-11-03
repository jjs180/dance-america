<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-01 22:34:25
         compiled from "/Users/cara/Sites/dance_america/module/Authentication/view/authentication/authentication/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1984628118545551e132b703-38894227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f61536ee845153e3fbc0c36a3d0520cb1dc050f' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Authentication/view/authentication/authentication/login.tpl',
      1 => 1391531647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1984628118545551e132b703-38894227',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_545551e1359a00_54706474',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545551e1359a00_54706474')) {function content_545551e1359a00_54706474($_smarty_tpl) {?><h1>Login</h1>
<div id='login-container'>
	<div id='loginForm-container'>
		<form id='loginForm' class="NWForm" method='post'>
			<div>
				<label for='loginForm-email' class='required'>Email</label>
				<input id='loginForm-email' name='loginForm[email]' type='email' placeholder="Email" data-validators="required validate-email"/>
			</div>
			<div>
				<label for='loginForm-password' class='required'>Password</label>
				<input id='loginForm-password' name='loginForm[password]' type='password' placeholder="Password" data-validators="required" />
			</div>
			<div id='loginButton-wrapper'><button type='submit'>Login</button></div>
		</form>
		<a id='forgotPassword-wrapper' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('password/forgot'); ?>">I forgot my password</a>
	</div>
	<div id='registerButton-container'>
		<a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('register'); ?>"><button class='positive'>Register</button></a>
	</div>
</div><?php }} ?>