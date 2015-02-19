<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-16 21:51:22
         compiled from "/Users/cara/Sites/dance_america/module/Events/view/events/events/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:103718000354e256a85d26b5-79402885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae2760f588b25b74a820d3f0a471d0dacc419e4a' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Events/view/events/events/view.tpl',
      1 => 1424119876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103718000354e256a85d26b5-79402885',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54e256a8624884_47103554',
  'variables' => 
  array (
    'eventModel' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e256a8624884_47103554')) {function content_54e256a8624884_47103554($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['name']){?>
	<h1><?php echo $_smarty_tpl->tpl_vars['eventModel']->value->name;?>
</h1>
<?php }else{ ?>
	<h1>Your Event</h1>
<?php }?>
<ul class='eventInformation-list list-unstyled'>
	<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_eventInformation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</ul>
<div id='mapAndButton-wrapper'>
	<div><img src='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
' /></div>
</div>
<?php }} ?>