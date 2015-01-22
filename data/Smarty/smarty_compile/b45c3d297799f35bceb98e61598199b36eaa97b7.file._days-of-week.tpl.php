<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-08 17:48:39
         compiled from "/Users/cara/Sites/dance_america/module/Events/view/events/partials/_days-of-week.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2033020482545e4967051939-83485795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b45c3d297799f35bceb98e61598199b36eaa97b7' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Events/view/events/partials/_days-of-week.tpl',
      1 => 1395877535,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2033020482545e4967051939-83485795',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'repetition' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_545e4967191f39_36063993',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545e4967191f39_36063993')) {function content_545e4967191f39_36063993($_smarty_tpl) {?><option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} selected='selected'></option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='day'){?>selected='selected'<?php }?> value="day">day</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Sunday'){?>selected='selected'<?php }?> value="Sunday">Sunday</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Monday'){?>selected='selected'<?php }?> value="Monday">Monday</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Tuesday'){?>selected='selected'<?php }?> value="Tuesday">Tuesday</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Wednesday'){?>selected='selected'<?php }?> value="Wednesday">Wednesday</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Thursday'){?>selected='selected'<?php }?> value="Thursday">Thursday</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Friday'){?>selected='selected'<?php }?> value="Friday">Friday</option>
<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Saturday'){?>selected='selected'<?php }?> value="Saturday">Saturday</option><?php }} ?>