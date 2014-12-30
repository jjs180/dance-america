<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-29 03:32:51
         compiled from "/Users/cara/Sites/dance_america/module/Authentication/view/authentication/authentication/reset-password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15717441045479305319d101-56820531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22e348a0c1dcab36bf33f90ec5e575966e4d8ba2' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Authentication/view/authentication/authentication/reset-password.tpl',
      1 => 1389120347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15717441045479305319d101-56820531',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
    'securityKey' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54793053281688_46862335',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54793053281688_46862335')) {function content_54793053281688_46862335($_smarty_tpl) {?><h1>Reset Password</h1>
<div class='spacer-large'></div>
<form id='resetPasswordForm' class='NWForm' method='post' action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('password/reset'); ?>">
	<input type='hidden' name='resetPasswordForm[email]' value='<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
' />
	<input type='hidden' name='resetPasswordForm[security_key]' value='<?php echo $_smarty_tpl->tpl_vars['securityKey']->value;?>
' />
	
	<div>
		<label for='resetPasswordForm-password'>New Password</label>
		<input id='resetPasswordForm-password' name='resetPasswordForm[password]' type='password' data-validators='required' />
	</div>
	<div>
		<label for='resetPasswordForm-passwordConfirm'>Confirm Password</label>
		<input id='resetPasswordForm-passwordConfirm' name='resetPasswordForm[password_confirm]' type='password' data-validators="required validate-match matchInput:'resetPasswordForm-password' matchName:'Password'" />
	</div>

	<div>
		<button type='submit'>Reset Password</button>
	</div>
</form><?php }} ?>