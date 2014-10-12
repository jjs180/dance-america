<select name="editVenueForm[country]" id="editVenueForm-country" data-validators="required">
	{include './_country-options-list.tpl'}
	<option value="{$venueModel['country']}" selected='selected'>{$venueModel['country']}</option>
</select>