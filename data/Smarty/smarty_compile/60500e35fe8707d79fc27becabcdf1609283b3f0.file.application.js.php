<?php /* Smarty version Smarty-3.1-DEV, created on 2014-12-30 00:48:01
         compiled from "/Users/cara/Sites/dance_america/module/Application/public/js/application.js" */ ?>
<?php /*%%SmartyHeaderCode:5746553654a089055e8b27-72318229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60500e35fe8707d79fc27becabcdf1609283b3f0' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Application/public/js/application.js',
      1 => 1419896813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5746553654a089055e8b27-72318229',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54a089055f0f52_37232149',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a089055f0f52_37232149')) {function content_54a089055f0f52_37232149($_smarty_tpl) {?>$j("select").on('change', function() {
	if ($j(this).attr('data-toggle-display')) {
		var container = $j(this).attr('data-toggle-display');
		var value = $j(this).val();
		$j('#'+container + ' #'+value+'_wrapper').removeClass('hidden');
		$j('#'+container + ' #'+value+'_wrapper').siblings().each(function() {
					$j(this).addClass('hidden')
		});
	}
});
<?php }} ?>