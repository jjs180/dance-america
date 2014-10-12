<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-29 23:06:54
         compiled from "/Users/cara/Sites/westie/module/Scraps/view/scraps/scraps/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145466978452f5791c71e4f3-96575136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e97fa5277ef990f0430560f8fba3dbca12b4016' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Scraps/view/scraps/scraps/edit.tpl',
      1 => 1398805611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145466978452f5791c71e4f3-96575136',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f5791d36ade3_16003507',
  'variables' => 
  array (
    'scrapModel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5791d36ade3_16003507')) {function content_52f5791d36ade3_16003507($_smarty_tpl) {?><h1>Reformatting Existing Submissions</h1>
<div id='scrapVenueEvent-wrapper'>
	<h2>Original Information</h2>
	<ul>
		<li>
			<label>Event/Venue Name:</label><div>&nbsp;<?php echo $_smarty_tpl->tpl_vars['scrapModel']->value['name'];?>
</div>
		</li>
		<li>
			<label>Description</label><div><?php echo $_smarty_tpl->tpl_vars['scrapModel']->value['description'];?>
</div>
		</li>
	</ul>
</div><?php }} ?>