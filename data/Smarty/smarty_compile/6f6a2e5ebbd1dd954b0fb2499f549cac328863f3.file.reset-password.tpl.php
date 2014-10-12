<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-08 01:23:35
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/authentication/authentication/reset-password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199068914652f57907a02933-71186148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f6a2e5ebbd1dd954b0fb2499f549cac328863f3' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/authentication/authentication/reset-password.tpl',
      1 => 1389120347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199068914652f57907a02933-71186148',
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
  'unifunc' => 'content_52f57907aeea17_14582433',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f57907aeea17_14582433')) {function content_52f57907aeea17_14582433($_smarty_tpl) {?><h1>Reset Password</h1>
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
