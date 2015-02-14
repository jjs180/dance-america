<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-14 18:21:20
         compiled from "/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/partials/_country-options-edit-venue.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164053124554df841006fb04-57924075%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '528ce62c9ea9686b0975c6481ea9c94f9e018f90' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/partials/_country-options-edit-venue.tpl',
      1 => 1420696598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164053124554df841006fb04-57924075',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'venueModel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54df8410137689_59982240',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54df8410137689_59982240')) {function content_54df8410137689_59982240($_smarty_tpl) {?><select name="editVenueForm[country]" id="editVenueForm-country" data-validators="required">
	<?php echo $_smarty_tpl->getSubTemplate ('./_country-options-list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
" selected='selected'><?php echo $_smarty_tpl->tpl_vars['venueModel']->value['country'];?>
</option>
</select><?php }} ?>