<h1>Manage Events</h1>
{if $eventModelsArray}
<table border="1" id='eventInfoTable'>
	<thead>
		<tr>
			<th>Location</th>
			<th>Event Time</th>
			<th>Date Details</th>
			<th>Submitter Contact Info</th>
			<th>Extended Details</th>
			<th>Event Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		{foreach $eventModelsArray eventModel}
			<tr>
				<td>{$eventModel.venue.name}</td>
				<td>{$eventModel.start_time|date_format: '%I:%M %p'} - {$eventModel.end_time|date_format: '%I:%M %p'}</td>
				<td>
					{if $eventModel.repetitions != []}
						<div class='dropdown'>
							<a>Repetition Details</a>
							<div>
								{if $eventModel.will_stop !== '0'}This will be a repeating event, repeating from {$eventModel.start_date|date_format:"%D"} to {$eventModel.end_date|date_format:"%D"} every
								{else}This will be a repeating event, repeating every
								{/if}
								<ul>
									{foreach $eventModel.repetitions repetition}
										{if $repetition.repetition_parameter == 'weeks'}<li>&nbsp;&nbsp;- {$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on {$repetition.day_of_week}s</li>
										{elseif $repetition.repetition_parameter == 'months' || $repetition.repetition_parameter == 'years'}<li>&nbsp;&nbsp;- {$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on the {$repetition.day_of_month}{if $repetition.day_of_month == '1'}st{elseif substr($repetition.day_of_month, -1) == '2'}nd{elseif substr($repetition.day_of_month, -1) == '3'}rd {elseif $repetition.day_of_month != 'last'}th{/if} {$repetition.day_of_week}{if $repetition.month_of_year} in&nbsp;{if $repetition.month_of_year=='1'}January{elseif $repetition.month_of_year== '2'}February{elseif $repetition.month_of_year== '3'}March{elseif $repetition.month_of_year== '4'}April{elseif $repetition.month_of_year== '5'}May{elseif $repetition.month_of_year== '6'}June{elseif $repetition.month_of_year== '7'}July{elseif $repetition.month_of_year== '8'}August{elseif $repetition.month_of_year== '9'}September{elseif $repetition.month_of_year== '10'}October{elseif $repetition.month_of_year== '11'}November{else}December{/if}{/if}</li>
										{else}day of the week</li>
										{/if}
									{/foreach}
								</ul>
							</div>
						</div>
					{else}
						{$eventModel.start_date|date_format:"%D"} - {$eventModel.end_date|date_format:"%D"}
					{/if}
				</td>
				<td>
					{if $eventModel.contact_email}{$eventModel.contact_email}
					{else}None listed
					{/if}
				</td>
				<td>
					<div class='dropdown'>
						<a></a>
						<ul>
							<li><span>Minimum Age:</span> {$eventModel.minimum_age}</li>
							{if $eventModel.description}<li><span>Description: </span><div>{$eventModel.description|nl2br}</div></li>{/if}
							{if $eventModel.special_notes}<li><span>Special Notes: </span><div>{$eventModel.special_notes|nl2br}</div></li>{/if}
							{if $eventModel.costs != []}
								<li><span>Costs:</span><br />
									<ul>
										{foreach $eventModel.costs cost}
											<li>-&nbsp;{$cost.person_type} pay ${$cost.amount}</li>
										{/foreach}
									</ul>
								</li>
							{/if}
						</ul>
					</div>
				</td>
				<td>
					{if ($eventModel.status == 'pending approval')}
						<div class='dropdown approvalDropdown'><a>You must approve this event</a>
							<ul>
								<li><a href="{url 'manage-events/approve' ['eventId' => $eventModel.id]}">Approve event</a></li>
								<li><a href="{url 'manage-events/reject' ['eventId' => $eventModel.id]}">Reject event</a></li>
							</ul>
						</div>
					{elseif $eventModel.status == 'approved'}Event approved
					{else}Submission in progress
					{/if}
				</td>
				<td><a href="{url 'events/edit' [eventId => $eventModel.id]}"><i class='icon-edit'></i></a></td>
			</tr>
		{/foreach}
	</tbody>
</table>
{else}<p>There are currently no events listed on the site.</p>
{/if}