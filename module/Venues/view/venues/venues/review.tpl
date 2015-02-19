<h1>Please review the venue information below</h1>
<ul class='venueInformation-list'>
	<li>
		<label>Name of the Venue:</label><div>{$venueModel.name}</div>
	</li>
	<li><label>Address:</label>
		<div id='address-wrapper'>
			{$venueModel.address_1}<br />
			{if $venueModel.address_2 != ''}{$venueModel.address_2}<br />{/if}
			{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}<br />
			<!-- {$venueModel.country} -->
		</div>
	</li>
	{if $venueModel.web_links}
		<li>
			<label>Websites:</label>
			{assign var= websites value=';'|explode:$venueModel.web_links}
			<ul>
				{foreach $websites website}
					<li>{$website}</li>
				{/foreach}
			</ul>
		</li>
	{/if}
	{if $venueModel.description}
		<li>
			<label>Description:</label>
			<div>{$venueModel.description|nl2br}</div>
		</li>
	{/if}
</ul>
<div id='mapAndButton-wrapper'>
	<div><img src="{$url}" /></div>
	<div id='button-wrapper'>
		{if isset($venueModel.id)}
			<a class='btn negative' href="{url 'venues/edit' ['venueId' => $venueModel.id]}">Edit</a>
			<a class='new btn' href="{url 'venues/approve' ['venueId' => $venueModel.id]}">Continue</a>
		{else}
			<a class='btn negative' href="{url 'venues/edit'}">Edit</a>
			<a class='new btn' href="{url 'venues/approve'}">Continue</a>
		{/if}
	</div>
</div>
