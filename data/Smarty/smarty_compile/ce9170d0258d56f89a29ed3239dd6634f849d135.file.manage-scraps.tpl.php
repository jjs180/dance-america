<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-29 23:53:02
         compiled from "/Users/cara/Sites/westie/module/Scraps/view/scraps/scraps/manage-scraps.tpl" */ ?>
<?php /*%%SmartyHeaderCode:148205290452f5791ab9ceb5-69848695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce9170d0258d56f89a29ed3239dd6634f849d135' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Scraps/view/scraps/scraps/manage-scraps.tpl',
      1 => 1398808380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148205290452f5791ab9ceb5-69848695',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f5791b018697_26695140',
  'variables' => 
  array (
    'scrapModelsArray' => 0,
    'scrapModel' => 0,
    'scrapStatusArray' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5791b018697_26695140')) {function content_52f5791b018697_26695140($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['scrapModelsArray']->value){?>
<h1>Existing entries which must be formatted</h1>
<a class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('archived-scraps'); ?>">Archived entries</a>
<table border="1" id='manageScraps-table'>
	<thead>
		<tr>
			<th>Event/Venue Name</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['scrapModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['scrapModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scrapModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['scrapModel']->key => $_smarty_tpl->tpl_vars['scrapModel']->value){
$_smarty_tpl->tpl_vars['scrapModel']->_loop = true;
?>
			<tr>
				<td><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-scraps/view',array('scrapId'=>$_smarty_tpl->tpl_vars['scrapModel']->value['id'])); ?>"><?php echo $_smarty_tpl->tpl_vars['scrapModel']->value['name'];?>
</a></td>
				<td class='dropdown'>
					<a>
						<?php if ($_smarty_tpl->tpl_vars['scrapModel']->value['status']==$_smarty_tpl->tpl_vars['scrapStatusArray']->value['unprocessed']){?>Totally Unprocessed
						<?php }elseif($_smarty_tpl->tpl_vars['scrapModel']->value['status']==$_smarty_tpl->tpl_vars['scrapStatusArray']->value['processing']){?>Being Processed
						<?php }elseif($_smarty_tpl->tpl_vars['scrapModel']->value['status']==$_smarty_tpl->tpl_vars['scrapStatusArray']->value['processed']){?>Completely Processed
						<?php }?>
					</a>
					<ul>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-scraps/update',array('scrapId'=>$_smarty_tpl->tpl_vars['scrapModel']->value['id'],'status'=>$_smarty_tpl->tpl_vars['scrapStatusArray']->value['unprocessed'])); ?>">Entry Completely Unprocessed</a></li>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-scraps/update',array('scrapId'=>$_smarty_tpl->tpl_vars['scrapModel']->value['id'],'status'=>$_smarty_tpl->tpl_vars['scrapStatusArray']->value['processing'])); ?>">Entry Being Processed</a></li>
						<li><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-scraps/update',array('scrapId'=>$_smarty_tpl->tpl_vars['scrapModel']->value['id'],'status'=>$_smarty_tpl->tpl_vars['scrapStatusArray']->value['processed'])); ?>">Entry Processed</a></li>
					</ul>
				</td>
				<td class='scrapIcon-cell'><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-scraps/archive',array('scrapId'=>$_smarty_tpl->tpl_vars['scrapModel']->value['id'])); ?>" class='NWDialog NWLink' data-nwDialog-title='Confirm Archive' data-nwDialog-html='<b>Are you sure you want to archive this entry?</b>'><i class='icon-trash'></i></a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php }else{ ?>
	<p>Congratulations! You have successfully transferred all the old entries to the new format.</p>
	<a class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('archived-scraps'); ?>">Archived entries</a>	
<?php }?>
<?php }} ?>