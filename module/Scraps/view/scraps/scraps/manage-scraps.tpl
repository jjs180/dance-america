{if $scrapModelsArray}
<h1>Existing entries which must be formatted</h1>
<a class='btn' href="{url 'archived-scraps'}">Archived entries</a>
<table border="1" id='manageScraps-table'>
	<thead>
		<tr>
			<th>Event/Venue Name</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach $scrapModelsArray scrapModel}
			<tr>
				<td><a href="{url 'manage-scraps/view' ['scrapId' => $scrapModel.id]}">{$scrapModel.name}</a></td>
				<td class='dropdown'>
					<a>
						{if $scrapModel.status == $scrapStatusArray['unprocessed']}Totally Unprocessed
						{elseif $scrapModel.status == $scrapStatusArray['processing']}Being Processed
						{elseif $scrapModel.status == $scrapStatusArray['processed']}Completely Processed
						{/if}
					</a>
					<ul>
						<li><a href="{url 'manage-scraps/update' ['scrapId' => $scrapModel.id, 'status' => $scrapStatusArray['unprocessed']]}">Entry Completely Unprocessed</a></li>
						<li><a href="{url 'manage-scraps/update' ['scrapId' => $scrapModel.id, 'status' => $scrapStatusArray['processing']]}">Entry Being Processed</a></li>
						<li><a href="{url 'manage-scraps/update' ['scrapId' => $scrapModel.id, 'status' => $scrapStatusArray['processed']]}">Entry Processed</a></li>
					</ul>
				</td>
				<td class='scrapIcon-cell'><a href="{url 'manage-scraps/archive' ['scrapId' => $scrapModel.id]}" class='NWDialog NWLink' data-nwDialog-title='Confirm Archive' data-nwDialog-html='<b>Are you sure you want to archive this entry?</b>'><i class='icon-trash'></i></a></td>
			</tr>
		{/foreach}
	</tbody>
</table>
{else}
	<p>Congratulations! You have successfully transferred all the old entries to the new format.</p>
	<a class='btn' href="{url 'archived-scraps'}">Archived entries</a>	
{/if}
