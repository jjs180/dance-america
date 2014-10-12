<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-01 21:10:03
         compiled from "/Users/cara/Sites/westie/module/Events/view/events/partials/_edit-event-repetition-detail.php" */ ?>
<?php /*%%SmartyHeaderCode:11502116695339cd5d1f02b2-40369157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f20237bbc5328a564d379d758a2d23c70f085ce' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Events/view/events/partials/_edit-event-repetition-detail.php',
      1 => 1396379401,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11502116695339cd5d1f02b2-40369157',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5339cd5d205cf8_75117894',
  'variables' => 
  array (
    'index' => 0,
    'repetition' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5339cd5d205cf8_75117894')) {function content_5339cd5d205cf8_75117894($_smarty_tpl) {?><div class='repetitionDetail-wrapper'>
	<div id="repetitionParameter-wrapper-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
">
		<label for="editEventForm-repetitionParameter" class='required'>How often will the event repeat?</label>
		<select name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][repetition_parameter]" class="editEventForm-repetitionParameter" id="editEventForm-repetitionParameter-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" data-validators='required'>
			<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value)&&$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='one time event'){?>selected='selected'<?php }?>value="one time event">One Time Event</option>
			<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value)&&$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='years'){?>selected='selected'<?php }?> value="years">Yearly</option>
			<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value)&&$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='months'){?>selected='selected'<?php }?> value="months">Monthly</option>
			<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value)&&$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='weeks'){?>selected='selected'<?php }?> value="weeks">Weekly</option>
			<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value)&&$_smarty_tpl->tpl_vars['repetition']->value['repetition_parameter']=='days'){?>selected='selected'<?php }?> value="days">Every day</option>
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
'>weeks on</span>&nbsp;
	</div>
	<div>
		<select class='daysOfMonth-selector' name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][day_of_month]" id="daysOfMonth-select-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
">
			<?php echo $_smarty_tpl->getSubTemplate ('./_days-of-month.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</select>
		<select class='daysOfWeek-selector' name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][day_of_week]" id="daysOfWeek-select-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
">
			<?php echo $_smarty_tpl->getSubTemplate ('./_days-of-week.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
		</select>
		<div id="monthsOfYear-wrapper-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
">
			in <select name="editEventForm[repetitions][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][month_of_year]" id="monthsOfYear-select-<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
">
				<?php echo $_smarty_tpl->getSubTemplate ('./_months-of-year.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
			</select>
		</div>
	</div>
</div><?php }} ?>