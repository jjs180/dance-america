<h1>Please review the person information below</h1>
<ul id='personInformation-list' class='personInformation-list'>
	{include './../partials/_personInformation.tpl'}
</ul>
<div id='mapAndButton-wrapper'>
	<div><img src='{$url}' /></div>
	<div id='button-wrapper'>
		{if $personModel.id && $personModel.status != 'suspended'}
			<a class='new btn' href="{url 'people/approve' ['personId' => $personModel.id]}">The information looks correct</a>
			<a id='editVenue-button' class='btn' href="{url 'people/edit' ['personId' => $personModel.id]}">I need to change some of the information</a>
		{elseif $personModel.status == 'suspended'}
			<a class='btn positive' href="{url 'people/renew' ['personId' => $personModel.id]}">Renew person</a>
			<a class='btn' href="{url 'people/edit' ['personId' => $personModel.id]}">I need to change some of the information</a>
			<a class='btn negative' href="{url 'people/archive' ['personId' => $personModel.id]}">Remove person from site</a>
		{else}
			<a class='new btn' href="{url 'people/approve'}">The information looks correct</a>
			<a id='editVenue-button' class='btn' href="{url 'people/edit'}">I need to change some of the information</a>
		{/if}
	</div>
</div>
