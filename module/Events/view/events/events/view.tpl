{if $eventModel.name}
	<h1>{$eventModel->name}</h1>
{else}
	<h1>Your Event</h1>
{/if}
<ul class='eventInformation-list list-unstyled'>
	{include './../partials/_eventInformation.tpl'}

</ul>
<div id='mapAndButton-wrapper'>
	<div><img src='{$url}' /></div>
</div>
