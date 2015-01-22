<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-18 01:29:41
         compiled from "/Users/cara/Sites/westie/module/Events/view/events/partials/_day-of-week.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2146117469532793752e0fc3-49927938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0c6de8f4a9f1dfb77d3f1c7259667e16b54e8b0' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Events/view/events/partials/_day-of-week.tpl',
      1 => 1395102106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2146117469532793752e0fc3-49927938',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_532793752e38d3_69119948',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532793752e38d3_69119948')) {function content_532793752e38d3_69119948($_smarty_tpl) {?><select name="addEventForm-dayOfWeek" id="addEventForm-dayOfWeek">
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="day">Day</option>
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Sunday">Sunday</option>
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Monday">Monday</option>
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Tuesday">Tuesday</option>
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Wednesday">Wednesday</option>
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Thursday">Thursday</option>
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Friday">Friday</option>
	<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="Saturday">Saturday</option>
</select><?php }} ?>