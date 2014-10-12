<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-08 01:24:04
         compiled from "/Users/cara/Sites/westie/module/Scraps/view/scraps/scraps/archived-scraps.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177982065652f57924221564-34376786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c054d3852936820d60085c652bc32d3259b2c13d' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Scraps/view/scraps/scraps/archived-scraps.tpl',
      1 => 1391470085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177982065652f57924221564-34376786',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'scrapModelsArray' => 0,
    'scrapModel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f57924420e85_97577784',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f57924420e85_97577784')) {function content_52f57924420e85_97577784($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['scrapModelsArray']->value) {?>
<h1>Currently archived scraps</h1>
<a class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-scraps'); ?>">Active entries</a>
<table border="1" id='manageScraps-table'>
	<thead>
		<tr>
			<th>Event/Venue Name</th>
			<th>Archive Date</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['scrapModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['scrapModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scrapModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['scrapModel']->key => $_smarty_tpl->tpl_vars['scrapModel']->value) {
$_smarty_tpl->tpl_vars['scrapModel']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['scrapModel']->value['name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['scrapModel']->value['time_updated'];?>
</td>
				<td><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-scraps/delete',array('scrapId'=>$_smarty_tpl->tpl_vars['scrapModel']->value['id'])); ?>" class='NWDialog NWLink' data-nwDialog-title='Confirm Deletion' data-nwDialog-html='<b>Are you sure you want to delete this entry?</b>'><i class='icon-trash'></i></a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php } else { ?>
	<p>There are no archived entries at this time.</p>
	<a class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-scraps'); ?>">Active entries</a>
<?php }?>
<?php }} ?>
