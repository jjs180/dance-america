<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-01 03:24:23
         compiled from "/Users/cara/Sites/westie/module/Admin/view/admin/admin/edit-event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2014224149533a14c9e63620-64606960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2270ea97f5f96a1551a5ffca1e1f30f71824e5f5' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Admin/view/admin/admin/edit-event.tpl',
      1 => 1396315411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2014224149533a14c9e63620-64606960',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_533a14c9e8c330_39431619',
  'variables' => 
  array (
    'eventModel' => 0,
    'websites' => 0,
    'website' => 0,
    'loggedInMember' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533a14c9e8c330_39431619')) {function content_533a14c9e8c330_39431619($_smarty_tpl) {?><h1>Edit your event</h1>
<a id='changeVenue-button' class='btn new' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/search',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">Click to change venue</a>
<form id="editEventForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('manage-events/edit',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>" method="post">
	<div>
		<label for="editEventForm-venueId" class='required'>Event Location:</label>
		<?php if (isset($_smarty_tpl->tpl_vars['eventModel']->value['venue_id'])){?>
			<p><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['name'];?>
</p>
			<input id="editEventForm-venueId" type="hidden" name="editEventForm[venue_id]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue_id'];?>
" data-validators="required" />
		<?php }?>
	</div>
	<div>
		<label for="editEventForm-name">Name of the Event (eg: Wednesday Night Swing)</label>
		<input id="editEventForm-name" type="text" name="editEventForm[name]" placeholder="Name" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['name'];?>
"/>
	</div>
	<div>
		<label for="editEventForm-startDate" class='required'>Starting Date</label>
		<input id="editEventForm-startDate" type="date" name="editEventForm[start_date]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['start_date'];?>
" data-validators='required' />
	</div>
	<div>
		<label for="editEventForm-startTime" class='required'>Start Time</label>
		<input id="editEventForm-startTime" type="time" name="editEventForm[start_time]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['start_time'];?>
" data-validators='required' />
	</div>
	<div>
		<label for="editEventForm-endTime" class='required'>End Time</label>
		<input id="editEventForm-endTime" type="time" name="editEventForm[end_time]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['end_time'];?>
" data-validators='required' />
	</div>
	<div id='repetitionDetails-container'>
		<?php if (!empty($_smarty_tpl->tpl_vars['eventModel']->value['repetitions'])){?>
			<?php  $_smarty_tpl->tpl_vars['repetition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['repetition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['repetitions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['repetition']->key => $_smarty_tpl->tpl_vars['repetition']->value){
$_smarty_tpl->tpl_vars['repetition']->_loop = true;
?>
				<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_edit-event-repetition-detail.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<?php } ?>
		<?php }else{ ?>
			<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_edit-event-repetition-detail.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php }?>
		<div id='eventWillStop-wrapper'>
			<label for="editEventForm-willStop" class='required'>When will the event stop repeating?</label>
			<select name="editEventForm[will_stop]" id="editEventForm-willStop" data-validators='required'>
				<option value="1">On date</option>
				<option value="0">Never</option>
			</select>
		</div>
	</div>
	
		<!-- <div>
			<label for="editEventForm-memberCost">Cost for Members</label>
			<input id="editEventForm-memberCost" type="text" name="editEventForm[member_cost]" placeholder="Cost for Members" />
		</div>
		<div>
			<label for="editEventForm-nonMemberCost">Cost for Non-Members</label>
			<input id="editEventForm-nonMemberCost" type="text" name="editEventForm[non_member_cost]" placeholder="Cost for Non-Members"/>
		</div> -->
	<div id='eventEndDate-wrapper'>
		<label for="editEventForm-endDate" class='required'>End Date</label>
		<input type='datetime' class='NWDatePicker' id="editEventForm-endDate" name="editEventForm[end_date]" data-nwDatePicker-options="{ format:'%m/%d/%y', startView:'years' }" data-validators='required'/>
	</div>
	<div>
		<label for="editEventForm-cost">Cost of Event</label>
		<a id='addCostDetails-button' class='btn'>Click to put in cost details</a>
		<div id='costDetails-wrapper'>
			<a onclick="addCost()" class='btn'>Add more cost details</a>
			<div>
				<input type="text" name="editEventForm[costs][person_type]" class='person-type' placeholder='Type (eg members, non-members, etc)' /> pay $ <input type="text" name="editEventForm[costs][amount]" placeholder='Amount (USD)' data-validators='validate-numeric' />
			</div>
		</div>
	</div>
	<div>
		<label for="editEventForm-minimumAge" class='required'>Minimum Age</label>
		<select name="editEventForm[minimum_age]" id="editEventForm-minimumAge" data-validators="required">
			<option <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['minimum_age']=='None'){?>selected='selected'<?php }?> value="None" selected='selected'>None</option>
			<option <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['minimum_age']=='18 and over'){?>selected='selected'<?php }?> value="18 and over">18 and over</option>
			<option <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['minimum_age']=='21 and over'){?>selected='selected'<?php }?> value="21 and over">21 and over</option>
		</select>
	</div>
	<div id='webLinks-container'>
		<label for="editEventForm-webLinks">Websites</label>
		<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['web_links']){?>
			<?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(',',$_smarty_tpl->tpl_vars['eventModel']->value['web_links']), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?>
				<div class='webLink-wrapper'>
					<div>
						<label>Url</label>
						<input type="url" placeholder="Url" name='editEventForm[url][]' data-validators='validate-url' value="<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
"/>
					</div>
				</div>
			<?php } ?>
		<?php }else{ ?>
			<div class='webLink-wrapper'>
				<div>
					<label>Url</label>
					<input type="url" placeholder="Url" name='editEventForm[url][]' data-validators='validate-url' />
				</div>
			</div>
		<?php }?>
	</div>
	<div>
		<a class='btn new' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="editEventForm-description">Description</label>
		<textarea id="editEventForm-description" type="text" name="editEventForm[description]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['description'];?>
