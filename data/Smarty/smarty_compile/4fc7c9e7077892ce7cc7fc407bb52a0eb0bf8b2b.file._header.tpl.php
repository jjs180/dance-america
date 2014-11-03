<?php /* Smarty version Smarty-3.1-DEV, created on 2014-10-24 17:52:19
         compiled from "/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6819732105439c8d71f8e73-96526086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fc7c9e7077892ce7cc7fc407bb52a0eb0bf8b2b' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Application/view/layout/partials/_header.tpl',
      1 => 1414165913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6819732105439c8d71f8e73-96526086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5439c8d7268af0_92542829',
  'variables' => 
  array (
    'loggedInMember' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5439c8d7268af0_92542829')) {function content_5439c8d7268af0_92542829($_smarty_tpl) {?><header>
	<h1><a href='<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('home'); ?>'>Dance America</a></h1>
	<?php if (isset($_smarty_tpl->tpl_vars['loggedInMember']->value)&&$_smarty_tpl->tpl_vars['loggedInMember']->value->role=='admin'){?><?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_nav-main-admin.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }elseif(isset($_smarty_tpl->tpl_vars['loggedInMember']->value)&&$_smarty_tpl->tpl_vars['loggedInMember']->value->role=='member'){?><?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_nav-main-member.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }else{ ?><?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_nav-main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
	<?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_nav-auth.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</header><?php }} ?>