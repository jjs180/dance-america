<h1>Edit your event</h1>
<a id='changeVenue-button' class='btn positive' href="{url 'venues/search' [eventId => $eventModel.id]}">Click to change venue</a>
<form id="editEventForm" class="NWForm" action="{url 'events/edit' [eventId => $eventModel.id]}" method="post">
	<div>
		<label for="editEventForm-venueId" class='required'>Event Location:</label>
		{if isset($eventModel.venue_id)}
			<p>{$eventModel.venue.name}</p>
			<input id="editEventForm-venueId" type="hidden" name="editEventForm[venue_id]" value="{$eventModel.venue_id}" data-validators="required" />
		{/if}
	</div>
	<div>
		<label for="editEventForm-name">Name of the Event (eg: Wednesday Night Swing)</label>
		<input id="editEventForm-name" type="text" name="editEventForm[name]" placeholder="Name" value="{$eventModel.name}"/>
	</div>
	<div>
		<label for="editEventForm-startDate" class='required'>Starting Date</label>
		<input id="editEventForm-startDate" type='datetime' class='NWDatePicker' name="editEventForm[start_date]" value="{$eventModel.start_date}" data-nwDatePicker-options="{ format:'%Y-%m-%d', startView:'years' }"  data-validators='required'/>
	</div>
	<div>
		<label for="editEventForm-startTime" class='required'>Start Time</label>
		<input id="editEventForm-startTime" type="time" name="editEventForm[start_time]" value="{$eventModel.start_time}" data-validators='required' />
	</div>
	<div>
		<label for="editEventForm-endTime" class='required'>End Time</label>
		<input id="editEventForm-endTime" type="time" name="editEventForm[end_time]" value="{$eventModel.end_time}" data-validators='required' />
	</div>
	<div id='repetitionDetails-container'>
		<label for="editEventForm-repetitionParameter" class='required'>How often will the event repeat?</label>
		{$index=0}
		{if $eventModel.repetitions != []}
			{foreach $eventModel.repetitions repetition}
				{include './../partials/_edit-event-repetition-detail.tpl'}
				{$index=$index+1}
			{/foreach}
		{else}
			{include './../partials/_edit-event-repetition-detail-no-existing-repetitions.tpl'}
		{/if}
		{if $eventModel.repetitions}<a id="addRepetitionButton-{count($eventModel.repetitions)-1}" class='addRepetitionButton btn positive'style='display:block;'>+</a>
		{else}<a id="addRepetitionButton-0" class='addRepetitionButton btn positive'>+</a>
		{/if}
	</div>
	<div class='hidden'>
		<label for="editEventForm-willStop" class='required'>When will the event stop repeating?</label>
		<select name="editEventForm[will_stop]" id="editEventForm-willStop" data-validators='required'>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="0" {if $eventModel.will_stop === '0'}selected='selected'{/if}>Never</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="1" {if $eventModel.will_stop === '1'}selected='selected'{/if}>On date</option>
		</select>
	</div>
	<div class='hidden'>
		<label for="editEventForm-endDate" class='required'>End Date</label>
		<input type='datetime' class='NWDatePicker' id="editEventForm-endDate" name="editEventForm[end_date]" value="{$eventModel.end_date}" data-nwDatePicker-options="{ format:'%Y-%m-%d', startView:'years' }" data-validators='required'/>
	</div>
	<div class='hidden' {if $eventModel.costs != []}style='display: block;'{/if}>
		<label for="editEventForm-cost">Cost of Event</label>
		<div id='costDetails-rhsWrapper'>
			{if $eventModel.costs != []}
				{$index = 0}
				{foreach $eventModel.costs cost}
					<div>
						<input type="text" name="editEventForm[costs][{$index}][person_type]" class='person-type' placeholder='Type (eg members, non-members, etc)' value="{$cost.person_type}" /> pay $ <input type="text" name="editEventForm[costs][{$index}][amount]" placeholder='Amount (USD)' value="{$cost.amount}" data-validators='validate-numeric' />
						<input type="hidden" name="editEventForm[costs][{$index}][id]" value="{$cost.id}" />
					</div>
					{$index=$index+1}
				{/foreach}
			{/if}
		</div>
	</div>
	<div>
		{if $eventModel.costs == []}<a id='addCost-button'onclick='addCost(0)' class='btn'>Click to put in cost details</a>
		{else}<a id='addCost-button' onclick='addCost({count($eventModel.costs)})' class='btn' >Add more cost details</a>
		{/if}
	</div>
	<div>
		<label for="editEventForm-minimumAge" class='required'>Minimum Age</label>
		<select name="editEventForm[minimum_age]" id="editEventForm-minimumAge" data-validators="required">
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} {if $eventModel.minimum_age == 'None'}selected='selected'{/if} value="None" selected='selected'>None</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} {if $eventModel.minimum_age == '18 and over'}selected='selected'{/if} value="18 and over">18 and over</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} {if $eventModel.minimum_age == '21 and over'}selected='selected'{/if} value="21 and over">21 and over</option>
		</select>
	</div>
	<div id='webLinks-container'>
		<label for="editEventForm-webLinks">Websites</label>
		{if $eventModel.web_links}
			{assign var= websites value=';'|explode:$eventModel.web_links}
			{foreach $websites website}
				<div class='webLink-wrapper'>
					<div>
						<label>Url</label>
						<input type="url" placeholder="Url" name='editEventForm[url][]' data-validators='validate-url' value="{$website}"/>
					</div>
				</div>
			{/foreach}
		{else}
			<div class='webLink-wrapper'>
				<div>
					<label>Url</label>
					<input type="url" placeholder="Url" name='editEventForm[url][]' data-validators='validate-url' />
				</div>
			</div>
		{/if}
	</div>
	<div>
		<a class='btn positive' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="editEventForm-description">Description</label>
		<textarea id="editEventForm-description" type="text" name="editEventForm[description]" value="{$eventModel.description}" placeholder="Description">{$eventModel.description}</textarea>
	</div>
	<div>
		<label for="editEventForm-contactEmail">Your Email</label>
		<div>
			<input id="editEventForm-contactEmail" type="email" name="editEventForm[contact_email]" placeholder="Email" data-validators="validate-email" {if $eventModel.contact_email}value="{$eventModel.contact_email}"{else} value="{$loggedInMember.email}"{/if} />
		</div>
		<div>If you leave this blank and we have questions about your event, it will not be approved</div>
	</div>
	<div><button class='new btn'>Save</button></div>
</form>
{if $eventModel.id && $eventModel.status == 'suspended'}
	<a class='btn negative' id='archiveEvent-button' href="/events/archive/{$eventModel.id}">Click to remove your event from our site</a>
{/if}

{include './../partials/_editEventScript.tpl'}