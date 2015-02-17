<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-17 01:57:30
         compiled from "/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1740198492545e49887fc7c7-19770780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03982a90fe04b08c9f7df231d6985b5a5914003f' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Venues/view/venues/venues/search.tpl',
      1 => 1424134649,
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
			<option value="name">Name</option>
			<option value="city">City</option>
			<option value="state">State</option>
			<option value="postal code">Postal Code</option>
		</select>
	</div>
	<div>
		<label for="searchVenuesForm-searchParam" class='required'>Name</label>
		<input id="searchVenuesForm-searchParam" type="text" name="searchVenuesForm[search_param]" placeholder="Search Phrase" data-validators="required" />
	</div>
	<div><button type="submit">Search</button></div>
</form>
<script type="text/javascript" charset="utf-8">
	selectCriteriaValue = $j('#searchVenuesForm-searchCriteria').val();
	
	function getValue() {
		return $j('#searchVenuesForm-searchCriteria').val();
	}

	function toTitleCase(str)
	{
		return str.replace(/\w\S*/g, function(txt){
			return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
		});
	}

	$j('#searchVenuesForm-searchCriteria').change(function() {
		selectCriteriaValue = getValue();
		var $inputSearchCriteria = $j("*[name='searchVenuesForm[search_param]']");
		var $searchLabel = $j("label[for='searchVenuesForm-searchParam']");
		$inputSearchCriteria.remove();
		if (selectCriteriaValue == 'state') {
			$searchLabel.text('State');
			$j.get( "/_state-options-search-venue.tpl", function(data) {
				$searchLabel.after(data);
			});
		} else if (selectCriteriaValue == 'name' || selectCriteriaValue == 'city' || selectCriteriaValue == 'postal code') {
			$searchLabel.text(toTitleCase(selectCriteriaValue));
			$j.get( '/_blank-input-options-search.tpl', function(data) {
				$searchLabel.after(data);
			});
		}
	});


</script><?php }} ?>