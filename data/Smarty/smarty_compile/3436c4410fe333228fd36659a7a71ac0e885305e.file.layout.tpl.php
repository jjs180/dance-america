<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-09 22:57:49
         compiled from "/Users/cara/Sites/westie/module/Application/view/layout/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151755891452f516bbbc5f92-47207677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3436c4410fe333228fd36659a7a71ac0e885305e' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Application/view/layout/layout.tpl',
      1 => 1394402259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151755891452f516bbbc5f92-47207677',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f516bbbeb1b1_52086786',
  'variables' => 
  array (
    'this' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f516bbbeb1b1_52086786')) {function content_52f516bbbeb1b1_52086786($_smarty_tpl) {?><!DOCTYPE html>
<html lang='en'>
	<?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('layout/partials/_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div id='content'>
			<?php echo $_smarty_tpl->tpl_vars['this']->value->nwFlashMessenger();?>

			<?php echo $_smarty_tpl->tpl_vars['this']->value->content;?>

		</div>
	</body>
</html><?php }} ?>
