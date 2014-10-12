<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-29 20:41:24
         compiled from "/Users/cara/Sites/westie/module/Admin/view/admin/admin/manage-venues.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68221107852f578f6a823f8-24852521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65c5fe9db9c9d9d675346e5d7284b75d616faf24' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Admin/view/admin/admin/manage-venues.tpl',
      1 => 1398796821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68221107852f578f6a823f8-24852521',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f578f7223130_65198883',
  'variables' => 
  array (
    'venueModelsArray' => 0,
    'venueModel' => 0,
    'websites' => 0,
    'website' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f578f7223130_65198883')) {function content_52f578f7223130_65198883($_smarty_tpl) {?><h1>Manage Venues</h1>
<?php if ($_smarty_tpl->tpl_vars['venueModelsArray']->value){?>
<table border="1" id='venueInfoTable'>
	<thead>
		<tr>
			<th>Venue Name</th>
			<th>Submitter Contact Info</th>
			<th>Venue Type</th>
			<th>Venue Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['venueModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['venueModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['venueModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['venueModel']->key => $_smarty_tpl->tpl_vars['venueModel']->value){
$_smarty_tpl->tpl_vars['venueModel']->_loop = true;
?>
			<tr>
				<td>
					<div class='dropdown'>
						<a><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</a>
						<ul>
							<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['web_links']){?>
								<li><span>Websites:</span>
									<?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(";",$_smarty_tpl->tpl_vars['venueModel']->value['web_links']), null, 0);?>
									<ul>
										<?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?>
											<li><?php echo $_smarty_tpl->tpl_vars['website']->value;?>
</li>
										<?php } ?>
									</ul>
								</li>
							<?php }?>
							<li><span>Address:</span>
								<div class='address-wrapper'>
									<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_1'];?>
<br />
									<?php if (($_smarty_tpl->tpl_vars['venueModel']->value['address_2']!='')){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_2'];?>
<br /><?php }?>
									<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['state'];?>
 <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['postal_code'];?>
<br />
									<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>

								</div>
							</li>
							<li><span>Minimum Age:</span> <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['minimum_age'];?>
</li>
							<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['description']){?><li><span>Description:</span><div><?php echo nl2br($_smarty_tpl->tpl_vars['venueModel']->value['description']);?>
</div></li><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']){?><li><span>Special Notes:</span><div><?php echo nl2br($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']);?>
</div></li><?php }?>
						</ul>
					</div>
				</td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['contact_email']){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['contact_email'];?>

					<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['contact_email'];?>

					<?php }?>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['type'];?>
</td>
				<td>
					<?php if (($_smarty_tpl->tpl_vars['venueModel']->value['status']=='pending approval')){?>
						<div class='dropdown'><a>You must approve this venue</a>
							<ul>
								<li><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-venues/approve',array('venueId'=>$_smarty_tpl->tpl_vars['venueModel']->value['id'])); ?>">Approve venue</a></li>
								<li><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-venues/reject',array('venueId'=>$_smarty_tpl->tpl_vars['venueModel']->value['id'])); ?>">Reject venue</a></li>
							</ul>
						</div>
					<?php }elseif($_smarty_tpl->tpl_vars['venueModel']->value['status']=='approved'){?>Venue approved
					<?php }else{ ?>Submission in progress
					<?php }?>
				</td>
				<td><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/edit',array('venueId'=>$_smarty_tpl->tpl_vars['venueModel']->value['id'])); ?>"><i class='icon-edit'></i></a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php }else{ ?><p>There are currently no venues listed on the site.</p>
<?php }?><?php }} ?>