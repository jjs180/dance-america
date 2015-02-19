<h1>Please review the person information below</h1>
<ul id='personInformation-list' class='personInformation-list'>
	{include './../partials/_personInformation.tpl'}
</ul>
<div id='mapAndButton-wrapper'>
	<div><img src='{$url}' /></div>
	<div id='button-wrapper'>
		{if $personModel.id && $personModel.status != 'suspended'}
			<a id='editVenue-button' class='btn' href="{url 'people/edit' ['personId' => $personModel.id]}">Go back</a>
			<a class='new btn' href="{url 'people/approve' ['personId' => $personModel.id]}">Continue</a>
		{elseif $personModel.status == 'suspended'}
			<a class='btn' href="{url 'people/edit' ['personId' => $personModel.id]}">Go back</a>
			<a class='btn negative' href="{url 'people/archive' ['personId' => $personModel.id]}">Remove</a>
			<a class='btn positive' href="{url 'people/renew' ['personId' => $personModel.id]}">Renew person</a>
		{else}
			<a class='new btn' href="{url 'people/approve'}">Continue</a>
			<a id='editVenue-button' class='btn' href="{url 'people/edit'}">Go back</a>
		{/if}
	</div>
</div>
