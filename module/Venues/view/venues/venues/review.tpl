<h1>Please review the venue information below</h1>
<ul id='venueInformation-list'>
	<li>
		<label>Name of the Venue:</label><div>{$venueModel.name}</div>
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
	<li><label>Address:</label>
		<div id='address-wrapper'>
			{$venueModel.address_1}<br />
			{if $venueModel.address_2 != ''}{$venueModel.address_2}<br />{/if}
			{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}<br />
			{$venueModel.country}
		</div>
	</li>
	<li>
		<label>Venue Type:</label> {$venueModel.type}
	</li>
	<li>
		<label>Minimum Age:</label> {$venueModel.minimum_age}
	</li>
	{if $venueModel.description}
		<li>
			<label>Description:</label>
			<div>{$venueModel.description|nl2br}</div>
		</li>
	{/if}
	{if $venueModel.special_notes}
		<li>
			<label>Special Notes:</label>
			<div>{$venueModel.special_notes|nl2br}</div>
		</li>
	{/if}
</ul>
<div id='mapAndButton-wrapper'>
	<div><img src="{$url}" /></div>
	<div id='button-wrapper'>
		{if isset($venueModel.id)}
			<a class='new btn' href="{url 'venues/approve' ['venueId' => $venueModel.id]}">The venue information looks correct</a>
			<a id='editVenue-button' class='btn' href="{url 'venues/edit' ['venueId' => $venueModel.id]}">I need to change some details about the venue</a>
		{else}
			<a class='new btn' href="{url 'venues/approve'}">The venue information looks correct</a>
			<a id='editVenue-button' class='btn' href="{url 'venues/edit'}">I need to change some details about the venue</a>
		{/if}
	</div>
</div>
