{if $scrapModelsArray}
<h1>Currently archived scraps</h1>
<a class='btn' href="{url 'manage-scraps'}">Active entries</a>
<table border="1" id='manageScraps-table'>
	<thead>
		<tr>
			<th>Event/Venue Name</th>
			<th>Archive Date</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach $scrapModelsArray scrapModel}
			<tr>
				<td>{$scrapModel.name}</td>
				<td>{$scrapModel.time_updated}</td>
				<td><a href="{url 'manage-scraps/delete' ['scrapId' => $scrapModel.id]}" class='NWDialog NWLink' data-nwDialog-title='Confirm Deletion' data-nwDialog-html='<b>Are you sure you want to delete this entry?</b>'><i class='icon-trash'></i></a></td>
			</tr>
		{/foreach}
	</tbody>
</table>
{else}
	<p>There are no archived entries at this time.</p>
	<a class='btn' href="{url 'manage-scraps'}">Active entries</a>
{/if}
