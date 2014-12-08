<ul class='nav nav-type-horizontal'>
	<li><a {if $route|default=='about'}class='active'{/if} href="{url about}">About</a></li>
	<li><a {if $route|default=='contact'}class='active'{/if} href="{url contact}">Contact</a></li>
	<li class='dropdown'>
		<a>Add another...</a>
		<ul class='nav'>
			<li><a {if $route|default=='venues/add'}class='active'{/if} href="{url 'venues/add'}">Venue</a></li>
			<li><a {if $route|default=='events/add'}class='active'{/if} href="{url 'events/add'}">Event</a></li>
			<li><a {if $route|default=='people/add'}class='active'{/if} href="{url 'people/add'}">Instructor</a></li>
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
		</ul>
	</li>
</ul>