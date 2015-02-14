<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-14 18:30:10
         compiled from "/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212144745554df840fc0add6-84175660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1e847a7c231274f6bbe32bc7b0dd729d2d39d25' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/edit.tpl',
      1 => 1423935007,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212144745554df840fc0add6-84175660',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54df840feae415_91937751',
  'variables' => 
  array (
    'venueModel' => 0,
    'websites' => 0,
    'website' => 0,
    'loggedInMember' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54df840feae415_91937751')) {function content_54df840feae415_91937751($_smarty_tpl) {?><h1>Edit the <?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
</h1>
<p>Edit the venue information below as necessary.</p>
<form id="editVenueForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/edit',array('venueId'=>$_smarty_tpl->tpl_vars['venueModel']->value['id'])); ?>" method="post">
	<div>
		<label for="editVenueForm-name" class='required'>Name of the Venue</label>
		<input id="editVenueForm-name" type="text" name="editVenueForm[name]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['name'];?>
" data-validators="required" />
	</div>
	<div>
		<label for="editVenueForm-type" class='required'>Venue Type</label>
		<select name="editVenueForm[type]" id="editVenueForm-type" data-validators="required" >
			<option value="Dance Studio" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['type']=='Dance Studio'){?>selected='selected'<?php }?>>Dance Studio</option>
			<option value="Bar" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['type']=='Bar'){?>selected='selected'<?php }?>>Bar</option>
			<option value="Other" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['type']=='Other'){?>selected='selected'<?php }?>>Other</option>
		</select>
	</div>
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
		<?php echo $_smarty_tpl->getSubTemplate ('./partials/_state-options-edit-venue.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div>
		<label for="editVenueForm-postalCode" class='required'>Postal Code</label>
		<input id="editVenueForm-postalCode" type="text" name="editVenueForm[postal_code]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['postal_code'];?>
" data-validators='required'/>
	</div>
	<div class='hidden'>
		<input id="editVenueForm-country" type="hidden" name="editVenueForm[country]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
" />
	</div>
	<!-- <div> -->
		<!-- <label for="editVenueForm-country" class='required'>Country</label> -->
			<!-- <?php echo $_smarty_tpl->getSubTemplate ('./../../../../../module/Application/view/application/partials/_state-options-list-generic.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 -->
	<!-- </div> -->
	<div id='webLinks-container'>
		<label for="editVenueForm-webLinks">Websites</label>
		<?php if ($_smarty_tpl->tpl_vars['venueModel']->value['web_links']){?>
			<?php $_smarty_tpl->tpl_vars['websites'] = new Smarty_variable(explode(";",$_smarty_tpl->tpl_vars['venueModel']->value['web_links']), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['website'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['website']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['websites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['website']->key => $_smarty_tpl->tpl_vars['website']->value){
$_smarty_tpl->tpl_vars['website']->_loop = true;
?>
				<div class='webLink-wrapper'>
					<div>
						<label>Url</label>
						<input name='editVenueForm[url][]' type="url" placeholder="link" data-validators='validate-url' value="<?php echo $_smarty_tpl->tpl_vars['website']->value;?>
" />
					</div>
				</div>
			<?php } ?>
		<?php }else{ ?>
			<div class='webLink-wrapper'>
				<div>
					<label>Url</label>
					<input name='editVenueForm[url][]' type="url" placeholder="link" data-validators='validate-url' />
				</div>
			</div>
		<?php }?>
	</div>
	<div>
		<a class='btn positive' onclick="addInput()" id='addWebLink-button'>Add another website</a>
	</div>
	<div>
		<label for="editVenueForm-description">Description</label>
		<textarea id="editVenueForm-description" type="text" name="editVenueForm[description]" value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['description'];?>
" placeholder='Description'><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['description'];?>
</textarea>
	</div>

	<div>
		<label for="editVenueForm-contactEmail">Your Email</label>
		<div>
			<input id="editVenueForm-contactEmail" type="email" name="editVenueForm[contact_email]" placeholder="Email" data-validators="validate-email" <?php if ($_smarty_tpl->tpl_vars['venueModel']->value['contact_email']){?>value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['contact_email'];?>
" <?php }else{ ?>value="<?php echo $_smarty_tpl->tpl_vars['loggedInMember']->value['email'];?>
"<?php }?> />
		</div>
		<div>If you leave this blank and we have questions about your venue, it will not be approved</div>
	</div>
	<div><button type="submit">Save</button></div>
</form>
<script type="text/javascript" charset="utf-8">
function addInput() {
	var webLinkContainer = document.getElementById('webLinks-container');
	webLinkContainer.insertAdjacentHTML('beforeend', "<div class='webLink-wrapper'><div><label>Url</label><input name='editVenueForm[url][]' type='url' placeholder='Url' data-validators='validate-url' /></div></div>");
};

</script><?php }} ?>