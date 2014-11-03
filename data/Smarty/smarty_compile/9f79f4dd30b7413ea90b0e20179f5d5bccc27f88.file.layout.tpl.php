<?php /* Smarty version Smarty-3.1-DEV, created on 2014-10-12 02:18:31
         compiled from "/Users/cara/Sites/dance_america/module/Application/view/layout/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20106273515439c8d70fa898-57763108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f79f4dd30b7413ea90b0e20179f5d5bccc27f88' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Application/view/layout/layout.tpl',
      1 => 1394402259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20106273515439c8d70fa898-57763108',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5439c8d71e0059_70017316',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5439c8d71e0059_70017316')) {function content_5439c8d71e0059_70017316($_smarty_tpl) {?><!DOCTYPE html>
<html lang='en'>
	<?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id='content'>
			<?php echo $_smarty_tpl->tpl_vars['this']->value->nwFlashMessenger();?>

			<?php echo $_smarty_tpl->tpl_vars['this']->value->content;?>

		</div>
	</body>
</html><?php }} ?>