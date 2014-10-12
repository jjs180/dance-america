<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-30 17:42:41
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/registration/registration/determine-user-status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62721507452f654fd354a41-97344615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '357c64e1ff0bc739ac252f1e760f97a08f0dead4' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/registration/registration/determine-user-status.tpl',
      1 => 1396111636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62721507452f654fd354a41-97344615',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f654fd3d04f5_00582343',
  'variables' => 
  array (
    'params' => 0,
    'register' => 0,
    'remainUnregistered' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f654fd3d04f5_00582343')) {function content_52f654fd3d04f5_00582343($_smarty_tpl) {?><h1>What sort of experience do you want when adding events and venues to our site?</h1>
<h2>If you choose to register with us, you will be able to:</h2>
<ul id='registrationReasons-list'>
	<li>Edit venues/events without having to contact the admin to make changes</li>
	<li>View the events and venues that you have suggested to the site</li>
</ul>

<form id="determineRegistrationStatusForm" class="NWForm" action="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['params']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('determine-user-status',array('type'=>$_tmp1)); ?>" method="post">
	<div>
		<label for="determineRegistrationStatusForm-status" class='required'>Would you like to register with us?</label>
		<select name="determineRegistrationStatusForm[status]" id="determineRegistrationStatusForm-status" data-validators='required'>
			<option value="<?php echo $_smarty_tpl->tpl_vars['register']->value;?>
">I would like to register</option>
			<option value="<?php echo $_smarty_tpl->tpl_vars['remainUnregistered']->value;?>
">I prefer to continue unregistered</option>
		</select>
	</div>
	<div><button type="submit">Submit</button></div>
</form><?php }} ?>