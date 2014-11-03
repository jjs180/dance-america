<ul class='nav nav-type-horizontal'>
	<li><a {if $route|default=='about'}class='active'{/if} href="{url about}">About</a></li>
	<li><a {if $route|default=='contact'}class='active'{/if} href="{url contact}">Contact</a></li>
	<li><a {if $route|default=='venues/add'}class='active'{/if} href="{url 'venues/add'}">Add Venue</a></li>
	<li><a {if $route|default=='events/add'}class='active'{/if} href="{url 'events/add'}">Add Event</a></li>
	<li><a {if $route|default=='people/add'}class='active'{/if} href="{url 'people/add'}">Add Instructor</a></li>
	<li><a {if $route|default=='manage-events'}class='active'{/if} href="{url 'manage-events'}">Manage Events</a></li>
	<li><a {if $route|default=='manage-venues'}class='active'{/if} href="{url 'manage-venues'}">Manage Venues</a></li>
	<li><a {if $route|default=='manage-people'}class='active'{/if} href="{url 'manage-people'}">Manage Instructors</a></li>
</ul>