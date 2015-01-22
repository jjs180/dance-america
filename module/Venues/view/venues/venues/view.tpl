<h1>{$venueModel.name}</h1>
<ul id='venueInformation-list'>
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
	{if $venueModel.special_notes}
		<li>
			<label>Special Notes:</label>
			<div>{$venueModel.special_notes|nl2br}</div>
		</li>
	{/if}
</ul>
<div id='mapAndButton-wrapper'>
	<div><img src="{$url}" /></div>
</div>
