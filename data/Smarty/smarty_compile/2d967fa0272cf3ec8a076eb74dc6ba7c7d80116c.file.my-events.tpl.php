<?php /* Smarty version Smarty-3.1-DEV, created on 2014-07-29 20:40:56
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/account/account/my-events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59683295752f7a3c101c398-47496285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d967fa0272cf3ec8a076eb74dc6ba7c7d80116c' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/account/account/my-events.tpl',
      1 => 1406659241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59683295752f7a3c101c398-47496285',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f7a3c1455c36_94645398',
  'variables' => 
  array (
    'eventModelsArray' => 0,
    'eventModel' => 0,
    'repetition' => 0,
    'cost' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f7a3c1455c36_94645398')) {function content_52f7a3c1455c36_94645398($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/cara/Sites/westie/vendor/smarty/smarty/distribution/libs/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['eventModelsArray']->value){?>
	<h1>Events You Have Listed</h1>
	<table border="1" id='myEvents-table'>
		<thead>
			<tr>
				<th>Location</th>
				<th>Event Time</th>
				<th>Date Details</th>
				<th>Submitter Contact Info</th>
				<th>Extended Details</th>
				<th>Event Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['eventModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['eventModel']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModelsArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['eventModel']->key => $_smarty_tpl->tpl_vars['eventModel']->value){
$_smarty_tpl->tpl_vars['eventModel']->_loop = true;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['name'];?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_time'],'%I:%M %p');?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_time'],'%I:%M %p');?>
</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['repetitions']!=array()){?>
							<div class='dropdown'>
								<a>Repetition Details</a>
								<div>
									<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['will_stop']!=='0'){?>This will be a repeating event, repeating from <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_date'],"%D");?>
 to <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_date'],"%D");?>
 every
									<?php }else{ ?>This will be a repeating event, repeating every
									<?php }?>
									<ul>
									<?php  $_smarty_tpl->tpl_vars['repetition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['repetition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['repetitions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['repetition']->key => $_smarty_tpl->tpl_vars['repetition']->value){
$_smarty_tpl->tpl_vars['repetition']->_loop = true;
?>
										<?php if ($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='weeks'){?><li>&nbsp;&nbsp;- <?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
s</li>
										<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='months'||$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='years'){?><li>&nbsp;&nbsp;- <?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on the <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_month'];?>
<?php if ($_smarty_tpl->tpl_vars['repetition']->value['day_of_month']=='1'){?>st<?php }elseif(substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='2'){?>nd<?php }elseif(substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='3'){?>rd <?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['day_of_month']!='last'){?>th<?php }?> <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
<?php if ($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']){?> in&nbsp;<?php if ($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='1'){?>January<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='2'){?>February<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='3'){?>March<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='4'){?>April<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='5'){?>May<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='6'){?>June<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='7'){?>July<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='8'){?>August<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='9'){?>September<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='10'){?>October<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']=='11'){?>November<?php }else{ ?>December<?php }?><?php }?></li>
										<?php }else{ ?>day of the week</li>
										<?php }?>
									<?php } ?>
									</ul>
								</div>
							</div>
						<?php }else{ ?>
							<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_date'],"%D");?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_date'],"%D");?>

						<?php }?>
					</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['contact_email']){?><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['contact_email'];?>

						<?php }else{ ?>None listed
						<?php }?>
					</td>
					<td>
						<div class='dropdown'>
							<a></a>
							<ul>
								<li><span>Minimum Age:</span> <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['minimum_age'];?>
</li>
								<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['costs']!=array()){?><li><span>Costs:</span><br />
									<ul>
										<?php  $_smarty_tpl->tpl_vars['cost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['costs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cost']->key => $_smarty_tpl->tpl_vars['cost']->value){
$_smarty_tpl->tpl_vars['cost']->_loop = true;
?>
											<li>-&nbsp;<?php echo $_smarty_tpl->tpl_vars['cost']->value['person_type'];?>
 pay $<?php echo $_smarty_tpl->tpl_vars['cost']->value['amount'];?>
</li>
										<?php } ?>
									</ul>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['description']){?><li><span>Description: </span><div><?php echo nl2br($_smarty_tpl->tpl_vars['eventModel']->value['description']);?>
</div></li><?php }?>
								<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['special_notes']){?><li><span>Special Notes: </span><div><?php echo nl2br($_smarty_tpl->tpl_vars['eventModel']->value['special_notes']);?>
</div></li><?php }?>
							</ul>
						</div>
					</td>
					<td><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['status']=='suspended'){?>You must <a href="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['id'];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/review',array('eventId'=>$_tmp1)); ?>">renew</a> this event
						<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['status'];?>

						<?php }?>
					</td>
					<td><a href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/edit',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>"><i class='icon-edit'></i></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
<?php }else{ ?><h1>You have not listed any events on our site</h1>
<?php }?>
<?php }} ?>