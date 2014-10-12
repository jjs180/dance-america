<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-27 01:04:08
         compiled from "/Users/cara/Sites/westie/module/Events/view/events/partials/_days-of-week.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3875106155327c907d8cac5-18791198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a15a6fe85f94f9e806c2afbdb03cb66995ff2c18' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Events/view/events/partials/_days-of-week.tpl',
      1 => 1395877535,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3875106155327c907d8cac5-18791198',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5327c907d8f929_93152769',
  'variables' => 
  array (
    'repetition' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5327c907d8f929_93152769')) {function content_5327c907d8f929_93152769($_smarty_tpl) {?><option selected='selected'></option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='day'){?>selected='selected'<?php }?> value="day">day</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Sunday'){?>selected='selected'<?php }?> value="Sunday">Sunday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Monday'){?>selected='selected'<?php }?> value="Monday">Monday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Tuesday'){?>selected='selected'<?php }?> value="Tuesday">Tuesday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Wednesday'){?>selected='selected'<?php }?> value="Wednesday">Wednesday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Thursday'){?>selected='selected'<?php }?> value="Thursday">Thursday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Friday'){?>selected='selected'<?php }?> value="Friday">Friday</option>
<option <?php if (isset($_smarty_tpl->tpl_vars['repetition']->value['day_of_week'])&&$_smarty_tpl->tpl_vars['repetition']->value['day_of_week']=='Saturday'){?>selected='selected'<?php }?> value="Saturday">Saturday</option><?php }} ?>