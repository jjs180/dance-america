<h1>Register</h1>
<div class='spacer-large'></div>
<form id='registrationForm' class="NWForm" method='post' action="{url register}">
	<div>
		<label for='registrationForm-email'>Email</label>
		<input id='registrationForm-email' name='registrationForm[email]' type='email' placeholder="Email" data-validators="required validate-email nw-validate-available" data-nwValidateAvailable-url="{url 'register/check-email-available'}" />
	</div>
	<div>
		<label for='registrationForm-emailConfirm'>Confirm Email</label>
		<input id='registrationForm-emailConfirm' name='registrationForm[email_confirm]' type='email' placeholder="Confirm Email" data-validators="required validate-match matchInput:'registrationForm-email' matchName:'Email'" />
	</div>
	<div>
		<label for='registrationForm-password'>Password</label>
		<input id='registrationForm-password' name='registrationForm[password]' type='password' placeholder="Password" data-validators="required minLength:6" />
	</div>
	<div>
		<label for='registrationForm-passwordConfirm'>Confirm Password</label>
		<input id='registrationForm-passwordConfirm' name='registrationForm[password_confirm]' type='password' placeholder="Confirm Password" data-validators="required minLength:6 validate-match matchInput:'registrationForm-password' matchName:'Password' " />
	</div>
	<div>
		<input id="registrationForm-terms" type="checkbox" name="registrationForm[terms]" data-validators="validate-required-check" />
		<label>I have read and accepted the <a class="NWPopup" href="{url name='terms'}">Terms of Use</a></label>
	</div>
	<div>
		<button type='submit'>Register</button>
	</div>
</form>