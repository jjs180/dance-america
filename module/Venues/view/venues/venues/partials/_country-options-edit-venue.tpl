<select name="editVenueForm[country]" id="editVenueForm-country" data-validators="required">
	{include './_country-options-list.tpl'}
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="{$venueModel['country']}" selected='selected'>{$venueModel['country']}</option>
</select>