<style>
.indent-wrapper {
	position:relative;
	left:40px;
}
</style>
<h1>A new venue has been added</h1>
<div><label><strong>Name of the Venue:</strong></label> {$venueModel.name}</div>
{if $venueModel.web_links}
	<div>
		<label><strong>Websites:</strong></label>
		<div class='indent-wrapper'>
			{assign var= websites value=';'|explode:$venueModel.web_links}
			{foreach $websites website}
				{$website}<br/>
			{/foreach}
		</div>
	</div>
{/if}
<div>
	<label><strong>Address:</strong></label>
	<div class='indent-wrapper'>
		{$venueModel.address_1}<br />
		{if $venueModel.address_2 != ''}{$venueModel.address_2}<br />{/if}
		{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}<br />
		{$venueModel.country}
		
	</div>
</div>
<div><label><strong>Venue Type:</strong></label> {$venueModel.type}</div>
<div><label><strong>Minimum Age:</strong></label> {$venueModel.minimum_age}</div>
{if $venueModel.description}
	<div>
		<label><strong>Description:</strong></label>
		<div class='indent-wrapper'>{$venueModel.description}</div>
	</div>
{/if}
{if $venueModel.special_notes}
	<div>
		<label><strong>Special Notes:</strong></label>
		<div class='indent-wrapper'>{$venueModel.special_notes}</div>
	</div>
{/if}

<p>To approve this venue, click <a href="{$acceptVenueLink}" target='_blank'>HERE</a></p>
<div><strong>OR</strong></div>
<p>To reject this venue, click <a href="{$rejectVenueLink}" target='_blank'>HERE</a></p>