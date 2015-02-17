<div class='{if !$smarty.post}column-desktop-12 column-tablet-12{else}column-desktop-6 column-tablet-6{/if}'>
	<form id = "siteSearchForm" action="{url 'home'}" class="NWForm" method='POST'>
		<div>
			<label class='required' for="siteSearchForm-searchParam">What are you looking for?</label>
			<select type="text" name="siteSearchForm[search_param]" data-validators="required" required>
				<option value="">--</option>
				{foreach $siteSearchParams as $param}
				<option value="{$param}" {if $smarty.post && $smarty.post['siteSearchForm']['search_param'] == $param}selected='selected'{/if}>{$param}</option>
				{/foreach}
	 		</select>
		</div>
		<div>
			<label for="siteSearchForm-danceStyle">Dance Style</label>
			<select name="siteSearchForm[dance_style]" id="siteSearchForm-danceStyle">
				<option value="">--</option>
				{foreach $danceStyles as $danceStyle}
					<option value="{$danceStyle.name}" {if $smarty.post && $smarty.post['siteSearchForm']['dance_style'] == $danceStyle.name}selected='selected'{/if}>{$danceStyle.name}</option>
				{/foreach}
			</select>
		</div>
		<div>
			<label for="siteSearchForm-locationType">Search for location by</label>
			<select name="siteSearchForm[location][type]" size="1" data-toggle-display='locationType_container' id="siteSearchForm-locationType" data-validators='validate-notEmpty'>
				<option value="" selected='selected'>--</option>
				<option value="city_state" data-display='locationCity' {if $smarty.post && $smarty.post['siteSearchForm']['location']['type'] == 'city_state'} selected='selected'{/if}>City/State</option>
				<option value="postal_code" data-display='locationPostalCode' {if $smarty.post && $smarty.post['siteSearchForm']['location']['type'] == 'postal_code'}selected='selected'{/if}>Postal Code</option>
			</select>
		</div>
		<div id="locationType_container">
			<div class="{if $smarty.post && $smarty.post['siteSearchForm']['location']['type'] !== ' ' &&  $smarty.post['siteSearchForm']['location']['type'] !== 'city_state' || !$smarty.post}hidden{/if}" id='city_state_wrapper'>
				<div>
					<label for="siteSearchForm-locationCity">City</label>
					<input id="siteSearchForm-locationCity" type="text" name="siteSearchForm[location][city]" placeholder="City" data-validators='validate-notEmpty' value="{if $smarty.post}{$smarty.post['siteSearchForm']['location']['city']}{/if}" />
				</div>
				<div>
					<label for="siteSearchForm-locationState">State</label>
					<select name="siteSearchForm[location][state]" id="siteSearchForm-locationState">
						{include '../partials/_state-options.tpl'}
					</select>
				</div>
			</div>
			<div class="{if $smarty.post && $smarty.post['siteSearchForm']['location']['type'] !== ' ' &&  $smarty.post['siteSearchForm']['location']['type'] !== 'postal_code' || !$smarty.post}hidden{/if}" id='postal_code_wrapper'>
				<label for="siteSearchForm-locationPostalCode">Postal Code</label>
				<input id="siteSearchForm-locationPostalCode" type="text" name="siteSearchForm[location][postal_code]" placeholder="Postal Code" data-validators="{if $smarty.post && $smarty.post['siteSearchForm']['location']['type'] == 'postal_code'}required {/if}validate-numeric validate-notEmpty" minLength='5' value="{if $smarty.post}{$smarty.post['siteSearchForm']['location']['postal_code']}{/if}" {if $smarty.post && $smarty.post['siteSearchForm']['location']['type'] == 'postal_code'}required{/if} />
			</div>
		</div>
		<div>
			<label for="siteSearchForm-radius">Radius</label>
			<select name="siteSearchForm[radius]" size="1">
				<option {if $smarty.post &&  $smarty.post['siteSearchForm']['radius'] == '' || !$smarty.post}selected='selected'{/if} value="">--</option>
				<option {if $smarty.post &&  $smarty.post['siteSearchForm']['radius'] == '5'}selected='selected'{/if} value="5">5 miles</option>
				<option  {if $smarty.post &&  $smarty.post['siteSearchForm']['radius'] == '15'}selected='selected'{/if} value="15">15 miles</option>
				<option  {if $smarty.post &&  $smarty.post['siteSearchForm']['radius'] == '25'}selected='selected'{/if} value="25">25 miles</option>
				<option  {if $smarty.post &&  $smarty.post['siteSearchForm']['radius'] == '50'}selected='selected'{/if} value="50">50 miles</option>
				<option  {if $smarty.post &&  $smarty.post['siteSearchForm']['radius'] == '100'}selected='selected'{/if} value="100">100 miles</option>
			</select>
		</div>
		<div><button type='submit'>Submit</button></div>
	</form>
	<script>
		{include './../../../public/js/application.js'}
		$j('input[type=submit]').click(function() {
			$j('form').submit();
		});
	</script>
</div>
{if $smarty.post}
	<div class='column-tablet-6 column-desktop-6'>
		{if $results}
			<ul>
				{$count = 0}
				{foreach $results result}
					<div class='panel'>
						<h1 class='row'><div class=" column-desktop-11 column-tablet-11">{$result.name}</div>
							{if $viewPath == 'events/view'}
								<a class="column-desktop-1 column-tablet-1 pull-right" href="{url $viewPath ['eventId' => $result.id]}" >
							{else}
								<a class="column-desktop-1 column-tablet-1 pull-right" href="{url $viewPath ['personId' => $result.person.id]}" >
							{/if}
								<i class='icon-chevron-right icon'></i></a></h1>
						<div>
							<p>
								{$result.venue.address_1}<br />
								{if $result.venue.address_2}{$result.venue.address_2}<br />{/if}
								{$result.venue.city}, {$result.venue.state} {$result.venue.postal_code}<br />
								{if $result.description}
									<div>Description: {$result.description}</div>
								{/if}
								{if $result.special_notes}
									<div>Special Notes: {$result.special_notes}</div>
								{/if}
							</p>
						</div>
					</div>
						<!-- <div>
							<h2>{$result.venue.name}</h2>
						</div>
						<div class='description-container'>
						</div> -->
				{$count = $count+1}
				{/foreach}
			</ul>
		{else}
			<p>Sorry, but it appears that we could not find anything matching your criteria.</p>
		{/if}
	</div>
{/if}