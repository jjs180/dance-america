<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-29 20:46:54
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/account/account/my-venues.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102282874552f7a92c428d83-35487466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de1d29ec70eac850d5608684dca766cea67aacb0' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/account/account/my-venues.tpl',
      1 => 1398796853,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102282874552f7a92c428d83-35487466',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f7a92cae80e8_25243078',
  'variables' => 
  array (
    'venueModelsArray' => 0,
    'venueModel' => 0,
    'websites' => 0,
    'website' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f7a92cae80e8_25243078')) {function content_52f7a92cae80e8_25243078($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['venueModelsArray']->value){?>
<h1>Venues You Have Listed</h1>
	<table border="1" id='myVenues-table'>
		<thead>
			<tr>
				<th>Name</th>
				<th>Websites</th>
				<th>Address</th>
				<th>Minimum Age</th>
				<th>Venue Type</th>
				<th>Extended Details</th>
				<th>Status</th>
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
					<td><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['venueModel']->value['web_links']){?>
							<?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['venueModel']->value['web_links']), null, 0);?>
							<?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?>
								<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
<br/>
							<?php } ?>
						<?php }else{ ?>None listed
						<?php }?>
					</td>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_1'];?>
<br />
						<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['address_2']!=''){?><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_2'];?>
<br /><?php }?>
						<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['state'];?>
 <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['postal_code'];?>
<br />
						<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>

					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['type'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['minimum_age'];?>
</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['description']||$_smarty_tpl->tpl_vars['venueModel']->value['special_notes']){?>
							<div class='dropdown'>
								<a></a>
								<ul>
									<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['description']){?><li><span>Description:</span><div><?php echo nl2br($_smarty_tpl->tpl_vars['venueModel']->value['description']);?>
</div></li><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']){?><li><span>Special Notes:</span><div><?php echo nl2br($_smarty_tpl->tpl_vars['venueModel']->value['special_notes']);?>
</div></li><?php }?>
								</ul>
							</div>
						<?php }else{ ?>None Listed
						<?php }?>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['status'];?>
</td>
					<td class='editting-cell'><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/edit',array('venueId'=>$_smarty_tpl->tpl_vars['venueModel']->value['id'])); ?>"><i class='icon-edit'></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
<?php }else{ ?><h1>You have not submitted any venues to our site</h1>
<?php }?><?php }} ?>