" placeholder="Description" ></textarea>
	</div>
	<div>
		<label for="editEventForm-specialNotes">Special Notes</label>
		<textarea id="editEventForm-specialNotes" type="text" name="editEventForm[special_notes]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['special_notes'];?>
" placeholder="Special Notes" ></textarea>
	</div>
	<div>
		<label for="editEventForm-contactEmail">Your Email</label>
		<div>
			<input id="editEventForm-contactEmail" type="text" name="editEventForm[contact_email]" placeholder="Email" data-validators="validate-email" <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['contact_email']){?>value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['contact_email'];?>
"<?php }else{ ?> value="<?php echo $_smarty_tpl->tpl_vars['loggedInMember']->value['email'];?>
"<?php }?> />
		</div>
		<div>If you leave this blank and we have questions about your event, it will not be approved</div>
	</div>
	<div><button class='new'>Submit</button></div>
</form>

<script type="text/javascript" charset="utf-8">
function addInput() {
	var webLinkContainer = document.getElementById('webLinks-container');
	webLinkContainer.insertAdjacentHTML('beforeend', "<div class='webLink-wrapper'><div><label>Url</label><input type='url' name='editEventForm[url]' placeholder='Url' data-validators='validate-url' /></div></div>");
};

var peopleTypes = [];
function addCost() {
	var costDetailsWrapper = document.getElementById('costDetails-wrapper');
	costDetailsWrapper.insertAdjacentHTML('beforeend', "<div><input type='text' name='editEventForm[costs][person_type]' class='person-type' placeholder='Type (eg members, non-members, etc)' /> pay $ <input type='text' name='editEventForm[costs][amount]' placeholder='Amount (USD)' data-validators='validate-numeric' /></div>");
}

$j('#addCostDetails-button').click(function(){
	$j(this).css('display', 'none');
	$j('#costDetails-wrapper').css('display', 'inline-block');
});

$j('.editEventForm-cost').each(function() {
	costTypes = $j(this).val();
});

$j('#editEventForm-startDate').change(function() {
	var startDateValue = $j(this).val();
	$j('#editEventForm-endDate').attr('value', startDateValue);
});

$j('#editEventForm-startTime').change(function() {
	var startTimeValue = $j(this).val();
	$j('#editEventForm-endTime').attr('value', startTimeValue);
});

id = $j('.repetitionParameter').attr('id');
index = id.substr(id.length-1);

$j('.repetitionParameter').change(function(){
	frequency = $j(this).val();
	id = $j(this).attr('id');
	index = id.substr(id.length-1);
	if (frequency != 'one time event') {
		$j('#eventWillStop-wrapper').css('display', 'block');
		$j('#eventEndDate-wrapper').css('display', 'block');
		if (frequency == 'days') {
			$j('#daysOfWeek-select-'+index).css('display', 'none');
			$j('#daysOfMonth-select-'+index).css('display', 'none');
			$j('#monthsOfYear-wrapper-'+index).css('display', 'none');
			$j('#repetitionSpacing-wrapper-'+index).css('display', 'none');
		}else if (frequency == 'weeks') {
			$j('#repetitionSpacing-wrapper-'+index).css('display', 'inline-block');
			$j('#daysOfWeek-select-'+index).css('display', 'inline-block');
			$j('#daysOfMonth-select-'+index).css('display', 'none');
			$j('#monthsOfYear-wrapper-'+index).css('display', 'none');
			$j('#repetitionFactor-wrapper-'+index).text('weeks on');
		}else if (frequency == 'months') {
			$j('#repetitionSpacing-wrapper-'+index).css('display', 'inline-block');
			$j('#daysOfWeek-select-'+index).css('display', 'inline-block');
			$j('#daysOfMonth-select-'+index).css('display', 'inline-block');
			$j('#monthsOfYear-wrapper-'+index).css('display', 'none');
			$j('#repetitionFactor-wrapper-'+index).text('months on the');
		}else if (frequency == 'years') {
			$j('#repetitionSpacing-wrapper-'+index).css('display', 'inline-block');
			$j('#monthsOfYear-wrapper-'+index).css('display', 'inline-block');
			$j('#monthsOfYear-select-'+index).css('display', 'inline-block');
			$j('#daysOfWeek-select-'+index).css('display', 'inline-block');
			$j('#daysOfMonth-select-'+index).css('display', 'inline-block');
			$j('#repetitionFactor-wrapper-'+index).text('years on the');
		}
	} else {
		$j('#eventWillStop-wrapper').css('display', 'none');
	}
});

var willStop = $j('#editEventForm-willStop').val();
$j('#editEventForm-willStop').change(function() {
	willStop = $j(this).val();
	if (willStop=='1') $j('#eventEndDate-wrapper').css('display', 'block');
	else  $j('#eventEndDate-wrapper').css('display', 'none');
});

	
$j('.daysOfWeek-selector').change(function() {
	var dayOfMonthSelection = $j('#daysOfMonth-select-'+index).val();
	var dayOfWeekSelection = $j('#daysOfWeek-select-'+index).val();
	var monthOfYearSelection = $j('#monthsOfYear-select-'+index).val();
	
	if (dayOfMonthSelection != '4' && dayOfMonthSelection != '3' && dayOfMonthSelection != '2' && dayOfMonthSelection !='1' && dayOfWeekSelection != 'day' && dayOfWeekSelection != '') {
		$j('#daysOfMonth-select-'+index).val('last');
	}
});

$j('.daysOfMonth-selector').change(function() {
	var dayOfMonthSelection = $j('#daysOfMonth-select-'+index).val();
	var dayOfWeekSelection = $j('#daysOfWeek-select-'+index).val();
	var monthOfYearSelection = $j('#monthsOfYear-select-'+index).val();
	
	if (dayOfMonthSelection != '4' && dayOfMonthSelection != '3' && dayOfMonthSelection != '2' && dayOfMonthSelection !='1' && dayOfWeekSelection != 'day' && dayOfWeekSelection != '') {
		$j('#daysOfWeek-select-'+index).val('day');
	}
});

$j('button').click(function() {
	var startDate = $j('#editEventForm-startDate').val();
	$j('#editEventForm-endDate').attr('value', startDate);
	$j('form').submit();
});
</script><?php }} ?>