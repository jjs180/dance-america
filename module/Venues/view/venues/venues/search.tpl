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
		</select>
	</div>
	<div>
		<label for="searchVenuesForm-searchParam" class='required'>Name</label>
		<input id="searchVenuesForm-searchParam" type="text" name="searchVenuesForm[search_param]" placeholder="Search Phrase" data-validators="required" />
	</div>
	<div><button type="submit">Search</button></div>
</form>
<script type="text/javascript" charset="utf-8">
	selectCriteriaValue = $j('#searchVenuesForm-searchCriteria').val();
	
	function getValue() {
		return $j('#searchVenuesForm-searchCriteria').val();
	}

	function toTitleCase(str)
	{
		return str.replace(/\w\S*/g, function(txt){
			return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
		});
	}

	$j('#searchVenuesForm-searchCriteria').change(function() {
		selectCriteriaValue = getValue();
		var $inputSearchCriteria = $j("*[name='searchVenuesForm[search_param]']");
		var $searchLabel = $j("label[for='searchVenuesForm-searchParam']");
		$inputSearchCriteria.remove();
		if (selectCriteriaValue == 'state') {
			$searchLabel.text('State');
			$j.get( "/_state-options-search-venue.tpl", function(data) {
				$searchLabel.after(data);
			});
		} else if (selectCriteriaValue == 'name' || selectCriteriaValue == 'city' || selectCriteriaValue == 'postal code') {
			$searchLabel.text(toTitleCase(selectCriteriaValue));
			$j.get( '/_blank-input-options-search.tpl', function(data) {
				$searchLabel.after(data);
			});
		}
	});


</script>