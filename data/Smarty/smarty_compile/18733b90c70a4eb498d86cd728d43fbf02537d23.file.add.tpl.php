<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-17 01:00:59
         compiled from "/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:782535628544e7a5a8aece9-85577342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18733b90c70a4eb498d86cd728d43fbf02537d23' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/add.tpl',
      1 => 1423936540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '782535628544e7a5a8aece9-85577342',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_544e7a5a918168_21224670',
  'variables' => 
  array (
    'loggedInMember' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544e7a5a918168_21224670')) {function content_544e7a5a918168_21224670($_smarty_tpl) {?><h1>Add a Dance Venue!</h1>
<form id="addVenueForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>" method="post">
	<div>
		<label for="addVenueForm-name" class='required'>Name of the Venue</label>
		<input id="addVenueForm-name" type="text" name="addVenueForm[name]" placeholder="Name" data-validators="required" />
	</div>
	<div>
		<label for="addVenueForm-type" class='required'>Venue Type</label>
		<select name="addVenueForm[type]" id="addVenueForm-type" data-validators="required" >
			<option value="Dance Studio" selected='selected'>Dance Studio</option>
			<option value="Bar">Bar</option>
			<option value="Other">Other</option>
		</select>
	</div>
	<div>
		<label for="addVenueForm-minimumAge" class='required'>Minimum Age</label>
		<select name="addVenueForm[minimum_age]" id="addVenueForm-minimumAge" data-validators="required">
			<option value="None" selected='selected'>None</option>
			<option value="18 and over">18 and over</option>
			<option value="21 and over">21 and over</option>
		</select>
	</div>
	<div>
		<label for="addVenueForm-address1" class='required'>Address 1</label>
		<input id="addVenueForm-address1" type="text" name="addVenueForm[address_1]" placeholder="Address 1" data-validators="required" />
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
		<label for="addVenueForm-state" class='required'>State/Province</label>
		<select name="addVenueForm[state]" id="addVenueForm-state" data-validators='required'>
			<?php echo $_smarty_tpl->getSubTemplate ('./../../../../../module/Application/view/application/partials/_state-options-list-generic.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</select>
	</div>
	<div>
		<label for="addVenueForm-postalCode" class='required'>Postal Code</label>
		<input id="addVenueForm-postalCode" type="text" name="addVenueForm[postal_code]" placeholder="Postal Code" data-validators='required numeric'/>
	</div>
	<div class='hidden'>
		<label for="addVenueForm-country" class='required'>Country</label>
		<input id="addVenueForm-country" type="text" name="addVenueForm[country]" placeholder="Country" data-validators='required' value="United States of America"/>
	</div>
	<div id='webLinks-container'>
		<label for="addVenueForm-webLinks">Websites</label>
		<div class='webLink-wrapper'>
			<div>
				<label>Url</label>
				<input name='addVenueForm[url][]' type="url" placeholder="link" data-validators='validate-url' />
			</div>
		</div>
	</div>
	<div>
		<a class='btn positive' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="addVenueForm-description">Description</label>
		<textarea id="addVenueForm-description" type="text" name="addVenueForm[description]" placeholder="Description"></textarea>
	</div>
	<div>
		<label for="addVenueForm-contactEmail">Your Email</label>
		<input id="addVenueForm-contactEmail" type="email" name="addVenueForm[contact_email]" placeholder="Email" data-validators="validate-email" <?php if ($_smarty_tpl->tpl_vars['loggedInMember']->value){?>value="<?php echo $_smarty_tpl->tpl_vars['loggedInMember']->value['email'];?>
"<?php }?> />
		<p>If you leave this blank and we have questions about your venue, it will not be approved</p>
	</div>
	<div><button type="submit">Review</button></div>
</form>
<script type="text/javascript" charset="utf-8">
function addInput() {
	var linkHtml = document.getElementById('webLinks-container').innerHTML;
	var webLinkContainer = document.getElementById('webLinks-container');
	webLinkContainer.insertAdjacentHTML('beforeend', "<div class='webLink-wrapper'><div><label>Url</label><input name='addVenueForm[url][]' type='url' placeholder='Url' data-validators='validate-url' /></div></div>");
};

</script><?php }} ?>