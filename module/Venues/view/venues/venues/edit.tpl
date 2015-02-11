<h1>Edit the {$venueModel.name}</h1>
<p>Edit the venue information below as necessary.</p>
<form id="editVenueForm" class="NWForm" action="{url 'venues/edit' [venueId => $venueModel.id]}" method="post">
	<div>
		<label for="editVenueForm-name" class='required'>Name of the Venue</label>
		<input id="editVenueForm-name" type="text" name="editVenueForm[name]" value="{$venueModel.name}" data-validators="required" />
	</div>
	
	<div>
		<label for="editVenueForm-address1" class='required'>Address 1</label>
		<input id="editVenueForm-address1" type="text" name="editVenueForm[address_1]" value="{$venueModel.address_1}" data-validators="required" />
	</div>
	<div>
		<label for="editVenueForm-address2">Address 2</label>
		<input id="editVenueForm-address2" type="text" name="editVenueForm[address_2]" value="{$venueModel.address_2}" />
	</div>
	<div>
		<label for="editVenueForm-city" class='required'>City</label>
		<input id="editVenueForm-city" type="text" name="editVenueForm[city]" value="{$venueModel.city}" data-validators="required" />
	</div>
	<div>
		<label for="editVenueForm-state" class='required'>State/Province</label>
		{include './partials/_state-options-edit-venue.tpl'}
	</div>
	<div>
		<label for="editVenueForm-postalCode" class='required'>Postal Code</label>
		<input id="editVenueForm-postalCode" type="text" name="editVenueForm[postal_code]" value="{$venueModel.postal_code}" data-validators='required'/>
	</div>
	<!-- <div>
		<label for="editVenueForm-country" class='required'>Country</label>
		{include './partials/_country-options-edit-venue.tpl'}
	</div> -->
	<div id='webLinks-container'>
		<label for="editVenueForm-webLinks">Websites</label>
		{if $venueModel.web_links}
			{assign var= websites value=";"|explode:$venueModel.web_links}
			{foreach $websites website}
				<div class='webLink-wrapper'>
					<div>
						<label>Url</label>
						<input name='editVenueForm[url][]' type="url" placeholder="link" data-validators='validate-url' value="{$website}" />
					</div>
				</div>
			{/foreach}
		{else}
			<div class='webLink-wrapper'>
				<div>
					<label>Url</label>
					<input name='editVenueForm[url][]' type="url" placeholder="link" data-validators='validate-url' />
				</div>
			</div>
		{/if}
	</div>
	<div>
		<a class='btn positive' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="editVenueForm-description">Description</label>
		<textarea id="editVenueForm-description" type="text" name="editVenueForm[description]" value="{$venueModel.description}" placeholder='Description'>{$venueModel.description}</textarea>
	</div>

	<div>
		<label for="editVenueForm-contactEmail">Your Email</label>
		<div>
			<input id="editVenueForm-contactEmail" type="email" name="editVenueForm[contact_email]" placeholder="Email" data-validators="validate-email" {if $venueModel.contact_email}value="{$venueModel.contact_email}" {else}value="{$loggedInMember.email}"{/if} />
		</div>
		<div>If you leave this blank and we have questions about your venue, it will not be approved</div>
	</div>
	<div><button type="submit">Save</button></div>
</form>
<script type="text/javascript" charset="utf-8">
function addInput() {
	var webLinkContainer = document.getElementById('webLinks-container');
	webLinkContainer.insertAdjacentHTML('beforeend', "<div class='webLink-wrapper'><div><label>Url</label><input name='editVenueForm[url][]' type='url' placeholder='Url' data-validators='validate-url' /></div></div>");
};

</script>