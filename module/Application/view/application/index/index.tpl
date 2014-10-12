<div id='displayAdjustment-container'>
	<button class='new' id='eventVenues-toggle'>Show Venues</button>
	<button class='neutral' id='list-toggle'>Show List</button>
	<button class='neutral' id='map-toggle'>Hide Map</button>
</div>
<div id='eventsVenues-list'>
	<div id='venuesList-container'>
		<h1>Venues List</h1>
		{if $venueModelsArray}
			{$count = 0}
			{foreach $venueModelsArray venueModel}
				<div>
					<img onclick="displayInfoWindow({$count})" src="https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld={$count+1}|55D7D7|000000">
					<ul class='venueInformation-list'>
						<li>
							<label>Name of the Venue:</label>
							<div>{$venueModel.name}</div>
						</li>
						<li>
							<label>Websites:</label>
							{if $venueModel.web_links}
								{assign var= websites value=';'|explode:$venueModel.web_links}
								<ul>
									{foreach $websites website}
										<li>{$website}</li>
									{/foreach}
								</ul>
							{else}<div>None listed</li>
							{/if}
						</li>
						<li><label>Address:</label>
							<div class='address-wrapper'>
								{$venueModel.address_1}<br />
								{if $venueModel.address_2 !=''}{$venueModel.address_2}<br />{/if}
								{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}<br />
								{$venueModel.country}
							</div>
						</li>
						<li>
							<label>Venue Type:</label>
							<div>{$venueModel.type}</div>
						</li>
						<li>
							<label>Minimum Age:</label>
							<div>{$venueModel.minimum_age}</div>
						</li>
						{if $venueModel.description}
							<li>
								<label>Description:</label>
								<div class='longText-wrapper'>{$venueModel.description|nl2br}</div>
							</li>
						{/if}
						{if $venueModel.special_notes}
							<li>
								<label>Special Notes:</label>
								<div class='longText-wrapper'>{$venueModel.special_notes|nl2br}</div>
							</li>
						{/if}
						<li>
							<label>Status:</label>
							<div>{$venueModel.status}</div>
						</li>
					</ul>
				</div>
				{$count=$count+1}
			{/foreach}
		{else}<p>No venues currently listed</p>
		{/if}
	</div>
	<div id='eventsList-container'>
		<h1>Events List</h1>
		{if $eventModelsArray}
			{$count=0}
			{foreach $eventModelsArray eventModel}
				<div>
					<img onclick="displayInfoWindow({$count})" src="https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld={$count+1}|FC6355|000000">
					<ul class='eventInformation-list'>
						{include './../../../../Events/view/events/partials/_eventInformation.tpl'}
					</ul>
				</div>
			{$count=$count+1}
			{/foreach}
		{else}<p>None listed</p>
		{/if}
	</div>
</div>
{include './../partials/_indexScript.tpl'}
<div id='map-wrapper'>
	<div id="map"></div>
</div>
