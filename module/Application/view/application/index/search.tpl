{if !$smarty.post}
	<form id = "siteSearchForm" action="{url 'search'}" class="NWForm" method='POST'>
		<div>
			<label for="siteSearchForm-searchParam">What are you looking for?&nbsp;<span class="required">*</span></label>
			<select type="text" name="siteSearchForm[search_param]" data-validators="required" required>
				{foreach $siteSearchParams as $param}
					<option value="{$param}">{ucWords($param)}</option>
				{/foreach}
	 		</select>
		</div>
		<div>
			<label for="siteSearchForm-danceStyle">Dance Style</label>
			<select name="siteSearchForm[dance_style]" id="siteSearchForm-danceStyle">
				<option value=""></option>
				{foreach $danceStyles as $danceStyle}
					<option value="{$danceStyle.name}">{$danceStyle.name}</option>
				{/foreach}
			</select>
		</div>
		<div>
			<label for="siteSearchForm-locationType">Search for location by</label>
			<select name="siteSearchForm[location][type]" size="1" data-toggle-display='locationType_container' id="siteSearchForm-locationType" data-validators='required validate-notEmpty'>
				<option value="">--</option>
				<option value="city_state" data-display='locationCity'>City/State</option>
				<option value="postal_code" data-display='locationPostalCode'>Postal Code</option>
			</select>
		</div>
		<div id="locationType_container">
			<div class='hidden' id='city_state_wrapper'>
				<div>
					<label for="siteSearchForm-locationCity">City</label>
					<input id="siteSearchForm-locationCity" type="text" name="siteSearchForm[location][city]" placeholder="City" data-validators='validate-notEmpty' />
				</div>
				<div>
					<label for="siteSearchForm-locationState">State</label>
					{include '../partials/_state-options.tpl'}
				</div>
			</div>
			<div class='hidden' id='postal_code_wrapper'>
				<label for="siteSearchForm-locationPostalCode">Postal Code</label>
				<input id="siteSearchForm-locationPostalCode" type="text" name="siteSearchForm[location][postal_code]" placeholder="Postal Code" data-validators='validate-numeric validate-notEmpty' minLength='5' />
			</div>
		</div>
		<div>
			<label for="siteSearchForm-radius">Radius</label>
			<select name="siteSearchForm[radius]" size="1">
				<option value="">--</option>
				<option value="5">5 miles</option>
				<option value="15">15 miles</option>
				<option value="25">25 miles</option>
				<option value="50">50 miles</option>
				<option value="100">100 miles</option>
			</select>
		</div>
		<div><button class='new btn'>Search</button></div>
	</form>
{else}
<div>
	<div class="col-desktop-12">
		{if $results}
			{foreach $results as $key=>$result}
				<div class='row'>
					<div class="col-desktop-1">{$key+1}</div>
					<div class="col-desktop-11">
						{$result.name}
					</div>
				</div>
			{/foreach}
		{else}
		{/if}
	</div>
</div>
{/if}

<script>
	{include './../../../public/js/application.js'}
	$j('button').click(function() {
		$j('form').submit();
	});
</script>
