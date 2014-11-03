{if $personModel.name}
	<li>
		<label>Name of the Event:</label><div>{$personModel.name}</div>
	</li>
{/if}
<li>
	<label>Venue:</label>
	<div>{$personModel.venue.name}</div>
</li>
{if $personModel.web_links}
	<li>
		<label>Websites:</label>
		<ul>
			{assign var= websites value=';'|explode:$personModel.web_links}
			{foreach $websites website}
				<li>{$website}</li>
			{/foreach}
		</ul>
	</li>
{/if}
<li>
	{if $personModel.repetitions != []}
		<label>Repetition Details:</label>
		<ul>
			This person will repeat every
			{foreach $personModel.repetitions repetition}
				{if $repetition.repetition_parameter == 'weeks'}<li>&nbsp;&nbsp;- {$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on {$repetition.day_of_week}s</li>
				{elseif $repetition.repetition_parameter == 'months' || $repetition.repetition_parameter == 'years'}<li>&nbsp;&nbsp;- {$repetition.repetition_spacing}&nbsp;{$repetition.repetition_parameter} on the {$repetition.day_of_month}{if $repetition.day_of_month == '1'}st{elseif substr($repetition.day_of_month, -1) == '2'}nd{elseif substr($repetition.day_of_month, -1) == '3'}rd {elseif $repetition.day_of_month != 'last'}th{/if} {$repetition.day_of_week}{if $repetition.month_of_year} in&nbsp;{if $repetition.month_of_year=='1'}January{elseif $repetition.month_of_year== '2'}February{elseif $repetition.month_of_year== '3'}March{elseif $repetition.month_of_year== '4'}April{elseif $repetition.month_of_year== '5'}May{elseif $repetition.month_of_year== '6'}June{elseif $repetition.month_of_year== '7'}July{elseif $repetition.month_of_year== '8'}August{elseif $repetition.month_of_year== '9'}September{elseif $repetition.month_of_year== '10'}October{elseif $repetition.month_of_year== '11'}November{else}December{/if}{/if}</li>
				{else}day of the week</li>
				{/if}
			{/foreach}
		</ul>
	{else}
		<label>One Time Event:</label>
		<div>{$personModel.start_date|date_format} - {$personModel.end_date|date_format}</div>
	{/if}
<li>
	<label>Time:</label> {$personModel.start_time|date_format: '%I:%M %p'} - {$personModel.end_time|date_format: '%I:%M %p'}
</li>
{if $personModel.costs != []}
	<li>
		<label>Cost:</label>
		<ul>
			{foreach $personModel.costs cost}
				<li>{$cost.person_type} pay ${$cost.amount}</li>
			{/foreach}
		</ul>
	</li>
{/if}
<li>
	<label>Minimum Age:</label> {$personModel.minimum_age}
</li>
{if $personModel.description}
	<li>
		<label>Description:</label>
		<div>{$personModel.description|nl2br}</div>
	</li>
{/if}
{if $personModel.special_notes}
	<li>
		<label>Special Notes:</label>
		<div>{$personModel.special_notes|nl2br}</div>
	</li>
{/if}