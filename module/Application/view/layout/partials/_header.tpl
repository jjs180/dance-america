<header>
	<h1><a href='{url home}'>Westie Home</a></h1>
	{if isset($loggedInMember) && $loggedInMember->role == 'admin'}{include 'layout/partials/_nav-main-admin.tpl'}
	{elseif isset($loggedInMember) && $loggedInMember->role == 'member'}{include 'layout/partials/_nav-main-member.tpl'}
	{else}{include 'layout/partials/_nav-main.tpl'}
	{/if}
	{include 'layout/partials/_nav-auth.tpl'}
</header>