<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-04 16:07:33
         compiled from "/Users/cara/Sites/westie/module/Venues/view/venues/venues/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30687556752fad14033fb67-81348989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b69b8c8c1a12bd2c6877a27ad7e3a05de36ee43' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Venues/view/venues/venues/search.tpl',
      1 => 1401890843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30687556752fad14033fb67-81348989',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52fad1403638e5_62392430',
  'variables' => 
  array (
    'eventId' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fad1403638e5_62392430')) {function content_52fad1403638e5_62392430($_smarty_tpl) {?><h1>Enter the search criteria below</h1>
<form id="searchVenuesForm" class="NWForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('venues/search'); ?>" method="post">
	<?php if (($_smarty_tpl->tpl_vars['eventId']->value)){?>
		<input type="hidden" name="searchVenuesForm[event_id]" value="<?php echo $_smarty_tpl->tpl_vars['eventId']->value;?>
" />
	<?php }else{ ?><input type="hidden" name="searchVenuesForm[event_id]" value="0" />
	<?php }?>
	<div>
		<label for="searchVenuesForm-searchCriteria" class='required'>Search For Venue By</label>
		<select name="searchVenuesForm[search_criteria]" id="searchVenuesForm-searchCriteria" data-validators="required" >
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="name">Name</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="city">City</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="state">State</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="postal code">Postal Code</option>
			<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="country">Country</option>
		</select>
	</div>
	<div>
		<label for="searchVenuesForm-searchParam" class='required'>Search Phrase</label>
		<div id='searchParamInput-wrapper'>
			<input id="searchVenuesForm-searchParam" type="text" name="searchVenuesForm[search_param]" placeholder="Search Phrase" data-validators="required" />
		</div>
	</div>
	<div><button type="submit">Search</button></div>
</form>
<script type="text/javascript" charset="utf-8">
	selectCriteriaValue = $j('#searchVenuesForm-searchCriteria').val();
	
	function getValue() {
		return $j('#searchVenuesForm-searchCriteria').val();
	}
	
	if (selectCriteriaValue == 'state') {
		$j('#searchVenuesForm-searchParam').remove();
		var stateFile = $j('#searchParamInput-wrapper').load('/_state-options-search-venue.tpl');
		var stateFileHtml = stateFile[0];
		
		$j("#searchParamInput-wrapper").append(stateFileHtml);
	} else if (selectCriteriaValue == 'country') {
		$j('#searchVenuesForm-searchParam').remove();
		var countryFile = $j('#searchParamInput-wrapper').load('/_country-options-search-venue.tpl');
		var countryFileHtml = countryFile[0];
		
		$j("#searchParamInput-wrapper").append(countryFileHtml);
	}
	
	$j('#searchVenuesForm-searchCriteria').change(function() {
		selectCriteriaValue = getValue();
		if (selectCriteriaValue == 'state') {
			$j('#searchVenuesForm-searchParam').remove();
			var stateFile = $j('#searchParamInput-wrapper').load('/_state-options-search-venue.tpl');
			var stateFileHtml = stateFile[0];
			
			$j("#searchParamInput-wrapper").append(stateFileHtml);
		} else if (selectCriteriaValue == 'country') {
			$j('#searchVenuesForm-searchParam').remove();
			var countryFile = $j('#searchParamInput-wrapper').load('/_country-options-search-venue.tpl');
			var countryFileHtml = countryFile[0];
			
			$j("#searchParamInput-wrapper").append(countryFileHtml);
		} else if (selectCriteriaValue == 'name' || selectCriteriaValue == 'city' || selectCriteriaValue == 'postal code') {
			$j('#searchVenuesForm-searchParam').remove();
			var blankInputFile = $j('#searchParamInput-wrapper').load('/_blank-input-options-search.tpl');
			var blankInputFileHtml = blankInputFile[0];
			$j("#searchParamInput-wrapper").append(blankInputFileHtml);
		}
		
	});
</script><?php }} ?>