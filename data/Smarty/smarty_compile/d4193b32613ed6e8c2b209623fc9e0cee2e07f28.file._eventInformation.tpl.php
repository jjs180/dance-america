<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-17 03:01:36
         compiled from "/Users/cara/Sites/dance_america/module/Events/view/events/partials/_eventInformation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80734496654e256a86404e0-67085567%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4193b32613ed6e8c2b209623fc9e0cee2e07f28' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Events/view/events/partials/_eventInformation.tpl',
      1 => 1424138495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80734496654e256a86404e0-67085567',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54e256a8982ba8_86065722',
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
<?php if ($_valid && !is_callable('content_54e256a8982ba8_86065722')) {function content_54e256a8982ba8_86065722($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/cara/Sites/dance_america/vendor/smarty/smarty/distribution/libs/plugins/modifier.date_format.php';
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
				<?php }else{ ?><li>&nbsp;&nbsp;- day of the week</li>
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
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['description']){?>
	<li>
		<label>Description:</label>
		<div><?php echo nl2br($_smarty_tpl->tpl_vars['eventModel']->value['description']);?>
</div>
	</li>
<?php }?><?php }} ?>