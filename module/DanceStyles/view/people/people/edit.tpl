<h1>Edit your person</h1>
<a id='changeVenue-button' class='btn positive' href="{url 'venues/search' [personId => $personModel.id]}">Click to change venue</a>
<form id="editPersonForm" class="NWForm" action="{url 'people/edit' [personId => $personModel.id]}" method="post">
	<div>
		<label for="editPersonForm-venueId" class='required'>Event Location:</label>
		{if isset($personModel.venue_id)}
			<p>{$personModel.venue.name}</p>
			<input id="editPersonForm-venueId" type="hidden" name="editPersonForm[venue_id]" value="{$personModel.venue_id}" data-validators="required" />
		{/if}
	</div>
	<div>
		<label for="editPersonForm-name">Name of the Event (eg: Wednesday Night Swing)</label>
		<input id="editPersonForm-name" type="text" name="editPersonForm[name]" placeholder="Name" value="{$personModel.name}"/>
	</div>
	<div>
		<label for="editPersonForm-startDate" class='required'>Starting Date</label>
		<input id="editPersonForm-startDate" type='datetime' class='NWDatePicker' name="editPersonForm[start_date]" value="{$personModel.start_date}" data-nwDatePicker-options="{ format:'%Y-%m-%d', startView:'years' }"  data-validators='required'/>
	</div>
	<div>
		<label for="editPersonForm-startTime" class='required'>Start Time</label>
		<input id="editPersonForm-startTime" type="time" name="editPersonForm[start_time]" value="{$personModel.start_time}" data-validators='required' />
	</div>
	<div>
		<label for="editPersonForm-endTime" class='required'>End Time</label>
		<input id="editPersonForm-endTime" type="time" name="editPersonForm[end_time]" value="{$personModel.end_time}" data-validators='required' />
	</div>
	<div id='repetitionDetails-container'>
		<label for="editPersonForm-repetitionParameter" class='required'>How often will the person repeat?</label>
		{$index=0}
		{if $personModel.repetitions != []}
			{foreach $personModel.repetitions repetition}
				{include './../partials/_edit-person-repetition-detail.tpl'}
				{$index=$index+1}
			{/foreach}
		{else}
			{include './../partials/_edit-person-repetition-detail-no-existing-repetitions.tpl'}
		{/if}
		{if $personModel.repetitions}<a id="addRepetitionButton-{count($personModel.repetitions)-1}" class='addRepetitionButton btn positive'style='display:block;'>+</a>
		{else}<a id="addRepetitionButton-0" class='addRepetitionButton btn positive'>+</a>
		{/if}
	</div>
	<div id='personWillStop-wrapper'>
		<label for="editPersonForm-willStop" class='required'>When will the person stop repeating?</label>
		<select name="editPersonForm[will_stop]" id="editPersonForm-willStop" data-validators='required'>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="0" {if $personModel.will_stop === '0'}selected='selected'{/if}>Never</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="1" {if $personModel.will_stop === '1'}selected='selected'{/if}>On date</option>
		</select>
	</div>
	<div id='personEndDate-wrapper'>
		<label for="editPersonForm-endDate" class='required'>End Date</label>
		<input type='datetime' class='NWDatePicker' id="editPersonForm-endDate" name="editPersonForm[end_date]" value="{$personModel.end_date}" data-nwDatePicker-options="{ format:'%Y-%m-%d', startView:'years' }" data-validators='required'/>
	</div>
	<div class='hidden' {if $personModel.costs != []}style='display: block;'{/if}>
		<label for="editPersonForm-cost">Cost of Event</label>
		<div id='costDetails-rhsWrapper'>
			{if $personModel.costs != []}
				{$index = 0}
				{foreach $personModel.costs cost}
					<div>
						<input type="text" name="editPersonForm[costs][{$index}][person_type]" class='person-type' placeholder='Type (eg members, non-members, etc)' value="{$cost.person_type}" /> pay $ <input type="text" name="editPersonForm[costs][{$index}][amount]" placeholder='Amount (USD)' value="{$cost.amount}" data-validators='validate-numeric' />
						<input type="hidden" name="editPersonForm[costs][{$index}][id]" value="{$cost.id}" />
					</div>
					{$index=$index+1}
				{/foreach}
			{/if}
		</div>
	</div>
	<div>
		{if $personModel.costs == []}<a id='addCost-button'onclick='addCost(0)' class='btn'>Click to put in cost details</a>
		{else}<a id='addCost-button' onclick='addCost({count($personModel.costs)})' class='btn' >Add more cost details</a>
		{/if}
	</div>
	<div>
		<label for="editPersonForm-minimumAge" class='required'>Minimum Age</label>
		<select name="editPersonForm[minimum_age]" id="editPersonForm-minimumAge" data-validators="required">
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} {if $personModel.minimum_age == 'None'}selected='selected'{/if} value="None" selected='selected'>None</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} {if $personModel.minimum_age == '18 and over'}selected='selected'{/if} value="18 and over">18 and over</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} {if $personModel.minimum_age == '21 and over'}selected='selected'{/if} value="21 and over">21 and over</option>
		</select>
	</div>
	<div id='webLinks-container'>
		<label for="editPersonForm-webLinks">Websites</label>
		{if $personModel.web_links}
			{assign var= websites value=';'|explode:$personModel.web_links}
			{foreach $websites website}
				<div class='webLink-wrapper'>
					<div>
						<label>Url</label>
						<input type="url" placeholder="Url" name='editPersonForm[url][]' data-validators='validate-url' value="{$website}"/>
					</div>
				</div>
			{/foreach}
		{else}
			<div class='webLink-wrapper'>
				<div>
					<label>Url</label>
					<input type="url" placeholder="Url" name='editPersonForm[url][]' data-validators='validate-url' />
				</div>
			</div>
		{/if}
	</div>
	<div>
		<a class='btn positive' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="editPersonForm-description">Description</label>
		<textarea id="editPersonForm-description" type="text" name="editPersonForm[description]" value="{$personModel.description}" placeholder="Description">{$personModel.description}</textarea>
	</div>
	<div>
		<label for="editPersonForm-contactEmail">Your Email</label>
		<div>
			<input id="editPersonForm-contactEmail" type="email" name="editPersonForm[contact_email]" placeholder="Email" data-validators="validate-email" {if $personModel.contact_email}value="{$personModel.contact_email}"{else} value="{InMember.email}"{/if} />
		</div>
		<div>If you leave this blank and we have questions about your person, it will not be approved</div>
	</div>
	<div><button class='new btn'>Save</button></div>
</form>
{if $personModel.id && $personModel.status == 'suspended'}
	<a class='btn negative' id='archiveEvent-button' href="/people/archive/{$personModel.id}">Click to remove your person from our site</a>
{/if}

{include './../partials/_editPersonScript.tpl'}