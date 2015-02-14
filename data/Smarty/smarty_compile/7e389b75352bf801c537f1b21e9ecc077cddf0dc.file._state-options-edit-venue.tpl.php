<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-14 18:28:09
         compiled from "/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/partials/_state-options-edit-venue.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169420288654df840febe2f7-14999034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e389b75352bf801c537f1b21e9ecc077cddf0dc' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/partials/_state-options-edit-venue.tpl',
      1 => 1423934886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169420288654df840febe2f7-14999034',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54df8410053d17_01409471',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54df8410053d17_01409471')) {function content_54df8410053d17_01409471($_smarty_tpl) {?><select name="editVenueForm[state]" id="editVenueForm-state" data-validators='required'>
	<?php echo $_smarty_tpl->getSubTemplate ('./../../../../../../module/Application/view/application/partials/_state-options-list-generic.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</select><?php }} ?>