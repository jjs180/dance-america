<ul class='nav nav-type-horizontal'>
	<li {if $route|default=='about'}class='active'{/if}><a href="{url about}">About</a></li>
	<li {if $route|default=='contact'}class='active'{/if}><a href="{url contact}">Contact</a></li>
	<li {if $route|default=='venues/add'}class='active'{/if}><a href="{url 'venues/add'}">Add Venue</a></li>
	<li {if $route|default=='events/add'}class='active'{/if}><a href="{url 'events/add'}">Add Event</a></li>
	<li><a {if $route|default=='people/add'}class='active'{/if} href="{url 'people/add'}">Add Instructor</a></li>
</ul>