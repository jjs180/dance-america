<h1>Enter the search criteria below</h1>
<form id="searchVenuesForm" class="NWForm" action="{url 'venues/search'}" method="post">
	{if ($eventId)}
		<input type="hidden" name="searchVenuesForm[event_id]" value="{$eventId}" />
	{else}<input type="hidden" name="searchVenuesForm[event_id]" value="0" />
	{/if}
	<div>
		<label for="searchVenuesForm-searchCriteria" class='required'>Search For Venue By</label>
		<select name="searchVenuesForm[search_criteria]" id="searchVenuesForm-searchCriteria" data-validators="required" >
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="name">Name</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="city">City</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="state">State</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="postal code">Postal Code</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="country">Country</option>
		</select>
	</div>
	<div>
		<label for="searchVenuesForm-searchParam" class='required'>Search Phrase</label>
		<input id="searchVenuesForm-searchParam" type="text" name="searchVenuesForm[search_param]" placeholder="Search Phrase" data-validators="required" />
	</div>
	<div><button type="submit">Search</button></div>
</form>
<script type="text/javascript" charset="utf-8">
	selectCriteriaValue = $j('#searchVenuesForm-searchCriteria').val();
	
	function getValue() {
		return $j('#searchVenuesForm-searchCriteria').val();
	}
	
	if (selectCriteriaValue == 'state') {
		$j("input[name='searchVenuesForm[search_param]']").remove();
		var stateFile = $j("input[name='searchVenuesForm[search_param]']").load('/_state-options-search-venue.tpl');
		var stateFileHtml = stateFile[0];
		
		$j("label[for='searchVenuesForm-searchParam']").after(stateFileHtml);
	} else if (selectCriteriaValue == 'country') {
		$j("input[name='searchVenuesForm[search_param]']").remove();
		var countryFile = $j("label[for='searchVenuesForm[search_param]']").load('/_country-options-search-venue.tpl');
		var countryFileHtml = countryFile[0];
		
		$j("label[for='searchVenuesForm-searchParam']").after(countryFileHtml).text("Country");
	}
	
	$j('#searchVenuesForm-searchCriteria').change(function() {
		selectCriteriaValue = getValue();
		$j("input[name='searchVenuesForm[search_param]']").remove();
		if (selectCriteriaValue == 'state') {

			var stateFile = $j("label[for='searchVenuesForm-searchParam']").load('/_state-options-search-venue.tpl');
			var stateFileHtml = stateFile[0];
			
			$j("label[for='searchVenuesForm-searchParam']").after(stateFileHtml);
		} else if (selectCriteriaValue == 'country') {
			var countryFile = $j("label[for='searchVenuesForm-searchParam']").load('/_country-options-search-venue.tpl');
			var countryFileHtml = countryFile[0];
			
			$j("label[for='searchVenuesForm-searchParam']").after(countryFileHtml);
		} else if (selectCriteriaValue == 'name' || selectCriteriaValue == 'city' || selectCriteriaValue == 'postal code') {
			var blankInputFile = $j("label[for='searchVenuesForm-searchParam']").load('/_blank-input-options-search.tpl');
			var blankInputFileHtml = blankInputFile[0];
			$j("label[for='searchVenuesForm-searchParam']").after(blankInputFileHtml);
		}
		
	});
</script>