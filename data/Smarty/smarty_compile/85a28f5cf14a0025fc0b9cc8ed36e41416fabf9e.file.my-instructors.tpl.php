<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-11 07:42:30
         compiled from "/Users/cara/Sites/dance_america/module/Authentication/view/account/account/my-instructors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5058548154daf81cc795e2-26199624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85a28f5cf14a0025fc0b9cc8ed36e41416fabf9e' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Authentication/view/account/account/my-instructors.tpl',
      1 => 1423636935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5058548154daf81cc795e2-26199624',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54daf81cd7c1a4_74562505',
  'variables' => 
  array (
    'instructorModelsArray' => 0,
    'instructorModel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54daf81cd7c1a4_74562505')) {function content_54daf81cd7c1a4_74562505($_smarty_tpl) {?><?php if (!empty($_smarty_tpl->tpl_vars['instructorModelsArray']->value)){?>
<h1>Instructors You Have Listed</h1>
	<table border="1" id='myInstructors-table'>
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Status</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['instructorModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['instructorModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['instructorModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['instructorModel']->key => $_smarty_tpl->tpl_vars['instructorModel']->value){
$_smarty_tpl->tpl_vars['instructorModel']->_loop = true;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['instructorModel']->value['name'];?>
</td>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['instructorModel']->value['address_1'];?>
<br />
						<?php if ($_smarty_tpl->tpl_vars['instructorModel']->value['address_2']!=''){?><?php echo $_smarty_tpl->tpl_vars['instructorModel']->value['address_2'];?>
<br /><?php }?>
						<?php echo $_smarty_tpl->tpl_vars['instructorModel']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['instructorModel']->value['state'];?>
 <?php echo $_smarty_tpl->tpl_vars['instructorModel']->value['postal_code'];?>
<br />
					</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['instructorModel']->value['description']||$_smarty_tpl->tpl_vars['instructorModel']->value['special_notes']){?>
							<div class='dropdown'>
								<a></a>
								<ul>
									<?php if ($_smarty_tpl->tpl_vars['instructorModel']->value['description']){?><li><span>Description:</span><div><?php echo nl2br($_smarty_tpl->tpl_vars['instructorModel']->value['description']);?>
</div></li><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['instructorModel']->value['special_notes']){?><li><span>Special Notes:</span><div><?php echo nl2br($_smarty_tpl->tpl_vars['instructorModel']->value['special_notes']);?>
</div></li><?php }?>
								</ul>
							</div>
						<?php }else{ ?>None Listed
						<?php }?>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['instructorModel']->value['status'];?>
</td>
					<td class='editting-cell'><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('instructors/edit',array('instructorId'=>$_smarty_tpl->tpl_vars['instructorModel']->value['id'])); ?>"><i class='icon-edit'></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
<?php }else{ ?><h1>You have not listed any instructors on our site</h1>
<?php }?><?php }} ?>