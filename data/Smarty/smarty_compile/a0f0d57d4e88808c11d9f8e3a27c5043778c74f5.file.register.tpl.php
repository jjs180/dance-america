<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-01 22:34:27
         compiled from "/Users/cara/Sites/dance_america/module/Authentication/view/registration/registration/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1624678294545551e3cd1a60-25882086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0f0d57d4e88808c11d9f8e3a27c5043778c74f5' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Authentication/view/registration/registration/register.tpl',
      1 => 1392170911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1624678294545551e3cd1a60-25882086',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_545551e3cfe025_98033557',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545551e3cfe025_98033557')) {function content_545551e3cfe025_98033557($_smarty_tpl) {?><h1>Register</h1>
<div class='spacer-large'></div>
<form id='registrationForm' class="NWForm" method='post' action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('register'); ?>">
	<div>
		<label for='registrationForm-email'>Email</label>
		<input id='registrationForm-email' name='registrationForm[email]' type='email' placeholder="Email" data-validators="required validate-email nw-validate-available" data-nwValidateAvailable-url="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('register/check-email-available'); ?>" />
	</div>
	<div>
		<label for='registrationForm-emailConfirm'>Confirm Email</label>
		<input id='registrationForm-emailConfirm' name='registrationForm[email_confirm]' type='email' placeholder="Confirm Email" data-validators="required validate-match matchInput:'registrationForm-email' matchName:'Email'" />
	</div>
	<div>
		<label for='registrationForm-password'>Password</label>
		<input id='registrationForm-password' name='registrationForm[password]' type='password' placeholder="Password" data-validators="required minLength:6" />
	</div>
	<div>
		<label for='registrationForm-passwordConfirm'>Confirm Password</label>
		<input id='registrationForm-passwordConfirm' name='registrationForm[password_confirm]' type='password' placeholder="Confirm Password" data-validators="required minLength:6 validate-match matchInput:'registrationForm-password' matchName:'Password' " />
	</div>
	<div>
		<input id="registrationForm-terms" type="checkbox" name="registrationForm[terms]" data-validators="validate-required-check" />
		<label>I have read and accepted the <a class="NWPopup" href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('terms'); ?>">Terms of Use</a></label>
	</div>
	<div>
		<button type='submit'>Register</button>
	</div>
</form><?php }} ?>