<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-05 07:38:11
         compiled from "/Users/cara/Sites/westie/module/Events/view/events/events/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172032252752f5791109c6b0-20387370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b84ca0632758ac5807404e59efba982670c30b2' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Events/view/events/events/edit.tpl',
      1 => 1401943855,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172032252752f5791109c6b0-20387370',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f579119a9db8_96195658',
  'variables' => 
  array (
    'eventModel' => 0,
    'index' => 0,
    'cost' => 0,
    'websites' => 0,
    'website' => 0,
    'loggedInMember' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f579119a9db8_96195658')) {function content_52f579119a9db8_96195658($_smarty_tpl) {?><h1>Edit your event</h1>
<a id='changeVenue-button' class='btn positive' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/search',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">Click to change venue</a>
<form id="editEventForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/edit',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>" method="post">
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
		<input id="editEventForm-startDate" type='datetime' class='NWDatePicker' name="editEventForm[start_date]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['start_date'];?>
" data-nwDatePicker-options="{ format:'%Y-%m-%d', startView:'years' }"  data-validators='required'/>
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
		<label for="editEventForm-repetitionParameter" class='required'>How often will the event repeat?</label>
		<?php $_smarty_tpl->tpl_vars['index'] = new Smarty_variable(0, null, 0);?>
		<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['repetitions']!=array()){?>
			<?php  $_smarty_tpl->tpl_vars['repetition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['repetition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['repetitions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['repetition']->key => $_smarty_tpl->tpl_vars['repetition']->value){
$_smarty_tpl->tpl_vars['repetition']->_loop = true;
?>
				<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_edit-event-repetition-detail.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php $_smarty_tpl->tpl_vars['index'] = new Smarty_variable($_smarty_tpl->tpl_vars['index']->value+1, null, 0);?>
			<?php } ?>
		<?php }else{ ?>
			<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_edit-event-repetition-detail-no-existing-repetitions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['repetitions']){?><a id="addRepetitionButton-<?php echo count($_smarty_tpl->tpl_vars['eventModel']->value['repetitions'])-1;?>
" class='addRepetitionButton btn positive'style='display:block;'>+</a>
		<?php }else{ ?><a id="addRepetitionButton-0" class='addRepetitionButton btn positive'>+</a>
		<?php }?>
	</div>
	<div id='eventWillStop-wrapper'>
		<label for="editEventForm-willStop" class='required'>When will the event stop repeating?</label>
		<select name="editEventForm[will_stop]" id="editEventForm-willStop" data-validators='required'>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="0" <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['will_stop']==='0'){?>selected='selected'<?php }?>>Never</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="1" <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['will_stop']==='1'){?>selected='selected'<?php }?>>On date</option>
		</select>
	</div>
	<div id='eventEndDate-wrapper'>
		<label for="editEventForm-endDate" class='required'>End Date</label>
		<input type='datetime' class='NWDatePicker' id="editEventForm-endDate" name="editEventForm[end_date]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['end_date'];?>
" data-nwDatePicker-options="{ format:'%Y-%m-%d', startView:'years' }" data-validators='required'/>
	</div>
	<div id='costDetails-container' <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['costs']!=array()){?>style='display: block;'<?php }?>>
		<label for="editEventForm-cost">Cost of Event</label>
		<div id='costDetails-rhsWrapper'>
			<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['costs']!=array()){?>
				<?php $_smarty_tpl->tpl_vars['index'] = new Smarty_variable(0, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['cost'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cost']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventModel']->value['costs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cost']->key => $_smarty_tpl->tpl_vars['cost']->value){
$_smarty_tpl->tpl_vars['cost']->_loop = true;
?>
					<div>
						<input type="text" name="editEventForm[costs][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][person_type]" class='person-type' placeholder='Type (eg members, non-members, etc)' value="<?php echo $_smarty_tpl->tpl_vars['cost']->value['person_type'];?>
" /> pay $ <input type="text" name="editEventForm[costs][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][amount]" placeholder='Amount (USD)' value="<?php echo $_smarty_tpl->tpl_vars['cost']->value['amount'];?>
" data-validators='validate-numeric' />
						<input type="hidden" name="editEventForm[costs][<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
][id]" value="<?php echo $_smarty_tpl->tpl_vars['cost']->value['id'];?>
" />
					</div>
					<?php $_smarty_tpl->tpl_vars['index'] = new Smarty_variable($_smarty_tpl->tpl_vars['index']->value+1, null, 0);?>
				<?php } ?>
			<?php }?>
		</div>
	</div>
	<div>
		<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['costs']==array()){?><a id='addCost-button'onclick='addCost(0)' class='btn'>Click to put in cost details</a>
		<?php }else{ ?><a id='addCost-button' onclick='addCost(<?php echo count($_smarty_tpl->tpl_vars['eventModel']->value['costs']);?>
)' class='btn' >Add more cost details</a>
		<?php }?>
	</div>
	<div>
		<label for="editEventForm-minimumAge" class='required'>Minimum Age</label>
		<select name="editEventForm[minimum_age]" id="editEventForm-minimumAge" data-validators="required">
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['minimum_age']=='None'){?>selected='selected'<?php }?> value="None" selected='selected'>None</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['minimum_age']=='18 and over'){?>selected='selected'<?php }?> value="18 and over">18 and over</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if ($_smarty_tpl->tpl_vars['eventModel']->value['minimum_age']=='21 and over'){?>selected='selected'<?php }?> value="21 and over">21 and over</option>
		</select>
	</div>
	<div id='webLinks-container'>
		<label for="editEventForm-webLinks">Websites</label>
		<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['web_links']){?>
			<?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(';',$_smarty_tpl->tpl_vars['eventModel']->value['web_links']), null, 0);?>
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
		<a class='btn positive' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="editEventForm-description">Description</label>
		<textarea id="editEventForm-description" type="text" name="editEventForm[description]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['description'];?>
" placeholder="Description"><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['description'];?>
</textarea>
	</div>
	<div>
		<label for="editEventForm-specialNotes">Special Notes</label>
		<textarea id="editEventForm-specialNotes" type="text" name="editEventForm[special_notes]" value="<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['special_notes'];?>
" placeholder="Special Notes" ><?php echo $_smarty_tpl->tpl_vars['eventModel']->value['special_notes'];?>
</textarea>
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
	<div><button class='new btn'>Save</button></div>
</form>
<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['id']&&$_smarty_tpl->tpl_vars['eventModel']->value['status']=='suspended'){?>
	<a class='btn negative' id='archiveEvent-button' href="/events/archive/<?php echo $_smarty_tpl->tpl_vars['eventModel']->value['id'];?>
">Click to remove your event from our site</a>
<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_editEventScript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>