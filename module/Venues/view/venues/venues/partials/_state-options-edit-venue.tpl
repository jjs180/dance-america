<select name="editVenueForm[state]" id="editVenueForm-state" data-validators='required'>
	{include './_state-options-list.tpl'}
	<option value="{$venueModel['state']}" selected='selected'>{$venueModel['state']}</option>
</select>