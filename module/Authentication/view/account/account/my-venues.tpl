{if !empty($venueModelsArray)}
<h1>Venues You Have Listed</h1>
	<table border="1" id='myVenues-table'>
		<thead>
			<tr>
				<th>Name</th>
				<th>Websites</th>
				<th>Address</th>
				<th>Venue Type</th>
				<th>Extended Details</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			{foreach $venueModelsArray venueModel}
				<tr>
					<td>{$venueModel.name}</td>
					<td>{if $venueModel.web_links}
							{assign var= websites value=';'|explode:$venueModel.web_links}
							{foreach $websites website}
								{$website}<br/>
							{/foreach}
						{else}None listed
						{/if}
					</td>
					<td>
						{$venueModel.address_1}<br />
						{if $venueModel.address_2 != ''}{$venueModel.address_2}<br />{/if}
						{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}
					</td>
					<td>{$venueModel.type}</td>
					<td>
						{if $venueModel.description || $venueModel.special_notes}
							<div class='dropdown'>
								<a></a>
								<ul>
									{if $venueModel.description}<li><span>Description:</span><div>{$venueModel.description|nl2br}</div></li>{/if}
									{if $venueModel.special_notes}<li><span>Special Notes:</span><div>{$venueModel.special_notes|nl2br}</div></li>{/if}
								</ul>
							</div>
						{else}None Listed
						{/if}
					</td>
					<td>{$venueModel.status}</td>
					<td class='editting-cell'><a class='icon-edit' href="{url 'venues/edit' ['venueId' => $venueModel.id]}"><i ></i></a></td>
				</tr>
			{/foreach}
		</tbody>
	</table>
{else}<h1>You have not listed any venues on our site</h1>
{/if}