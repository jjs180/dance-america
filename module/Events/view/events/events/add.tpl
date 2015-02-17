<h1>Add a Dance Event</h1>
{if !isset($loggedInMember)}
	<p>Registration is not necessary, but it will allow you to edit the events you have added without having to contact the admin to make changes</p>
{/if}
{if !isset($eventModel.venue_id)}
	<a id='searchForVenue-button' class='btn positive' href="{url 'venues/search'}">Search for a venue</a>
{else}
	<a id='changeVenue-button' class='btn' href="{url 'venues/search'}">Click to change venue</a>
{/if}
<form id="addEventForm" class="NWForm" action="{url 'events/add'}" method="post">
	<div>
		<label for="addEventForm-venueId" class='required'>Event Location</label>
		{if isset($eventModel.venue_id)}
			<p>{$eventModel.venue.name}</p>
			<input id="addEventForm-venueId" type="hidden" name="addEventForm[venue_id]" value="{$eventModel.venue_id}"/>
		{/if}
	</div>
	<div>
		<label for="addEventForm-name">Name of the Event</label>
		<input id="addEventForm-name" type="text" name="addEventForm[name]" placeholder="Name" />
	</div>
	<div>
		<label class='required' for="addEventForm-venueId">Type</label>
		<select type="text" name="addEventForm[type]" data-validators="required">
			<option value="">--</option>
			{foreach $siteSearchParams as $param}
				<option value="{$param}">{$param}</option>
			{/foreach}
		</select>
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
			<!-- <div id='repetitionSpacing-wrapper-0' class='repetitionSpacing-wrapper'> -->
			<div id='repetitionSpacing-wrapper-0' class='hidden'>
				<span>The event will repeat every</span>
				<input id="addEventForm-repetitionSpacing-0" type="text" name="addEventForm[repetitions][0][repetition_spacing]" data-validators="required" />
				<span id='repetitionFactor-wrapper-0'>weeks on</span>&nbsp;
			</div>
			<div>
				<select class='daysOfMonth-selector hidden' name="addEventForm[repetitions][0][day_of_month]" id="daysOfMonth-select-0" onchange='changeDayOfMonth(0)'>
					{include './../partials/_days-of-month.tpl'}
				</select>
				<select class='daysOfWeek-selector  hidden' name="addEventForm[repetitions][0][day_of_week]" id="daysOfWeek-select-0" onchange='changeDayOfWeek(0)'>
					{include './../partials/_days-of-week.tpl'}	
				</select>
				<div id="monthsOfYear-wrapper-0" class='hidden'>
					in <select name="addEventForm[repetitions][0][month_of_year]" id="monthsOfYear-select-0" onchange='changeMonthOfYear(0)'>
						{include './../partials/_months-of-year.tpl'}	
					</select>
				</div>
				<a onclick="deleteRepetition(0)" id='deleteRepetitionButton-0' class='btn negative deleteRepetitionButton'>-</a>
			</div>
		</div>
		<a id='addRepetitionButton-0' class='addRepetitionButton btn positive'>+</a>
	</div>
	<div class='hidden'>
		<label for="addEventForm-willStop" class='required'>When will the event stop repeating?</label>
		<select name="addEventForm[will_stop]" id="addEventForm-willStop" data-validators='required'>
			<option value="0">Never</option>
			<option value="1">On date</option>
		</select>
	</div>
	<div class='hidden'>
		<label for="addEventForm-endDate" class='required'>End Date</label>
		<input type='datetime' class='NWDatePicker' id="addEventForm-endDate" name="addEventForm[end_date]" data-nwDatePicker-options="{ format:'%Y-%m-%d', startView:'years' }" data-validators='required'/>
	</div>
	<div class='hidden'>
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
		<input id="addEventForm-specialNotes" type="hidden" name="addEventForm[special_notes]" placeholder="Special Notes" value=""/>
	</div>
	<div>
		<label for="addEventForm-contactEmail">Your Email</label>
		<input id="addEventForm-contactEmail" type="email" name="addEventForm[contact_email]" placeholder="Email" data-validators="validate-email" {if $loggedInMember}value="{$loggedInMember.email}"{/if} />
		<div>If you leave this blank and we have questions about your event, it will not be approved</div>
	</div>

	<div><button class='new btn'>Add Event</button></div>
</form>
{include './../partials/_addEventScript.tpl'}