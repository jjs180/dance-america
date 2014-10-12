<h1>Manage Venues</h1>
{if $venueModelsArray}
<table border="1" id='venueInfoTable'>
	<thead>
		<tr>
			<th>Venue Name</th>
			<th>Submitter Contact Info</th>
			<th>Venue Type</th>
			<th>Venue Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		{foreach $venueModelsArray venueModel}
			<tr>
				<td>
					<div class='dropdown'>
						<a>{$venueModel.name}</a>
						<ul>
							{if $venueModel.web_links}
								<li><span>Websites:</span>
									{assign var= websites value=";"|explode:$venueModel.web_links}
									<ul>
										{foreach $websites website}
											<li>{$website}</li>
										{/foreach}
									</ul>
								</li>
							{/if}
							<li><span>Address:</span>
								<div class='address-wrapper'>
									{$venueModel.address_1}<br />
									{if ($venueModel.address_2 != '')}{$venueModel.address_2}<br />{/if}
									{$venueModel.city}, {$venueModel.state} {$venueModel.postal_code}<br />
									{$venueModel.country}
								</div>
							</li>
							<li><span>Minimum Age:</span> {$venueModel.minimum_age}</li>
							{if $venueModel.description}<li><span>Description:</span><div>{$venueModel.description|nl2br}</div></li>{/if}
							{if $venueModel.special_notes}<li><span>Special Notes:</span><div>{$venueModel.special_notes|nl2br}</div></li>{/if}
						</ul>
					</div>
				</td>
				<td>
					{if $venueModel.contact_email}{$venueModel.contact_email}
					{else}{$venueModel.contact_email}
					{/if}
				</td>
				<td>{$venueModel.type}</td>
				<td>
					{if ($venueModel.status == 'pending approval')}
						<div class='dropdown'><a>You must approve this venue</a>
							<ul>
								<li><a href="{url 'manage-venues/approve' ['venueId' => $venueModel.id]}">Approve venue</a></li>
								<li><a href="{url 'manage-venues/reject' ['venueId' => $venueModel.id]}">Reject venue</a></li>
							</ul>
						</div>
					{elseif $venueModel.status == 'approved'}Venue approved
					{else}Submission in progress
					{/if}
				</td>
				<td><a href="{url 'venues/edit' [venueId => $venueModel.id]}"><i class='icon-edit'></i></a></td>
			</tr>
		{/foreach}
	</tbody>
</table>
{else}<p>There are currently no venues listed on the site.</p>
{/if}