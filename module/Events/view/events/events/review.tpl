<h1>Please review the event information below</h1>
<ul class='eventInformation-list'>
	{include './../partials/_eventInformation.tpl'}

</ul>
<div id='mapAndButton-wrapper'>
	<div><img src='{$url}' /></div>
	<div id='button-wrapper'>
		{if $eventModel.id && $eventModel.status != 'suspended'}
			<a class='new btn' href="{url 'events/approve' ['eventId' => $eventModel.id]}">The information looks correct</a>
			<a id='editVenue-button' class='btn' href="{url 'events/edit' ['eventId' => $eventModel.id]}">I need to change some of the information</a>
		{elseif $eventModel.status == 'suspended'}
			<a class='btn positive' href="{url 'events/renew' ['eventId' => $eventModel.id]}x<strong></strong>">Renew event</a>
			<a class='btn' href="{url 'events/edit' ['eventId' => $eventModel.id]}">I need to change some of the information</a>
			<a class='btn negative' href="{url 'events/archive' ['eventId' => $eventModel.id]}">Remove event from site</a>
		{else}
			<a class='new btn' href="{url 'events/approve'}">The information looks correct</a>
			<a id='editVenue-button' class='btn' href="{url 'events/edit'}">I need to change some of the information</a>
		{/if}
	</div>
</div>
