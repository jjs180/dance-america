<h1>Add a Dance Venue!</h1>
<form id="addVenueForm" class="NWForm" action="{url 'venues/add'}" method="post">
	<div>
		<label for="addVenueForm-name" class='required'>Name of the Venue</label>
		<input id="addVenueForm-name" type="text" name="addVenueForm[name]" placeholder="Name" data-validators="required" />
	</div>
	<div>
		<label for="addVenueForm-address1" class='required'>Address 1</label>
		<input id="addVenueForm-address1" type="text" name="addVenueForm[address_1]" placeholder="Address 1" data-validators="required" />
	</div>
	<div>
		<label for="addVenueForm-address2">Address 2</label>
		<input id="addVenueForm-address2" type="text" name="addVenueForm[address_2]" placeholder="Address 2" />
	</div>
	<div>
		<label for="addVenueForm-city" class='required'>City</label>
		<input id="addVenueForm-city" type="text" name="addVenueForm[city]" placeholder="City" data-validators="required" />
	</div>
	<div>
		<label for="addVenueForm-state" class='required'>State/Province</label>
		{include './partials/_state-options.tpl'}
	</div>
	<div>
		<label for="addVenueForm-postalCode" class='required'>Postal Code</label>
		<input id="addVenueForm-postalCode" type="text" name="addVenueForm[postal_code]" placeholder="Postal Code" data-validators='required numeric'/>
	</div>
	<!-- <div>
		<label for="addVenueForm-country" class='required'>Country</label>
		{include './partials/_country-options.tpl'}
	</div> -->
	<div id='webLinks-container'>
		<label for="addVenueForm-webLinks">Websites</label>
		<div class='webLink-wrapper'>
			<div>
				<label>Url</label>
				<input name='addVenueForm[url][]' type="url" placeholder="link" data-validators='validate-url' />
			</div>
		</div>
	</div>
	<div>
		<a class='btn new' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="addVenueForm-description">Description</label>
		<textarea id="addVenueForm-description" type="text" name="addVenueForm[description]" placeholder="Description"></textarea>
	</div>
	<div>
		<label for="addVenueForm-contactEmail">Your Email</label>
		<div>
			<input id="addVenueForm-contactEmail" type="email" name="addVenueForm[contact_email]" placeholder="Email" data-validators="validate-email" {if $loggedInMember}value="{$loggedInMember.email}"{/if} />
		</div>
		<div>If you leave this blank and we have questions about your venue, it will not be approved</div>
	</div>
	<div><button type="submit">Add Venue</button></div>
</form>
<script type="text/javascript" charset="utf-8">
function addInput() {
	var linkHtml = document.getElementById('webLinks-container').innerHTML;
	var webLinkContainer = document.getElementById('webLinks-container');
	webLinkContainer.insertAdjacentHTML('beforeend', "<div class='webLink-wrapper'><div><label>Url</label><input name='addVenueForm[url][]' type='url' placeholder='Url' data-validators='validate-url' /></div></div>");
};

</script>