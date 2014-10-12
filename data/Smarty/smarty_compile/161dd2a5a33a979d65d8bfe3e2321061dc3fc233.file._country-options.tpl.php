<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-15 01:09:09
         compiled from "/Users/cara/Sites/westie/module/Venues/view/venues/venues/partials/_country-options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175446553752f516f7eb90a3-09670584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '161dd2a5a33a979d65d8bfe3e2321061dc3fc233' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Venues/view/venues/venues/partials/_country-options.tpl',
      1 => 1394842146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175446553752f516f7eb90a3-09670584',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f516f7eceac8_70675585',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f516f7eceac8_70675585')) {function content_52f516f7eceac8_70675585($_smarty_tpl) {?><select name="addVenueForm[country]" id="addVenueForm-country" data-validators="required">
	<?php echo $_smarty_tpl->getSubTemplate ('./_country-options-list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</select><?php }} ?>