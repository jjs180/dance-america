<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-23 22:36:55
         compiled from "/Users/cara/Sites/westie/module/Venues/view/venues/venues/partials/_country-options-edit-venue.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60693110552f516bbb97019-68957456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d1b094dda53adb22dd4d1147fc9d40343d8ca1e' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Venues/view/venues/venues/partials/_country-options-edit-venue.tpl',
      1 => 1394842144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60693110552f516bbb97019-68957456',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f516bbbbab65_04635050',
  'variables' => 
  array (
    'venueModel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f516bbbbab65_04635050')) {function content_52f516bbbbab65_04635050($_smarty_tpl) {?><select name="editVenueForm[country]" id="editVenueForm-country" data-validators="required">
	<?php echo $_smarty_tpl->getSubTemplate ('./_country-options-list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
" selected='selected'><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
</option>
</select><?php }} ?>