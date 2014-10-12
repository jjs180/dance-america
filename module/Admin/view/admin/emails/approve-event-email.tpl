<h1>A new event has been added</h1>
{if $eventModel.name}
	<div><label><strong>Name of the Event:</strong></label>{$eventModel.name}</div>
{/if}
<div><label><strong>Venue:</strong></label>{$eventModel.venue.name}</div>
{if $eventModel.web_links}
	<label><strong>Websites:</strong></label>
	<ul>
		{assign var= websites value=';'|explode:$eventModel.web_links}
		{foreach $websites website}
			<li>{$website}</li>
		{/foreach}
	</ul>
{/if}
{if $eventModel.repetitions != []}
	<label><strong>Repetition Details:</strong></label> This event will repeat every
	{foreach $eventModel.repetitions repetition}
		{if $repetition.repetition_parameter == 'weeks'}<br/>&nbsp;&nbsp;-&nbsp;{$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on {$repetition.day_of_week}s
		{elseif $repetition.repetition_parameter == 'months' || $repetition.repetition_parameter == 'years'}<br/>&nbsp;&nbsp;-&nbsp;{$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on the {$repetition.day_of_month}{if substr($repetition.day_of_month, -1) == '2'}nd{elseif substr($repetition.day_of_month, -1) == '3'}rd {elseif $repetition.day_of_month != 'last'}st{/if} {$repetition.day_of_week}{if $repetition.month_of_year} in&nbsp;{$repetition.month_of_year}{/if}
		{else}&nbsp;day of the week
		{/if}
	{/foreach}
{else}<div><label><strong>One Time Event:</strong></label> {$eventModel.start_date|date_format} - {$eventModel.end_date|date_format}</div>
{/if}
<div><label><strong>Time:</strong></label> {$eventModel.start_time|date_format: '%I:%M %p'} - {$eventModel.end_time|date_format: '%I:%M %p'}</div>
{if $eventModel.costs != []}
	<label><strong>Cost:</strong></label>
	{foreach $eventModel.costs cost}
		-{$cost.person_type} pay ${$cost.amount}
	{/foreach}
{/if}
<div><label><strong>Minimum Age:</strong></label> {$eventModel.minimum_age}</div>
{if $eventModel.description}<label><strong>Description:</strong></label> {$eventModel.description|nl2br}{/if}
{if $eventModel.special_notes}<label><strong>Special Notes:</strong></label> {$eventModel.special_notes|nl2br}{/if}

<p>To approve this event, click <a href="{$acceptEventLink}" target='_blank'>HERE</a></p>
<div><strong>OR</strong></div>
<p>To reject this event, click <a href="{$rejectEventLink}" target='_blank'>HERE</a></p>