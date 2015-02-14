<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-11 08:26:28
         compiled from "/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1740198492545e49887fc7c7-19770780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03982a90fe04b08c9f7df231d6985b5a5914003f' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/search.tpl',
      1 => 1423639587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1740198492545e49887fc7c7-19770780',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_545e4988865809_39767815',
  'variables' => 
  array (
    'eventId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545e4988865809_39767815')) {function content_545e4988865809_39767815($_smarty_tpl) {?><h1>Enter the search criteria below</h1>
<form id="searchVenuesForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/search'); ?>" method="post">
	<?php if (($_smarty_tpl->tpl_vars['eventId']->value)){?>
		<input type="hidden" name="searchVenuesForm[event_id]" value="<?php echo $_smarty_tpl->tpl_vars['eventId']->value;?>
" />
	<?php }else{ ?><input type="hidden" name="searchVenuesForm[event_id]" value="0" />
	<?php }?>
	<div>
		<label for="searchVenuesForm-searchCriteria" class='required'>Search For Venue By</label>
		<select name="searchVenuesForm[search_criteria]" id="searchVenuesForm-searchCriteria" data-validators="required" >
			<option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value="name">Name</option>
			<option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value="city">City</option>
			<option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value="state">State</option>
			<option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value="postal code">Postal Code</option>
			<option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value="country">Country</option>
		</select>
	</div>
	<div>
		<label for="searchVenuesForm-searchParam" class='required'>Search Phrase</label>
		<input id="searchVenuesForm-searchParam" type="text" name="searchVenuesForm[search_param]" placeholder="Search Phrase" data-validators="required" />
	</div>
	<div><button type="submit">Search</button></div>
</form>
<script type="text/javascript" charset="utf-8">
	selectCriteriaValue = $j('#searchVenuesForm-searchCriteria').val();
	
	function getValue() {
		return $j('#searchVenuesForm-searchCriteria').val();
	}
	
	if (selectCriteriaValue == 'state') {
		$j("input[name='searchVenuesForm[search_param]']").remove();
		var stateFile = $j("input[name='searchVenuesForm[search_param]']").load('/_state-options-search-venue.tpl');
		var stateFileHtml = stateFile[0];
		
		$j("label[for='searchVenuesForm-searchParam']").after(stateFileHtml);
	} else if (selectCriteriaValue == 'country') {
		$j("input[name='searchVenuesForm[search_param]']").remove();
		var countryFile = $j("label[for='searchVenuesForm[search_param]']").load('/_country-options-search-venue.tpl');
		var countryFileHtml = countryFile[0];
		
		$j("label[for='searchVenuesForm-searchParam']").after(countryFileHtml).text("Country");
	}
	
	$j('#searchVenuesForm-searchCriteria').change(function() {
		selectCriteriaValue = getValue();
		if (selectCriteriaValue == 'state') {
			$j("input[name='searchVenuesForm[search_param]']").remove();
			var stateFile = $j("label[for='searchVenuesForm-searchParam']").load('/_state-options-search-venue.tpl');
			var stateFileHtml = stateFile[0];
			
			$j("label[for='searchVenuesForm-searchParam']").after(stateFileHtml);
		} else if (selectCriteriaValue == 'country') {
			$j("input[name='searchVenuesForm[search_param]']").remove();
			var countryFile = $j("label[for='searchVenuesForm-searchParam']").load('/_country-options-search-venue.tpl');
			var countryFileHtml = countryFile[0];
			
			$j("label[for='searchVenuesForm-searchParam']").after(countryFileHtml);
		} else if (selectCriteriaValue == 'name' || selectCriteriaValue == 'city' || selectCriteriaValue == 'postal code') {
			$j("input[name='searchVenuesForm[search_param]']").remove();
			var blankInputFile = $j("label[for='searchVenuesForm-searchParam']").load('/_blank-input-options-search.tpl');
			var blankInputFileHtml = blankInputFile[0];
			$j("label[for='searchVenuesForm-searchParam']").after(blankInputFileHtml);
		}
		
	});
</script><?php }} ?>