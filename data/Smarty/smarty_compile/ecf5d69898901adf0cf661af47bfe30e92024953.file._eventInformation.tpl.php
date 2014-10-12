<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-05 02:29:49
         compiled from "/Users/cara/Sites/westie/module/Events/view/events/partials/_eventInformation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9729915585356f06ac783a6-78171515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecf5d69898901adf0cf661af47bfe30e92024953' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Events/view/events/partials/_eventInformation.tpl',
      1 => 1401928188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9729915585356f06ac783a6-78171515',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5356f06ae7b412_09039428',
  'variables' => 
  array (
    'eventModel' => 0,
    'websites' => 0,
    'website' => 0,
    'repetition' => 0,
    'cost' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5356f06ae7b412_09039428')) {function content_5356f06ae7b412_09039428($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/cara/Sites/westie/vendor/smarty/smarty/distribution/libs/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['eventModel']->value['name']){?>
	<li>
		<label>Name of the Event:</label><div><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['name'];?>
</div>
	</li>
<?php }?>
<li>
	<label>Venue:</label>
	<div><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['name'];?>
</div>
</li>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['web_links']){?>
	<li>
		<label>Websites:</label>
		<ul>
			<?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['eventModel']->value['web_links']), null, 0);?>
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
<li>
	<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['repetitions']!=array()){?>
		<label>Repetition Details:</label>
		<ul>
			This event will repeat every
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
	<?php }else{ ?>
		<label>One Time Event:</label>
		<div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_date']);?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_date']);?>
</div>
	<?php }?>
<li>
	<label>Time:</label> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_time'],'%I:%M %p');?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_time'],'%I:%M %p');?>

</li>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['costs']!=array()){?>
	<li>
		<label>Cost:</label>
		<ul>
			<?php  $_smarty_tpl->tpl_vars['cost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['costs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cost']->key => $_smarty_tpl->tpl_vars['cost']->value){
$_smarty_tpl->tpl_vars['cost']->_loop = true;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['cost']->value['person_type'];?>
 pay $<?php echo $_smarty_tpl->tpl_vars['cost']->value['amount'];?>
</li>
			<?php } ?>
		</ul>
	</li>
<?php }?>
<li>
	<label>Minimum Age:</label> <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['minimum_age'];?>

</li>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['description']){?>
	<li>
		<label>Description:</label>
		<div><?php echo nl2br($_smarty_tpl->tpl_vars['eventModel']->value['description']);?>
</div>
	</li>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['special_notes']){?>
	<li>
		<label>Special Notes:</label>
		<div><?php echo nl2br($_smarty_tpl->tpl_vars['eventModel']->value['special_notes']);?>
</div>
	</li>
<?php }?><?php }} ?>