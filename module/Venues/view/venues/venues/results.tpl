{if $venueModelsArray}
	<div id='resultsHeader-wrapper'>
		<h1>Results for {$searchCriteria}: {$searchPhrase}</h1>
		<a class='btn neutral' href="{url 'venues/search'}">Change search criteria</a>
		<a class='btn' id='addNewVenue-button' href="{url 'venues/add'}">Add your own venue to the site</a>
	</div>
	<div id='resultsList-wrapper'>
		<ul>
			{$count = 0}
			{foreach $venueModelsArray venueModel}
				<li>
					<div>
						<img onclick="displayInfoWindow({$count})" src="https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld={$count+1}|55D7D7|000000">
						<h2>{$venueModel.name}</h2>
					</div>
					<div class='description-container'>
						{$venueModel.address_1}<br />
						{if $venueModel.address_2}{$venueModel.address_2}<br />{/if}
						{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}
						{if $venueModel.description}
							<div>Description: {$venueModel.description}</div>
						{/if}
						{if $venueModel.special_notes}
							<div>Special Notes: {$venueModel.special_notes}</div>
						{/if}
					</div>
					<a class='btn positive' href="{url 'events/add' ['venueId' => $venueModel.id]}">This is the venue!</a>
				</li>
			{$count = $count+1}
			{/foreach}
		</ul>
	</div>
	<div id='resultsMap-wrapper'>
		<div id="map"></div>
	</div>
	{include './partials/_resultsScript.tpl'}
{else}
	<p>Sorry, but it appears that we could not find anything matching your criteria. Your options are to:</p>
	<a class='btn positive' href="{url 'venues/add'}">Add a new venue</a>
	<a class='btn positive' href="{url 'venues/search'}">Change search criteria</a>
{/if}
