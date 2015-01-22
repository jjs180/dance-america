<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-04 16:33:07
         compiled from "/Users/cara/Sites/westie/module/Venues/view/venues/venues/add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160682097152f516f7beb8a9-94332025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87f582f3a5d816ce1a8c4e381a2c1fe3f6a21dfb' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Venues/view/venues/venues/add.tpl',
      1 => 1401892383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160682097152f516f7beb8a9-94332025',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f516f7e7cbe5_63244175',
  'variables' => 
  array (
    'loggedInMember' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f516f7e7cbe5_63244175')) {function content_52f516f7e7cbe5_63244175($_smarty_tpl) {?><h1>Add a Dance Venue!</h1>
<form id="addVenueForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/add'); ?>" method="post">
	<div>
		<label for="addVenueForm-name" class='required'>Name of the Venue</label>
		<input id="addVenueForm-name" type="text" name="addVenueForm[name]" placeholder="Name" data-validators="required" />
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
		<a class='btn new' onclick="addInput()" id='addWebLink-button'>Add another website</a>
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
		<label for="addVenueForm-state">State/Province</label>
		<?php echo $_smarty_tpl->getSubTemplate ('./partials/_state-options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div>
		<label for="addVenueForm-postalCode">Postal Code</label>
		<input id="addVenueForm-postalCode" type="text" name="addVenueForm[postal_code]" placeholder="Postal Code"/>
	</div>
	<div>
		<label for="addVenueForm-country" class='required'>Country</label>
		<?php echo $_smarty_tpl->getSubTemplate ('./partials/_country-options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div>
		<label for="addVenueForm-type" class='required'>Venue Type</label>
		<select name="addVenueForm[type]" id="addVenueForm-type" data-validators="required" >
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Dance Studio" selected='selected'>Dance Studio</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Bar">Bar</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Other">Other</option>
		</select>
	</div>
	<div>
		<label for="addVenueForm-minimumAge" class='required'>Minimum Age</label>
		<select name="addVenueForm[minimum_age]" id="addVenueForm-minimumAge" data-validators="required">
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="None" selected='selected'>None</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="18 and over">18 and over</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="21 and over">21 and over</option>
		</select>
	</div>
	<div>
		<label for="addVenueForm-description">Description</label>
		<textarea id="addVenueForm-description" type="text" name="addVenueForm[description]" placeholder="Description"></textarea>
	</div>
	<div>
		<label for="addVenueForm-specialNotes">Special Notes</label>
		<textarea id="addVenueForm-specialNotes" type="text" name="addVenueForm[special_notes]" placeholder="Special Notes"></textarea>
	</div>
	<div>
		<label for="addVenueForm-contactEmail">Your Email</label>
		<div>
			<input id="addVenueForm-contactEmail" type="text" name="addVenueForm[contact_email]" placeholder="Email" data-validators="validate-email" <?php if ($_smarty_tpl->tpl_vars['loggedInMember']->value){?>value="<?php echo $_smarty_tpl->tpl_vars['loggedInMember']->value['email'];?>
"<?php }?> />
		</div>
		<div>If you leave this blank and we have questions about your venue, it will not be approved</div>
	</div>
	<div><button type="submit">Add Venue</button></div>
</form>
<script type="text/javascript" charset="utf-8">
function addInput() {
	var linkHtml = document.getElementById('webLinks-container').innerHTML;
	var webLinkContainer = document.getElementById('webLinks-container');
	webLinkContainer.insertAdjacentHTML('beforeend', "<div class='webLink-wrapper'><div><label>Url</label><input name='addVenueForm[url][]' type='url' placeholder='Url' data-validators='validate-url' /></div></div>");
};

</script><?php }} ?>