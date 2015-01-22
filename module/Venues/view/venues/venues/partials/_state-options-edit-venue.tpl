<select name="editVenueForm[state]" id="editVenueForm-state" data-validators='required'>
	{include './_state-options-list.tpl'}
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="{$venueModel['state']}" selected='selected'>{$venueModel['state']}</option>
</select>