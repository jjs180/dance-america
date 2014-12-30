<?php /* Smarty version Smarty-3.1-DEV, created on 2014-11-08 17:59:14
         compiled from "/Users/cara/Sites/dance_america/module/People/view/people/partials/_days-of-week.tpl" */ ?>
<?php /*%%SmartyHeaderCode:700083431545e4be2ae9087-69699619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08a41f3641c6fdbd6af2a4fe06498b19f9349d76' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/People/view/people/partials/_days-of-week.tpl',
      1 => 1395877535,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '700083431545e4be2ae9087-69699619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'repetition' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_545e4be2bed285_58797741',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545e4be2bed285_58797741')) {function content_545e4be2bed285_58797741($_smarty_tpl) {?><option selected='selected'></option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='day'){?>selected='selected'<?php }?> value="day">day</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Sunday'){?>selected='selected'<?php }?> value="Sunday">Sunday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Monday'){?>selected='selected'<?php }?> value="Monday">Monday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Tuesday'){?>selected='selected'<?php }?> value="Tuesday">Tuesday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Wednesday'){?>selected='selected'<?php }?> value="Wednesday">Wednesday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Thursday'){?>selected='selected'<?php }?> value="Thursday">Thursday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Friday'){?>selected='selected'<?php }?> value="Friday">Friday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Saturday'){?>selected='selected'<?php }?> value="Saturday">Saturday</option><?php }} ?>