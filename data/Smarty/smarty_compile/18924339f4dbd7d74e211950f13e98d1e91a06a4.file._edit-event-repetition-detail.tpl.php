<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-30 05:25:05
         compiled from "/Users/cara/Sites/westie/module/Events/view/events/partials/_edit-event-repetition-detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1903822629533b0f56735ae6-23822497%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18924339f4dbd7d74e211950f13e98d1e91a06a4' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Events/view/events/partials/_edit-event-repetition-detail.tpl',
      1 => 1398828220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1903822629533b0f56735ae6-23822497',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_533b0f5686e2c4_82271738',
  'variables' => 
  array (
    'index' => 0,
    'repetition' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533b0f5686e2c4_82271738')) {function content_533b0f5686e2c4_82271738($_smarty_tpl) {?><div class='repetitionDetail-wrapper' id="repetitionDetail-wrapper-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
">
	<div id="repetitionParameter-wrapper-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
">
		<select name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][repetition_parameter]" class="repetitionParameter" id="editEventForm-repetitionParameter-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" data-validators='required' onchange="changeRepetitionParameter(<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
)">
			<option <?php if ($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='years'){?>selected='selected'<?php }?> value="years">Yearly</option>
			<option <?php if ($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='months'){?>selected='selected'<?php }?> value="months">Monthly</option>
			<option <?php if ($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='weeks'){?>selected='selected'<?php }?> value="weeks">Weekly</option>
			<option <?php if ($_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='days'){?>selected='selected'<?php }?> value="days">Every day</option>
			<option value="one time event">One time event</option>
		</select>
	</div>
	<div id='repetitionSpacing-wrapper-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
' class='repetitionSpacing-wrapper'>
		<span>The event will repeat every</span>
		<input id="editEventForm-repetitionSpacing-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" type="text" name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][repetition_spacing]" value="<?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_spacing'];?>
" data-validators="required" />
		<span id='repetitionFactor-wrapper-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter'];?>
 on</span>
	</div>
	<div>
		<select class='daysOfMonth-selector' name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][day_of_month]" id="daysOfMonth-select-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" style="<?php if ($_smarty_tpl->tpl_vars['repetition']->value['day_of_month']!=''){?>display:inline-block;<?php }else{ ?>display:none;<?php }?>" onchange="changeDayOfMonth(<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
)">
			<?php echo $_smarty_tpl->getSubTemplate ('./_days-of-month.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</select>
		<select class='daysOfWeek-selector' name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][day_of_week]" id="daysOfWeek-select-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" style="<?php if ($_smarty_tpl->tpl_vars['repetition']->value['day_of_week']!=''){?>display:inline-block;<?php }else{ ?>display:none;<?php }?>" onchange="changeDayOfWeek(<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
)">
			<?php echo $_smarty_tpl->getSubTemplate ('./_days-of-week.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
		</select>
		<div id="monthsOfYear-wrapper-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" style="<?php if ($_smarty_tpl->tpl_vars['repetition']->value['month_of_year']!=''){?>display:inline-block;<?php }else{ ?>display:none;<?php }?>">
			in <select name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][month_of_year]" id="monthsOfYear-select-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" onchange="changeMonthOfYear(<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
)">
				<?php echo $_smarty_tpl->getSubTemplate ('./_months-of-year.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
			</select>
		</div>
		<a onclick="deleteRepetition(<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
)" id="deleteRepetitionButton-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" class='btn negative deleteRepetitionButton' style='display:block;'>-</a>
	</div>
	<input type="hidden" name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][id]" value="<?php echo $_smarty_tpl->tpl_vars['repetition']->value['id'];?>
" />
</div><?php }} ?>