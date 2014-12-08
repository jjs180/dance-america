<ul class='nav nav-type-horizontal'>
	<li><a {if $route|default=='about'}class='active'{/if} href="{url about}">About</a></li>
	<li><a {if $route|default=='contact'}class='active'{/if} href="{url contact}">Contact</a></li>
	<li class='dropdown'>
		<a>Add another...</a>
			<a>Add another...</a>
			<ul class='nav'>
				<li><a {if $route|default=='venues/add'}class='active'{/if} href="{url 'venues/add'}">Venue</a></li>
				<li><a {if $route|default=='events/add'}class='active'{/if} href="{url 'events/add'}">Event</a></li>
				<li><a {if $route|default=='people/add'}class='active'{/if} href="{url 'people/add'}">Instructor</a></li>
			</ul>
		</li>
		<li class='dropdown'>
			<a>Manage my...</a>
			<ul class='nav'>
				<li><a {if $route|default=='manage-events'}class='active'{/if} href="{url 'manage-events'}">Events</a></li>
				<li><a {if $route|default=='manage-venues'}class='active'{/if} href="{url 'manage-venues'}">Venues</a></li>
				<li><a {if $route|default=='manage-people'}class='active'{/if} href="{url 'manage-people'}">Instructors</a></li>
			</ul>
		</li>
</ul>
<ul id='navTag-phone'>
	<li>
		<a class='icon-menu'></a>
		<ul class='nav'>
			<li><a {if $route|default=='about'}class='active'{/if} href="{url about}">About</a></li>
			<li><a {if $route|default=='contact'}class='active'{/if} href="{url contact}">Contact</a></li>
			<li class='nav-divider'></li>
			<li><a {if $route|default=='venues/add'}class='active'{/if} href="{url 'venues/add'}">Add Venue</a></li>
			<li><a {if $route|default=='events/add'}class='active'{/if} href="{url 'events/add'}">Add Event</a></li>
			<li><a {if $route|default=='people/add'}class='active'{/if} href="{url 'people/add'}">Add Instructor</a></li>
			<li class='nav-divider'></li>
			<li><a {if $route|default=='manage-events'}class='active'{/if} href="{url 'manage-events'}">Events</a></li>
			<li><a {if $route|default=='manage-venues'}class='active'{/if} href="{url 'manage-venues'}">Venues</a></li>
			<li><a {if $route|default=='manage-people'}class='active'{/if} href="{url 'manage-people'}">Instructors</a></li>
			<li class='nav-divider'></li>
			<li {if $route|default=='account'}class='active'{/if}><a href="{url account}">My Account</a></li>
			<li><a href='{url logout}'>Logout</a></li>
		</ul>
	</li>
</ul>