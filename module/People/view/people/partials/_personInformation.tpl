<li>
	<label>Name:</label><div>{$personModel.first_name.' '.$personModel.last_name}</div>
</li>
<li><label>Address:</label>
	<div id='address-wrapper'>
		{$personModel.address_1}<br />
		{if $personModel.address_2 != ''}{$personModel.address_2}<br />{/if}
		{$personModel.city}, {$personModel.state} {$personModel.postal_code}<br />
/*		{$personModel.country}*/
	</div>
</li>

{if $personModel.web_links}
	<li>
		<label>Websites:</label>
		<ul>
			{assign var= websites value=';'|explode:$personModel.web_links}
			{foreach $websites website}
				<li>{$website}</li>
			{/foreach}
		</ul>
	</li>
{/if}
{if $personModel.costs != []}
	<li>
		<label>Cost:</label>
		<ul>
			{foreach $personModel.costs cost}
				<li>{$cost.person_type} pay ${$cost.amount}</li>
			{/foreach}
		</ul>
	</li>
{/if}
{if $personModel.description}
	<li>
		<label>Description:</label>
		<div>{$personModel.description|nl2br}</div>
	</li>
{/if}