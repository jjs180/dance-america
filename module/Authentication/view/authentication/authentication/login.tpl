<h1>Login</h1>
<div id='login-container'>
	<div id='loginForm-container'>
		<form id='loginForm' class="NWForm" method='post'>
			<div>
				<label for='loginForm-email' class='required'>Email</label>
				<input id='loginForm-email' name='loginForm[email]' type='email' placeholder="Email" data-validators="required validate-email"/>
			</div>
			<div>
				<label for='loginForm-password' class='required'>Password</label>
				<input id='loginForm-password' name='loginForm[password]' type='password' placeholder="Password" data-validators="required" />
			</div>
			<div id='loginButton-wrapper'><button type='submit'>Login</button></div>
		</form>
		<a id='forgotPassword-wrapper' href="{url 'password/forgot'}">I forgot my password</a>
	</div>
	<div id='registerButton-container'>
		<a href="{url register}"><button class='positive'>Register</button></a>
	</div>
</div>