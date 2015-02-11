<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-09 17:14:42
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/account/account/edit-event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48929754152f7a972c43db4-21056463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f609700983122e45346f4cc48018efdae032bdb' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/account/account/edit-event.tpl',
      1 => 1391531647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48929754152f7a972c43db4-21056463',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'eventModel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f7a97342dc78_80883497',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f7a97342dc78_80883497')) {function content_52f7a97342dc78_80883497($_smarty_tpl) {?><script>
var count = 0;
function addInput() {
	document.getElementById('webLinks-container').innerHTML += "<div class='webLink-wrapper'><label>Type</label><input type='text' placeholder='Type of link (eg Facebook or Home Page)' name='editEventForm[link_type]' data-validators='required' /><label>Url</label><input class='webLink' type='url' name='editEventForm[link]' placeholder='Url' data-validators='validate-url' /></div>";
}
</script>

<h1>Edit <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['name'];?>
</h1>
<p>Edit the event information below as necessary.</p>
<a id='searchForVenue-button' class='btn positive NWPopup' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('search-venues'); ?>">Click to change venue</a>
<form id="editEventForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('edit-event'); ?>" method="post">
	<div>
		<label for="editEventForm-venueId" class='required'>Event Location: <?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue']['name'];?>
</label>
		<input id="editEventForm-venueId" type="hidden" name="editEventForm[venue_id]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['venue_id'];?>
" data-validators="required" />
	</div>
	<div>
		<label for="editEventForm-name" class='required'>Name of the Event (eg: Wednesday Night Swing)</label>
		<input id="editEventForm-name" type="text" name="editEventForm[name]" placeholder="Name" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['name'];?>
" data-validators="required" />
	</div>
	<div id='webLinks-container'>
		<label for="editEventForm-webLinks">Web Links</label>
		<div class='webLink-wrapper'>
			<label>Type</label>
			<input type="text" placeholder="Type of link (eg Facebook or Home Page)" name='editEventForm[link_type]' data-validators='required' />
			<label>Url</label>
			<input class="webLink" type="url" placeholder="Url" name='editEventForm[link]' data-validators='validate-url' />
		</div>
	</div>
	<div>
		<a class='btn positive' onclick="addInput()" id='addWebLink-button'>Add another link</a>
	</div>
	<div>
		<label for="editEventForm-monthlyFrequency" class='required'>Frequency of Event</label>
		<select name="editEventForm[monthly_frequency]" id="editEventForm-monthlyFrequency" data-validators='required'>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['monthly_frequency']=='one time event') {?>selected='selected'<?php }?> value="one time event">One Time Event</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['monthly_frequency']=='Yearly') {?>selected='selected'<?php }?> value="Yearly">Yearly</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['monthly_frequency']=='1') {?>selected='selected'<?php }?> value="1">Once a month</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['monthly_frequency']=='2') {?>selected='selected'<?php }?> value="2">Bi-weekly</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['monthly_frequency']=='4') {?>selected='selected'<?php }?> value="4">Every week</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['monthly_frequency']=='30') {?>selected='selected'<?php }?> value="30">Every day</option>
		</select>
	</div>
	<div>
		<label for="editEventForm-startDate" class='required'>Starting Date</label>
		<input id="editEventForm-startDate" type="date" name="editEventForm[start_date]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['start_date'];?>
" data-validators='required' />
	</div>
	<div>
		<label for="editEventForm-endDate" class='required'>Ending Date</label>
		<input id="editEventForm-endDate" type="date" name="editEventForm[end_date]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['end_date'];?>
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
	<!-- <div>
		<label for="editEventForm-memberCost">Cost for Members</label>
		<input id="editEventForm-memberCost" type="text" name="editEventForm[member_cost]" placeholder="Cost for Members" />
	</div>
	<div>
		<label for="editEventForm-nonMemberCost">Cost for Non-Members</label>
		<input id="editEventForm-nonMemberCost" type="text" name="editEventForm[non_member_cost]" placeholder="Cost for Non-Members"/>
	</div> -->
	<div>
		<label for="editEventForm-minimumAge" class='required'>Minimum Age</label>
		<select name="editEventForm[minimum_age]" id="editEventForm-minimumAge" data-validators="required">
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['minimum_age']=='None') {?>selected='selected'<?php }?> value="None" selected='selected'>None</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['minimum_age']=='18 and over') {?>selected='selected'<?php }?> value="18 and over">18 and over</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['minimum_age']=='21 and over') {?>selected='selected'<?php }?> value="21 and over">21 and over</option>
		</select>
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
	<div><button type="submit">Add Event</button></div>
</form>
<?php }} ?>
