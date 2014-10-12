<h1>What sort of experience do you want when adding events and venues to our site?</h1>
<h2>If you choose to register with us, you will be able to:</h2>
<ul id='registrationReasons-list'>
	<li>Edit venues/events without having to contact the admin to make changes</li>
	<li>View the events and venues that you have suggested to the site</li>
</ul>

<form id="determineRegistrationStatusForm" class="NWForm" action="{url 'determine-user-status' ['type'	=>	{$params}]}" method="post">
	<div>
		<label for="determineRegistrationStatusForm-status" class='required'>Would you like to register with us?</label>
		<select name="determineRegistrationStatusForm[status]" id="determineRegistrationStatusForm-status" data-validators='required'>
		</select>
	</div>
	<div><button type="submit">Submit</button></div>
</form>