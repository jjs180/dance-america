<h1>Please review the event information below</h1>
<ul class='eventInformation-list'>
	{include './../partials/_eventInformation.tpl'}

</ul>
<div id='mapAndButton-wrapper'>
	<div><img src='{$url}' /></div>
	<div id='button-wrapper'>
		{if $eventModel.id && $eventModel.status != 'suspended'}
			<a class='btn negative' href="{url 'events/edit' ['eventId' => $eventModel.id]}">Go back</a>
			<a class='new btn' href="{url 'events/approve' ['eventId' => $eventModel.id]}">Continue</a>
		{elseif $eventModel.status == 'suspended'}
			<a class='btn' href="{url 'events/edit' ['eventId' => $eventModel.id]}">Go back</a>
			<a class='btn negative' href="{url 'events/archive' ['eventId' => $eventModel.id]}">Remove event from site</a>
			<a class='btn positive' href="{url 'events/renew' ['eventId' => $eventModel.id]}">Renew event</a>
		{else}
			<a class='btn' href="{url 'events/edit'}">Go back</a>
			<a class='new btn' href="{url 'events/approve'}">Continue</a>
		{/if}
	</div>
</div>
