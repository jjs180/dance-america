<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-05 06:53:53
         compiled from "/Users/cara/Sites/westie/module/Events/view/events/events/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88749893752f5790eee1a31-93636257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '515c5c2eb7939af119838ae68539bddb5fa85a08' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Events/view/events/events/add.tpl',
      1 => 1401943812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88749893752f5790eee1a31-93636257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f5790f28e641_60378925',
  'variables' => 
  array (
    'eventModel' => 0,
    'loggedInMember' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5790f28e641_60378925')) {function content_52f5790f28e641_60378925($_smarty_tpl) {?><h1>Add a Dance Event</h1>
<p>Registration is not necessary, but it will allow you to edit the events you have added without having to contact the admin to make changes</p>
<?php if (!isset($_smarty_tpl->tpl_vars['eventModel']->value['venue_id'])){?>
	<a id='searchForVenue-button' class='btn new' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/search'); ?>">Search for a venue</a>
<?php }else{ ?>
	<a id='changeVenue-button' class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/search'); ?>">Click to change venue</a>
<?php }?>
<form id="addEventForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/add'); ?>" method="post">
	<div>
		<label for="addEventForm-venueId" class='required'>Event Location</label>
		<?php if (isset($_smarty_tpl->tpl_vars['eventModel']->value['venue_id'])){?>
			<p><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['name'];?>
</p>
			<input id="addEventForm-venueId" type="hidden" name="addEventForm[venue_id]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue_id'];?>
"/>
		<?php }?>
	</div>
	<div>
		<label for="addEventForm-name">Name of the Event</label>
		<input id="addEventForm-name" type="text" name="addEventForm[name]" placeholder="Name" />
	</div>
	<div>
		<label for="addEventForm-startDate" class='required'>Event Date</label>
		<input type='datetime' class='NWDatePicker' id="addEventForm-startDate" name="addEventForm[start_date]" data-nwDatePicker-options="{ format:'%Y-%m-%d', startView:'years' }" data-validators='required'/>
	</div>
	<div>
		<label for="addEventForm-startTime" class='required'>Start Time</label>
		<input type='time' id="addEventForm-startTime" name="addEventForm[start_time]" data-validators='required'/>
	</div>
	<div>
		<label for="addEventForm-endTime" class='required'>End Time</label>
		<input id="addEventForm-endTime" type="time" name="addEventForm[end_time]" data-validators='required' />
	</div>
	<div id='repetitionDetails-container'>
		<label for="addEventForm-repetitionParameter" class='required'>How often will the event repeat?</label>
		<div class='repetitionDetail-wrapper' id='repetitionDetail-wrapper-0'>
			<div id="repetitionParameter-wrapper-0">
				<select name="addEventForm[repetitions][0][repetition_parameter]" class="repetitionParameter" id="addEventForm-repetitionParameter-0" data-validators='required' onchange='changeRepetitionParameter(0)' >
					<option value="one time event">One time event</option>
					<option value="days">Every day</option>
					<option value="weeks">Weekly</option>
					<option value="months">Monthly</option>
					<option value="years">Yearly</option>
				</select>
			</div>
			<div id='repetitionSpacing-wrapper-0' class='repetitionSpacing-wrapper'>
				<span>The event will repeat every</span>
				<input id="addEventForm-repetitionSpacing-0" type="text" name="addEventForm[repetitions][0][repetition_spacing]" data-validators="required" />
				<span id='repetitionFactor-wrapper-0'>weeks on</span>&nbsp;
			</div>
			<div>
				<select class='daysOfMonth-selector' name="addEventForm[repetitions][0][day_of_month]" id="daysOfMonth-select-0" onchange='changeDayOfMonth(0)'>
					<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_days-of-month.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</select>
				<select class='daysOfWeek-selector' name="addEventForm[repetitions][0][day_of_week]" id="daysOfWeek-select-0" onchange='changeDayOfWeek(0)'>
					<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_days-of-week.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
				</select>
				<div id="monthsOfYear-wrapper-0">
					in <select name="addEventForm[repetitions][0][month_of_year]" id="monthsOfYear-select-0" onchange='changeMonthOfYear(0)'>
						<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_months-of-year.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
					</select>
				</div>
				<a onclick="deleteRepetition(0)" id='deleteRepetitionButton-0' class='btn negative deleteRepetitionButton'>-</a>
			</div>
		</div>
		<a id='addRepetitionButton-0' class='addRepetitionButton btn new'>+</a>
	</div>
	<div id='eventWillStop-wrapper'>
		<label for="addEventForm-willStop" class='required'>When will the event stop repeating?</label>
		<select name="addEventForm[will_stop]" id="addEventForm-willStop" data-validators='required'>
			<option value="0">Never</option>
			<option value="1">On date</option>
		</select>
	</div>
	<div id='eventEndDate-wrapper'>
		<label for="addEventForm-endDate" class='required'>End Date</label>
		<input type='datetime' class='NWDatePicker' id="addEventForm-endDate" name="addEventForm[end_date]" data-nwDatePicker-options="{ format:'%Y-%m-%d', startView:'years' }" data-validators='required'/>
	</div>
	<div id='costDetails-container'>
		<label for="addEventForm-cost">Cost of Event</label>
		<div id='costDetails-rhsWrapper'>
			<div>
				<input type="text" name="addEventForm[costs][0][person_type]" class='person-type' placeholder='Type (eg members, non-members, etc)' /> pay $ <input type="text" name="addEventForm[costs][0][amount]" placeholder='Amount (USD)' data-validators='validate-numeric' />
			</div>
		</div>
	</div>
	<div>
		<a id='addCost-button' class='btn'>Click to put in cost details</a>
	</div>
	<div>
		<label for="addEventForm-minimumAge" class='required'>Minimum Age</label>
		<select name="addEventForm[minimum_age]" id="addEventForm-minimumAge" data-validators="required">
			<option value="None" selected='selected'>None</option>
			<option value="18 and over">18 and over</option>
			<option value="21 and over">21 and over</option>
		</select>
	</div>
	<div id='webLinks-container'>
		<label for="addEventForm-webLinks">Websites</label>
		<div class='webLink-wrapper'>
			<div>
				<label>Url</label>
				<input type="url" placeholder="Url" name='addEventForm[url][]' data-validators='validate-url' />
			</div>
		</div>
	</div>
	<div>
		<a class='btn' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="addEventForm-description">Description</label>
		<textarea id="addEventForm-description" type="text" name="addEventForm[description]" placeholder="Description" ></textarea>
	</div>
	<div>
		<label for="addEventForm-specialNotes">Special Notes</label>
		<textarea id="addEventForm-specialNotes" type="text" name="addEventForm[special_notes]" placeholder="Special Notes" ></textarea>
	</div>
	<div>
		<label for="addEventForm-contactEmail">Your Email</label>
		<div>
			<input id="addEventForm-contactEmail" type="text" name="addEventForm[contact_email]" placeholder="Email" data-validators="validate-email" <?php if ($_smarty_tpl->tpl_vars['loggedInMember']->value){?>value="<?php echo $_smarty_tpl->tpl_vars['loggedInMember']->value['email'];?>
"<?php }?> />
		</div>
		<div>If you leave this blank and we have questions about your event, it will not be approved</div>
	</div>
	<div><button class='new btn'>Add Event</button></div>
</form>
<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_addEventScript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>