<?php /* Smarty version Smarty-3.1-DEV, created on 2014-02-08 17:18:37
         compiled from "/Users/cara/Sites/westie/module/Venues/view/venues/venues/search-venues.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207880053552f58494f2b363-33693858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a297f0a5435ffd135513ecb5479660192de8967c' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Venues/view/venues/venues/search-venues.tpl',
      1 => 1391875985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207880053552f58494f2b363-33693858',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f5849509f9f1_34607533',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f5849509f9f1_34607533')) {function content_52f5849509f9f1_34607533($_smarty_tpl) {?><form id="searchVenuesForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('search-venues/results'); ?>" method="post">
	<div>
		<label for="searchVenuesForm-searchCriteria" class='required'>Search Criteria</label>
		<select name="searchVenuesForm[search_criteria]" id="searchVenuesForm-searchCriteria" data-validators="required" >
			<option value="name">Name</option>
			<option value="city">City</option>
			<option value="state">State</option>
			<option value="postal code">Postal Code</option>
			<option value="country">Country</option>
		</select>
	</div>
	// TODO update search phrase IF search criteria is state or postal code
	<div>
		<label for="searchVenuesForm-searchParam" class='required'>Search Phrase</label>
		<input id="searchVenuesForm-searchParam" type="text" name="searchVenuesForm[search_param]" placeholder="Search Phrase" data-validators="required" />
	</div>
	<div><button type="submit">Search</button></div>
</form><?php }} ?>
