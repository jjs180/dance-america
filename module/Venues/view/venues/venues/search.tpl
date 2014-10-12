<h1>Enter the search criteria below</h1>
<form id="searchVenuesForm" class="NWForm" action="{url 'venues/search'}" method="post">
	{if ($eventId)}
		<input type="hidden" name="searchVenuesForm[event_id]" value="{$eventId}" />
	{else}<input type="hidden" name="searchVenuesForm[event_id]" value="0" />
	{/if}
	<div>
		<label for="searchVenuesForm-searchCriteria" class='required'>Search For Venue By</label>
		<select name="searchVenuesForm[search_criteria]" id="searchVenuesForm-searchCriteria" data-validators="required" >
			<option value="name">Name</option>
			<option value="city">City</option>
			<option value="state">State</option>
			<option value="postal code">Postal Code</option>
			<option value="country">Country</option>
		</select>
	</div>
	<div>
		<label for="searchVenuesForm-searchParam" class='required'>Search Phrase</label>
		<div id='searchParamInput-wrapper'>
			<input id="searchVenuesForm-searchParam" type="text" name="searchVenuesForm[search_param]" placeholder="Search Phrase" data-validators="required" />
		</div>
	</div>
	<div><button type="submit">Search</button></div>
</form>
<script type="text/javascript" charset="utf-8">
	selectCriteriaValue = $j('#searchVenuesForm-searchCriteria').val();
	
	function getValue() {
		return $j('#searchVenuesForm-searchCriteria').val();
	}
	
	if (selectCriteriaValue == 'state') {
		$j('#searchVenuesForm-searchParam').remove();
		var stateFile = $j('#searchParamInput-wrapper').load('/_state-options-search-venue.tpl');
		var stateFileHtml = stateFile[0];
		
		$j("#searchParamInput-wrapper").append(stateFileHtml);
	} else if (selectCriteriaValue == 'country') {
		$j('#searchVenuesForm-searchParam').remove();
		var countryFile = $j('#searchParamInput-wrapper').load('/_country-options-search-venue.tpl');
		var countryFileHtml = countryFile[0];
		
		$j("#searchParamInput-wrapper").append(countryFileHtml);
	}
	
	$j('#searchVenuesForm-searchCriteria').change(function() {
		selectCriteriaValue = getValue();
		if (selectCriteriaValue == 'state') {
			$j('#searchVenuesForm-searchParam').remove();
			var stateFile = $j('#searchParamInput-wrapper').load('/_state-options-search-venue.tpl');
			var stateFileHtml = stateFile[0];
			
			$j("#searchParamInput-wrapper").append(stateFileHtml);
		} else if (selectCriteriaValue == 'country') {
			$j('#searchVenuesForm-searchParam').remove();
			var countryFile = $j('#searchParamInput-wrapper').load('/_country-options-search-venue.tpl');
			var countryFileHtml = countryFile[0];
			
			$j("#searchParamInput-wrapper").append(countryFileHtml);
		} else if (selectCriteriaValue == 'name' || selectCriteriaValue == 'city' || selectCriteriaValue == 'postal code') {
			$j('#searchVenuesForm-searchParam').remove();
			var blankInputFile = $j('#searchParamInput-wrapper').load('/_blank-input-options-search.tpl');
			var blankInputFileHtml = blankInputFile[0];
			$j("#searchParamInput-wrapper").append(blankInputFileHtml);
		}
		
	});
</script>