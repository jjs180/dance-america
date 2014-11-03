<?php /* Smarty version Smarty-3.1-DEV, created on 2014-10-27 18:01:14
         compiled from "/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/partials/_country-options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:331094893544e7a5a9353f4-46704496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd18714fc9206a482d72697ed89cfd5ce6ba5ed95' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/partials/_country-options.tpl',
      1 => 1394842146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '331094893544e7a5a9353f4-46704496',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_544e7a5a93dff7_97544383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544e7a5a93dff7_97544383')) {function content_544e7a5a93dff7_97544383($_smarty_tpl) {?><select name="addVenueForm[country]" id="addVenueForm-country" data-validators="required">
	<?php echo $_smarty_tpl->getSubTemplate ('./_country-options-list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</select><?php }} ?>