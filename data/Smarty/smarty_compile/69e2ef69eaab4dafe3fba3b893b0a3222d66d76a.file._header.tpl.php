<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-12 03:01:46
         compiled from "/Users/cara/Sites/westie/module/Application/view/layout/partials/_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213015003352f516bbbf8108-78439068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69e2ef69eaab4dafe3fba3b893b0a3222d66d76a' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Application/view/layout/partials/_header.tpl',
      1 => 1392170505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213015003352f516bbbf8108-78439068',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f516bbc2c2b8_42888323',
  'variables' => 
  array (
    'loggedInMember' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f516bbc2c2b8_42888323')) {function content_52f516bbc2c2b8_42888323($_smarty_tpl) {?><header>
	<h1><a href='<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('home'); ?>'>Westie Home</a></h1>
	<?php if (isset($_smarty_tpl->tpl_vars['loggedInMember']->value)&&$_smarty_tpl->tpl_vars['loggedInMember']->value->role=='admin') {?><?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_nav-main-admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php } elseif (isset($_smarty_tpl->tpl_vars['loggedInMember']->value)&&$_smarty_tpl->tpl_vars['loggedInMember']->value->role=='member') {?><?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_nav-main-member.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php } else { ?><?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_nav-main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
	<?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_nav-auth.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</header><?php }} ?>
