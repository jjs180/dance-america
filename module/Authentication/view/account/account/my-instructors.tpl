{if !empty($instructorModelsArray)}
<h1>Instructors You Have Listed</h1>
	<table border="1" id='myInstructors-table'>
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Status</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			{foreach $instructorModelsArray instructorModel}
				<tr>
					<td>{$instructorModel.name}</td>
					<td>
						{$instructorModel.address_1}<br />
						{if $instructorModel.address_2 != ''}{$instructorModel.address_2}<br />{/if}
						{$instructorModel.city}, {$instructorModel.state} {$instructorModel.postal_code}<br />
					</td>
					<td>
						{if $instructorModel.description || $instructorModel.special_notes}
							<div class='dropdown'>
								<a></a>
								<ul>
									{if $instructorModel.description}<li><span>Description:</span><div>{$instructorModel.description|nl2br}</div></li>{/if}
									{if $instructorModel.special_notes}<li><span>Special Notes:</span><div>{$instructorModel.special_notes|nl2br}</div></li>{/if}
								</ul>
							</div>
						{else}None Listed
						{/if}
					</td>
					<td>{$instructorModel.status}</td>
					<td class='editting-cell'><a href="{url 'instructors/edit' ['instructorId' => $instructorModel.id]}"><i class='icon-edit'></i></a></td>
				</tr>
			{/foreach}
		</tbody>
	</table>
{else}<h1>You have not listed any instructors on our site</h1>
{/if}