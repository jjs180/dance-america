{if !$smarty.post}
	<form action="/" class="NWForm" method='post'>
		<div>
			<label for="siteSearchForm-searchParam">What are you looking for?&nbsp;<span class="required">*</span></label>
			<select type="text" name="siteSearchForm[searchParam]" data-validators="required" required>
				{foreach $siteSearchParams as $param}
					<option value="{$param}">{ucWords($param)}</option>
				{/foreach}
	 		</select>
		</div>
		<div>
			<label for="siteSearchForm-locationType">Search for location by</label>
			<select name="siteSearchForm[location][type]" size="1" data-toggle-display='true'>
				<option value="">--</option>
				<option value="city/state" data-display='siteSearchForm-locationCity'>City, State</option>
				<option value="postal code" data-display='locationPostalCode'>Postal Code</option>
			</select>
		</div>
		<div class='hidden'>
			<label for="siteSearchForm-locationCity">City</label>
			<input id="siteSearchForm-locationCity" type="text" name="siteSearchForm[location][city]" placeholder="City" />
			<label for="siteSearchForm-locationState">State</label>
			{include '../partials/_state-options.tpl'}
		</div>
		<div class='hidden'>
			<label for="siteSearchForm-locationPostalCode">Postal Code</label>
			<input id="siteSearchForm-locationPostalCode" type="text" name="siteSearchForm[location][postal_code]" placeholder="Postal Code" />
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
		<div>
			<label for="siteSearchForm-dance_style">Dance Style</label>
			<input id="siteSearchForm-dance_style" type="text" name="siteSearchForm[dance_style]" placeholder="Dance Style" />
		</div>
		<div>
			<button type="submit">Search</button>
		</div>
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
