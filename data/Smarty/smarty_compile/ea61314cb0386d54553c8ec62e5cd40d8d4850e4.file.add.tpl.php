<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-17 03:54:23
         compiled from "/Users/cara/Sites/dance_america/module/DanceStyles/view/people/people/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201127338554e2ad5f42fdd4-82289303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea61314cb0386d54553c8ec62e5cd40d8d4850e4' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/DanceStyles/view/people/people/add.tpl',
      1 => 1423936585,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201127338554e2ad5f42fdd4-82289303',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'loggedInMember' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54e2ad5f480cb6_86105931',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e2ad5f480cb6_86105931')) {function content_54e2ad5f480cb6_86105931($_smarty_tpl) {?><h1>Add an Instructor</h1>
<p>Registration is not necessary, but it will allow you to edit the people you have added without having to contact the admin to make changes</p>
<form id="addPersonForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('people/add'); ?>" method="post">
	<div>
		<label for="addPersonForm-first_name" class='required'>First Name</label>
		<input id="addPersonForm-first_name" type="text" name="addPersonForm[first_name]" placeholder="First Name" data-validators='required'/>
	</div>
	<div>
		<label for="addPersonForm-last_name" class='required'>Last Name</label>
		<input id="addPersonForm-last_name" type="text" name="addPersonForm[last_name]" placeholder="Last Name" data-validators='required' />
	</div>
	<div>
		<label for="addVenueForm-address1">Address 1</label>
		<input id="addVenueForm-address1" type="text" name="addVenueForm[address_1]" placeholder="Address 1" />
	</div>
	<div>
		<label for="addVenueForm-address2">Address 2</label>
		<input id="addVenueForm-address2" type="text" name="addVenueForm[address_2]" placeholder="Address 2" />
	</div>
	<div>
		<label for="addVenueForm-city" class='required'>City</label>
		<input id="addVenueForm-city" type="text" name="addVenueForm[city]" placeholder="City" data-validators="required" />
	</div>
	<div>
		<label for="addVenueForm-state" class="required">State/Province</label>
		<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_state-options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div>
		<label for="addVenueForm-postalCode">Postal Code</label>
		<input id="addVenueForm-postalCode" type="text" name="addVenueForm[postal_code]" placeholder="Postal Code" />
	</div>
	<div class='hidden'>
		<label for="addPersonForm-cost">Cost of Lessons</label>
		<div id='costDetails-rhsWrapper'>
			<div>
				<input type="text" name="addPersonForm[costs][0][person_type]" class='person-type' placeholder='Type (eg members, non-members, etc)' /> pay $ <input type="text" name="addPersonForm[costs][0][amount]" placeholder='Amount (USD)' data-validators='validate-numeric' />
			</div>
		</div>
	</div>
	<div>
		<a id='addCost-button' class='btn'>Click to put in cost details</a>
	</div>
	<div id='webLinks-container'>
		<label for="addPersonForm-webLinks">Websites</label>
		<div class='webLink-wrapper'>
			<div>
				<label>Url</label>
				<input type="url" placeholder="Url" name='addPersonForm[url][]' data-validators='validate-url' />
			</div>
		</div>
	</div>
	<div>
		<a class='btn' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="addPersonForm-description">Description</label>
		<textarea id="addPersonForm-description" type="text" name="addPersonForm[description]" placeholder="Description" ></textarea>
	</div>
	<div>
		<label for="addPersonForm-contactEmail">Your Email</label>
		<div>
			<input id="addPersonForm-contactEmail" type="email" name="addPersonForm[contact_email]" placeholder="Email" data-validators="validate-email" <?php if (isset($_smarty_tpl->tpl_vars['loggedInMember']->value)){?>value="<?php echo $_smarty_tpl->tpl_vars['loggedInMember']->value['email'];?>
"<?php }?> />
		</div>
		<div>If you leave this blank and we have questions about your person, it will not be approved</div>
	</div>
	<div><button class='new btn'>Add Instructor</button></div>
</form>
<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_addPersonScript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>