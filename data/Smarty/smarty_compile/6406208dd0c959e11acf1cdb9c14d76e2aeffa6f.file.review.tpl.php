<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-16 22:10:36
         compiled from "/Users/cara/Sites/dance_america/module/Events/view/events/events/review.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8796998454e25cb9c332b7-16704991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6406208dd0c959e11acf1cdb9c14d76e2aeffa6f' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Events/view/events/events/review.tpl',
      1 => 1424121035,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8796998454e25cb9c332b7-16704991',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54e25cb9d01375_21214094',
  'variables' => 
  array (
    'url' => 0,
    'eventModel' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54e25cb9d01375_21214094')) {function content_54e25cb9d01375_21214094($_smarty_tpl) {?><h1>Please review the event information below</h1>
<ul class='eventInformation-list'>
	<?php echo $_smarty_tpl->getSubTemplate ('./../partials/_eventInformation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</ul>
<div id='mapAndButton-wrapper'>
	<div><img src='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
' /></div>
	<div id='button-wrapper'>
		<?php if ($_smarty_tpl->tpl_vars['eventModel']->value['id']&&$_smarty_tpl->tpl_vars['eventModel']->value['status']!='suspended'){?>
			<a class='new btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/approve',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">Continue</a>
			<a id='editVenue-button' class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/edit',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">Go back</a>
		<?php }elseif($_smarty_tpl->tpl_vars['eventModel']->value['status']=='suspended'){?>
			<a class='btn positive' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/renew',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>x<strong></strong>">Renew event</a>
			<a class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/edit',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">Go back</a>
			<a class='btn negative' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/archive',array('eventId'=>$_smarty_tpl->tpl_vars['eventModel']->value['id'])); ?>">Remove event from site</a>
		<?php }else{ ?>
			<a class='new btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/approve'); ?>">Continue</a>
			<a id='editVenue-button' class='btn' href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/edit'); ?>">Go back</a>
		<?php }?>
	</div>
</div>
<?php }} ?>