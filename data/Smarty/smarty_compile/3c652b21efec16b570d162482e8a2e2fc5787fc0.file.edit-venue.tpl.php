<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-09 17:41:46
         compiled from "/Users/cara/Sites/westie/module/Authentication/view/account/account/edit-venue.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139883423052f7afca5fee62-72116942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c652b21efec16b570d162482e8a2e2fc5787fc0' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Authentication/view/account/account/edit-venue.tpl',
      1 => 1391531647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139883423052f7afca5fee62-72116942',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'venueModel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f7afcabc4410_51110989',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f7afcabc4410_51110989')) {function content_52f7afcabc4410_51110989($_smarty_tpl) {?><script>
var count = 0;
function addInput() {
	document.getElementById('webLinks-container').innerHTML += "<div class='webLink-wrapper'><label>Type</label><input type='text' placeholder='Type of link (eg Facebook or Home Page)' name='editVenueForm[link_type]' data-validators='required' /><label>Url</label><input class='webLink' type='url' name='editVenueForm[link]' placeholder='Url' data-validators='validate-url' /></div>";
}
</script>

<h1>Edit the <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</h1>
<p>Edit the venue information below as necessary.</p>
<form id="editVenueForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('edit-venue'); ?>" method="post">
	<div>
		<label for="editVenueForm-name" class='required'>Name of the Venue</label>
		<input id="editVenueForm-name" type="text" name="editVenueForm[name]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
" data-validators="required" />
	</div>
	<div id='webLinks-container'>
		<label for="editVenueForm-webLinks">Web Links</label>
		<div class='webLink-wrapper'>
			<label>Type</label>
			<input type="text" placeholder="Type of link (eg Facebook or Home Page)" name='editVenueForm[link_type]' data-validators='required' />
			<label>Url</label>
			<input class="webLink" type="url" placeholder="Url" name='editVenueForm[link]' data-validators='validate-url' />
		</div
	<div>
	<div>
		<label for="editVenueForm-address1" class='required'>Address 1</label>
		<input id="editVenueForm-address1" type="text" name="editVenueForm[address_1]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_1'];?>
" data-validators="required" />
	</div>
	<div>
		<label for="editVenueForm-address2">Address 2</label>
		<input id="editVenueForm-address2" type="text" name="editVenueForm[address_2]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['address_2'];?>
" />
	</div>
	<div>
		<label for="editVenueForm-city" class='required'>City</label>
		<input id="editVenueForm-city" type="text" name="editVenueForm[city]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['city'];?>
" data-validators="required" />
	</div>
	<div>
		<label for="editVenueForm-state" class='required'>State/Province</label>
		<?php echo $_smarty_tpl->getSubTemplate ('./partials/_state-options-edit-venue.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<div>
		<label for="editVenueForm-postalCode" class='required'>Postal Code</label>
		<input id="editVenueForm-postalCode" type="text" name="editVenueForm[postal_code]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['postal_code'];?>
" data-validators="required" />
	</div>
	<div>
		<label for="editVenueForm-country" class='required'>Country</label>
		<?php echo $_smarty_tpl->getSubTemplate ('./partials/_country-options-edit-venue.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	<div>
		<label for="editVenueForm-type" class='required'>Venue Type</label>
		<select name="editVenueForm[type]" id="editVenueForm-type" data-validators="required" >
			<option value="Dance Studio" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['type']=='Dance Studio') {?>selected='selected'<?php }?>>Dance Studio</option>
			<option value="Bar" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['type']=='Bar') {?>selected='selected'<?php }?>>Bar</option>
			<option value="Other" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['type']=='Other') {?>selected='selected'<?php }?>>Other</option>
		</select>
	</div>
	<div>
		<label for="editVenueForm-minimumAge" class='required'>Minimum Age</label>
		<select name="editVenueForm[minimum_age]" id="editVenueForm-minimumAge" data-validators="required">
			<option value="None" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['minimum_age']=='None') {?>selected='selected'<?php }?>>None</option>
			<option value="18 and over" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['minimum_age']=='18 and over') {?>selected='selected'<?php }?>>18 and over</option>
			<option value="21 and over" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['minimum_age']=='21 and over') {?>selected='selected'<?php }?>>21 and over</option>
		</select>
	</div>
	<div>
		<label for="editVenueForm-description">Description</label>
		<textarea id="editVenueForm-description" type="text" name="editVenueForm[description]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['description'];?>
"></textarea>
	</div>
	<div>
		<label for="editVenueForm-specialNotes">Special Notes</label>
		<textarea id="editVenueForm-specialNotes" type="text" name="editVenueForm[special_notes]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['special_notes'];?>
"></textarea>
	</div>
	<div><button type="submit">Submit</button></div>
</form><?php }} ?>
