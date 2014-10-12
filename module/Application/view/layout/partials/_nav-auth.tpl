<ul class='nav-auth'>
	{if isset($loggedInMember)}
		<li {if $route|default=='account'}class='active'{/if}><a href="{url account}">My Account</a></li>
		<li {if $route|default=='account/my-events'}class='active'{/if}><a href="{url 'account/my-events'}">My Events</a></li>
		<li {if $route|default=='account/my-venues'}class='active'{/if}><a href="{url 'account/my-venues'}">My Venues</a></li>
		<li><a href='{url logout}'>Logout</a></li>
	{else}
		<li {if $route|default == 'login'}class='active'{/if}><a href='{url login}'>Login</a></li>
		<li {if $route|default == 'register'}class='active'{/if}><a href='{url register}'>Register</a></li>
	{/if}
</ul>