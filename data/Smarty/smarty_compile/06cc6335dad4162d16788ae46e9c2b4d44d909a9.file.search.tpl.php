<?php /* Smarty version Smarty-3.1-DEV, created on 2014-12-30 00:57:12
         compiled from "/Users/cara/Sites/dance_america/module/Application/view/application/index/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161406335654a1ea58afbe08-74177875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06cc6335dad4162d16788ae46e9c2b4d44d909a9' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Application/view/application/index/search.tpl',
      1 => 1419896909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161406335654a1ea58afbe08-74177875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'siteSearchParams' => 0,
    'param' => 0,
    'danceStyles' => 0,
    'danceStyle' => 0,
    'results' => 0,
    'key' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_54a1ea58be94c4_95020624',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54a1ea58be94c4_95020624')) {function content_54a1ea58be94c4_95020624($_smarty_tpl) {?><?php if (!$_POST){?>
	<form id = "siteSearchForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('search'); ?>" class="NWForm" method='POST'>
		<div>
			<label for="siteSearchForm-searchParam">What are you looking for?&nbsp;<span class="required">*</span></label>
			<select type="text" name="siteSearchForm[search_param]" data-validators="required" required>
				<?php  $_smarty_tpl->tpl_vars['param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['siteSearchParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['param']->key => $_smarty_tpl->tpl_vars['param']->value){
$_smarty_tpl->tpl_vars['param']->_loop = true;
?>
					<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
"><?php echo ucWords($_smarty_tpl->tpl_vars['param']->value);?>
</option>
				<?php } ?>
	 		</select>
		</div>
		<div>
			<label for="siteSearchForm-danceStyle">Dance Style</label>
			<select name="siteSearchForm[dance_style]" id="siteSearchForm-danceStyle">
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value=""></option>
				<?php  $_smarty_tpl->tpl_vars['danceStyle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['danceStyle']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['danceStyles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['danceStyle']->key => $_smarty_tpl->tpl_vars['danceStyle']->value){
$_smarty_tpl->tpl_vars['danceStyle']->_loop = true;
?>
					<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="<?php echo $_smarty_tpl->tpl_vars['danceStyle']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['danceStyle']->value['name'];?>
</option>
				<?php } ?>
			</select>
		</div>
		<div>
			<label for="siteSearchForm-locationType">Search for location by</label>
			<select name="siteSearchForm[location][type]" size="1" data-toggle-display='locationType_container' id="siteSearchForm-locationType" data-validators='required validate-notEmpty'>
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">--</option>
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="city_state" data-display='locationCity'>City/State</option>
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="postal_code" data-display='locationPostalCode'>Postal Code</option>
			</select>
		</div>
		<div id="locationType_container">
			<div class='hidden' id='city_state_wrapper'>
				<div>
					<label for="siteSearchForm-locationCity">City</label>
					<input id="siteSearchForm-locationCity" type="text" name="siteSearchForm[location][city]" placeholder="City" data-validators='validate-notEmpty' />
				</div>
				<div>
					<label for="siteSearchForm-locationState">State</label>
					<?php echo $_smarty_tpl->getSubTemplate ('../partials/_state-options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>
			</div>
			<div class='hidden' id='postal_code_wrapper'>
				<label for="siteSearchForm-locationPostalCode">Postal Code</label>
				<input id="siteSearchForm-locationPostalCode" type="text" name="siteSearchForm[location][postal_code]" placeholder="Postal Code" data-validators='validate-numeric validate-notEmpty' minLength='5' />
			</div>
		</div>
		<div>
			<label for="siteSearchForm-radius">Radius</label>
			<select name="siteSearchForm[radius]" size="1">
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="">--</option>
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="5">5 miles</option>
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="15">15 miles</option>
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="25">25 miles</option>
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="50">50 miles</option>
				<option {if $smarty.post && $smarty.post['siteSearchForm']['location']['state'] == 'CA'}selected='selected'{/if} value="100">100 miles</option>
			</select>
		</div>
		<div><button class='new btn'>Search</button></div>
	</form>
<?php }else{ ?>
<div>
	<div class="col-desktop-12">
		<?php if ($_smarty_tpl->tpl_vars['results']->value){?>
			<?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['result']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['results']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
$_smarty_tpl->tpl_vars['result']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['result']->key;
?>
				<div class='row'>
					<div class="col-desktop-1"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</div>
					<div class="col-desktop-11">
						<?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>

					</div>
				</div>
			<?php } ?>
		<?php }else{ ?>
		<?php }?>
	</div>
</div>
<?php }?>

<script>
	<?php echo $_smarty_tpl->getSubTemplate ('./../../../public/js/application.js', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	$j('button').click(function() {
		$j('form').submit();
	});
</script>
<?php }} ?>