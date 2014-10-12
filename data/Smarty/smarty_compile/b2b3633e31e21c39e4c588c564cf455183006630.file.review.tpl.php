<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-25 18:31:44
         compiled from "/Users/cara/Sites/westie/module/Events/view/events/events/review.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191297872852f57916bdc6f6-20233141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2b3633e31e21c39e4c588c564cf455183006630' => 
    array (
      0 => '/Users/cara/Sites/westie/module/Events/view/events/events/review.tpl',
      1 => 1398443461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191297872852f57916bdc6f6-20233141',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_52f579171110d6_91384893',
  'variables' => 
  array (
    'url' => 0,
    'eventModel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f579171110d6_91384893')) {function content_52f579171110d6_91384893($_smarty_tpl) {?><h1>Please review the event information below</h1>
<ul id='eventInformation-list' class='eventInformation-list'>
	<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_eventInformation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</ul>
<div id='mapAndButton-wrapper'>
	<div><img src='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
' /></div>
	<div id='button-wrapper'>
		<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['id']&&$_smarty_tpl->tpl_vars['eventModel']->value['status']!='suspended'){?>
			<a class='new btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/approve',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">The information looks correct</a>
			<a id='editVenue-button' class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/edit',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">I need to change some of the information</a>
		<?php }elseif($_smarty_tpl->tpl_vars['eventModel']->value['status']=='suspended'){?>
			<a class='btn positive' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/renew',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">Renew event</a>
			<a class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/edit',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">I need to change some of the information</a>
			<a class='btn negative' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/archive',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">Remove event from site</a>
		<?php }else{ ?>
			<a class='new btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/approve'); ?>">The information looks correct</a>
			<a id='editVenue-button' class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/edit'); ?>">I need to change some of the information</a>
		<?php }?>
	</div>
</div>
<?php }} ?>