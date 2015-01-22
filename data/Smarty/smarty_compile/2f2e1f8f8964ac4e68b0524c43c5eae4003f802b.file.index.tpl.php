<?php /* Smarty version Smarty-3.1-DEV, created on 2015-01-13 08:21:24
         compiled from "/Users/cara/Sites/dance_america/module/Application/view/application/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1230976164544a6d85b56296-69825588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f2e1f8f8964ac4e68b0524c43c5eae4003f802b' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Application/view/application/index/index.tpl',
      1 => 1421133681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1230976164544a6d85b56296-69825588',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_544a6d85df7b37_26144463',
  'variables' => 
  array (
    'siteSearchParams' => 0,
    'param' => 0,
    'danceStyles' => 0,
    'danceStyle' => 0,
    'results' => 0,
    'result' => 0,
    'count' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544a6d85df7b37_26144463')) {function content_544a6d85df7b37_26144463($_smarty_tpl) {?><div class='<?php if (!$_POST){?>column-desktop-12 column-tablet-12<?php }else{ ?>column-desktop-6 column-tablet-6<?php }?>'>
	<form id = "siteSearchForm" action="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('home'); ?>" class="NWForm" method='POST'>
		<div>
			<label for="siteSearchForm-searchParam">What are you looking for?&nbsp;<span class="required">*</span></label>
			<select type="text" name="siteSearchForm[search_param]" data-validators="required" required>
				<option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value="">--</option>
				<?php  $_smarty_tpl->tpl_vars['param'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['param']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['siteSearchParams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['param']->key => $_smarty_tpl->tpl_vars['param']->value){
$_smarty_tpl->tpl_vars['param']->_loop = true;
?>
				<option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" <?php if ($_POST&&$_POST['siteSearchForm']['search_param']==$_smarty_tpl->tpl_vars['param']->value){?>selected='selected'<?php }?>><?php echo $_smarty_tpl->tpl_vars['param']->value;?>
</option>
				<?php } ?>
	 		</select>
		</div>
		<div>
			<label for="siteSearchForm-danceStyle">Dance Style</label>
			<select name="siteSearchForm[dance_style]" id="siteSearchForm-danceStyle">
				<option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value="">--</option>
				<?php  $_smarty_tpl->tpl_vars['danceStyle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['danceStyle']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['danceStyles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['danceStyle']->key => $_smarty_tpl->tpl_vars['danceStyle']->value){
$_smarty_tpl->tpl_vars['danceStyle']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['danceStyle']->value['name'];?>
" <?php if ($_POST&&$_POST['siteSearchForm']['dance_style']==$_smarty_tpl->tpl_vars['danceStyle']->value['name']){?>selected='selected'<?php }?>><?php echo $_smarty_tpl->tpl_vars['danceStyle']->value['name'];?>
</option>
				<?php } ?>
			</select>
		</div>
		<div>
			<label for="siteSearchForm-locationType">Search for location by</label>
			<select name="siteSearchForm[location][type]" size="1" data-toggle-display='locationType_container' id="siteSearchForm-locationType" data-validators='validate-notEmpty'>
				<option value="" selected='selected'>--</option>
				<option value="city_state" data-display='locationCity' <?php if ($_POST&&$_POST['siteSearchForm']['location']['type']=='city_state'){?> selected='selected'<?php }?>>City/State</option>
				<option value="postal_code" data-display='locationPostalCode' <?php if ($_POST&&$_POST['siteSearchForm']['location']['type']=='postal_code'){?>selected='selected'<?php }?>>Postal Code</option>
			</select>
		</div>
		<div id="locationType_container">
			<div class="<?php if ($_POST&&$_POST['siteSearchForm']['location']['type']!==' '&&$_POST['siteSearchForm']['location']['type']!=='city_state'||!$_POST){?>hidden<?php }?>" id='city_state_wrapper'>
				<div>
					<label for="siteSearchForm-locationCity">City</label>
					<input id="siteSearchForm-locationCity" type="text" name="siteSearchForm[location][city]" placeholder="City" data-validators='validate-notEmpty' value="<?php if ($_POST){?><?php echo $_POST['siteSearchForm']['location']['city'];?>
<?php }?>" />
				</div>
				<div>
					<label for="siteSearchForm-locationState">State</label>
					<?php echo $_smarty_tpl->getSubTemplate ('../partials/_state-options.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>
			</div>
			<div class="<?php if ($_POST&&$_POST['siteSearchForm']['location']['type']!==' '&&$_POST['siteSearchForm']['location']['type']!=='postal_code'||!$_POST){?>hidden<?php }?>" id='postal_code_wrapper'>
				<label for="siteSearchForm-locationPostalCode">Postal Code</label>
				<input id="siteSearchForm-locationPostalCode" type="text" name="siteSearchForm[location][postal_code]" placeholder="Postal Code" data-validators="<?php if ($_POST&&$_POST['siteSearchForm']['location']['type']=='postal_code'){?>required <?php }?>validate-numeric validate-notEmpty" minLength='5' value="<?php if ($_POST){?><?php echo $_POST['siteSearchForm']['location']['postal_code'];?>
<?php }?>" <?php if ($_POST&&$_POST['siteSearchForm']['location']['type']=='postal_code'){?>required<?php }?> />
			</div>
		</div>
		<div>
			<label for="siteSearchForm-radius">Radius</label>
			<select name="siteSearchForm[radius]" size="1">
				<option <?php if ($_POST&&$_POST['siteSearchForm']['radius']==''||!$_POST){?>selected='selected'<?php }?> value="">--</option>
				<option <?php if ($_POST&&$_POST['siteSearchForm']['radius']=='5'){?>selected='selected'<?php }?> value="5">5 miles</option>
				<option  <?php if ($_POST&&$_POST['siteSearchForm']['radius']=='15'){?>selected='selected'<?php }?> value="15">15 miles</option>
				<option  <?php if ($_POST&&$_POST['siteSearchForm']['radius']=='25'){?>selected='selected'<?php }?> value="25">25 miles</option>
				<option  <?php if ($_POST&&$_POST['siteSearchForm']['radius']=='50'){?>selected='selected'<?php }?> value="50">50 miles</option>
				<option  <?php if ($_POST&&$_POST['siteSearchForm']['radius']=='100'){?>selected='selected'<?php }?> value="100">100 miles</option>
			</select>
		</div>
		<div><label></label><input class='btn' type='submit' value="Submit"></div>
	</form>
	<script>
		<?php echo $_smarty_tpl->getSubTemplate ('./../../../public/js/application.js', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		$j('input[type=submit]').click(function() {
			$j('form').submit();
		});
	</script>
</div>
<?php if ($_POST){?>
	<div class='column-tablet-6 column-desktop-6'>
		<?php if ($_smarty_tpl->tpl_vars['results']->value){?>
			<ul>
				<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(0, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['result'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['result']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['results']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['result']->key => $_smarty_tpl->tpl_vars['result']->value){
$_smarty_tpl->tpl_vars['result']->_loop = true;
?>
					<div class='panel'>
						<h1 class='row'><div class=" column-desktop-11 column-tablet-11"><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
</div><a  class="column-desktop-1 column-tablet-1 pull-right" href="<?php echo $_smarty_tpl->smarty->registered_objects['zf'][0]->url('events/view',array('venueId'=>$_smarty_tpl->tpl_vars['result']->value['venue']['id'])); ?>" ><i class='icon-chevron-right icon'></i></a></h1>
						<div>
							<p>
								<?php echo $_smarty_tpl->tpl_vars['result']->value['venue']['address_1'];?>
<br />
								<?php if ($_smarty_tpl->tpl_vars['result']->value['venue']['address_2']){?><?php echo $_smarty_tpl->tpl_vars['result']->value['venue']['address_2'];?>
<br /><?php }?>
								<?php echo $_smarty_tpl->tpl_vars['result']->value['venue']['city'];?>
, <?php echo $_smarty_tpl->tpl_vars['result']->value['venue']['state'];?>
 <?php echo $_smarty_tpl->tpl_vars['result']->value['venue']['postal_code'];?>
<br />
								<?php if ($_smarty_tpl->tpl_vars['result']->value['description']){?>
									<div>Description: <?php echo $_smarty_tpl->tpl_vars['result']->value['description'];?>
</div>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['result']->value['special_notes']){?>
									<div>Special Notes: <?php echo $_smarty_tpl->tpl_vars['result']->value['special_notes'];?>
</div>
								<?php }?>
							</p>
						</div>
					</div>
						<!-- <div>
							<h2><?php echo $_smarty_tpl->tpl_vars['result']->value['venue']['name'];?>
</h2>
						</div>
						<div class='description-container'>
						</div> -->
				<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count']->value+1, null, 0);?>
				<?php } ?>
			</ul>
		<?php }else{ ?>
			<p>Sorry, but it appears that we could not find anything matching your criteria.</p>
		<?php }?>
	</div>
<?php }?><?php }} ?>