<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-16 22:11:28
         compiled from "/Users/cara/Sites/dance_america/module/Admin/view/admin/emails/approve-event-email.tpl" */ ?>
<?php /*%%SmartyHeaderCode:144016454354e25d00cd5ed9-25681403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db46a62c9ac49dbc9fb2fdb9a5d0b6dfdd29b126' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Admin/view/admin/emails/approve-event-email.tpl',
      1 => 1398828353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144016454354e25d00cd5ed9-25681403',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'eventModel' => 0,
    'websites' => 0,
    'website' => 0,
    'repetition' => 0,
    'cost' => 0,
    'acceptEventLink' => 0,
    'rejectEventLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54e25d00f0d7d0_58199571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e25d00f0d7d0_58199571')) {function content_54e25d00f0d7d0_58199571($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Users/cara/Sites/dance_america/vendor/smarty/smarty/distribution/libs/plugins/modifier.date_format.php';
?><h1>A new event has been added</h1>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['name']){?>
	<div><label><strong>Name of the Event:</strong></label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['name'];?>
</div>
<?php }?>
<div><label><strong>Venue:</strong></label><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['name'];?>
</div>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['web_links']){?>
	<label><strong>Websites:</strong></label>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['repetitions']!=array()){?>
	<label><strong>Repetition Details:</strong></label> This event will repeat every
	<?php  $_smarty_tpl->tpl_vars['repetition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['repetition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['repetitions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['repetition']->key => $_smarty_tpl->tpl_vars['repetition']->value){
$_smarty_tpl->tpl_vars['repetition']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='weeks'){?><br/>&nbsp;&nbsp;-&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
s
		<?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='months'||$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='years'){?><br/>&nbsp;&nbsp;-&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on the <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_month'];?>
<?php if (substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='2'){?>nd<?php }elseif(substr($_smarty_tpl->tpl_vars['repetition']->value['day_of_month'],-1)=='3'){?>rd <?php }elseif($_smarty_tpl->tpl_vars['repetition']->value['day_of_month']!='last'){?>st<?php }?> <?php echo $_smarty_tpl->tpl_vars['repetition']->value['day_of_week'];?>
<?php if ($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']){?> in&nbsp;<?php echo $_smarty_tpl->tpl_vars['repetition']->value['month_of_year'];?>
<?php }?>
		<?php }else{ ?>&nbsp;day of the week
		<?php }?>
	<?php } ?>
<?php }else{ ?><div><label><strong>One Time Event:</strong></label> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_date']);?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_date']);?>
</div>
<?php }?>
<div><label><strong>Time:</strong></label> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['start_time'],'%I:%M %p');?>
 - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eventModel']->value['end_time'],'%I:%M %p');?>
</div>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['costs']!=array()){?>
	<label><strong>Cost:</strong></label>
	<?php  $_smarty_tpl->tpl_vars['cost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['costs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cost']->key => $_smarty_tpl->tpl_vars['cost']->value){
$_smarty_tpl->tpl_vars['cost']->_loop = true;
?>
		-<?php echo $_smarty_tpl->tpl_vars['cost']->value['person_type'];?>
 pay $<?php echo $_smarty_tpl->tpl_vars['cost']->value['amount'];?>

	<?php } ?>
<?php }?>
<div><label><strong>Minimum Age:</strong></label> <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['minimum_age'];?>
</div>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['description']){?><label><strong>Description:</strong></label> <?php echo nl2br($_smarty_tpl->tpl_vars['eventModel']->value['description']);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['special_notes']){?><label><strong>Special Notes:</strong></label> <?php echo nl2br($_smarty_tpl->tpl_vars['eventModel']->value['special_notes']);?>
<?php }?>

<p>To approve this event, click <a href="<?php echo $_smarty_tpl->tpl_vars['acceptEventLink']->value;?>
" target='_blank'>HERE</a></p>
<div><strong>OR</strong></div>
<p>To reject this event, click <a href="<?php echo $_smarty_tpl->tpl_vars['rejectEventLink']->value;?>
" target='_blank'>HERE</a></p><?php }} ?>