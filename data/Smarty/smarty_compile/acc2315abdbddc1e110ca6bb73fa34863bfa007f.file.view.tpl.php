<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-30 01:43:33
         compiled from "/Users/cara/Sites/westie/module/Scraps/view/scraps/scraps/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41547252353601f55f26339-59787886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acc2315abdbddc1e110ca6bb73fa34863bfa007f' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Scraps/view/scraps/scraps/view.tpl',
      1 => 1398815011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41547252353601f55f26339-59787886',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_53601f56020db0_91113651',
  'variables' => 
  array (
    'scrapModel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53601f56020db0_91113651')) {function content_53601f56020db0_91113651($_smarty_tpl) {?><h1>Original Information</h1>
<a class='btn new' id='backButton' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-scraps'); ?>">Back to list</a>
<div id='scrapVenueEvent-wrapper'>
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