<?php /* Smarty version Smarty-3.1-DEV, created on 2015-02-05 08:14:17
         compiled from "/Users/cara/Sites/dance_america/module/Events/view/events/partials/_addEventScript.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1546806517545e49672fb451-62933061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dafe7f02cf13cf921a94c71705e08d07831bee80' => 
    array (
      0 => '/Users/cara/Sites/dance_america/module/Events/view/events/partials/_addEventScript.tpl',
      1 => 1420696598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1546806517545e49672fb451-62933061',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_545e49673392c1_91588725',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545e49673392c1_91588725')) {function content_545e49673392c1_91588725($_smarty_tpl) {?><script type="text/javascript" charset="utf-8">
function addInput() {
	var webLinkContainer = document.getElementById('webLinks-container');
	webLinkContainer.insertAdjacentHTML('beforeend', "<div class='webLink-wrapper'><div><label>Url</label><input type='url' name='addEventForm[url][]' placeholder='Url' data-validators='validate-url' /></div></div>");
};

function deleteRepetition(index) {
	$j('#deleteRepetitionButton-'+index).css('display', 'none');
	if ($j('.repetitionDetail-wrapper').length == 1) {
		$j('#addEventForm-repetitionSpacing-'+index).val('');
		$j('#daysOfMonth-select-'+index).val('');
		$j('#monthsOfYear-select-'+index).val('');
		$j('#daysOfWeek-select-'+index).val('');
	
		$j('#addEventForm-repetitionParameter-'+index).val('one time event');
		$j('#repetitionSpacing-wrapper-0').css('display', 'none');
		$j('#daysOfMonth-select-0').css('display', 'none');
		$j('#daysOfWeek-select-0').css('display', 'none');
		$j('#monthsOfYear-select-0').css('display', 'none');
		$j('#eventWillStop-wrapper').css('display', 'none');
		$j('#eventEndDate-wrapper').css('display', 'none');
		$j('.addRepetitionButton').css('display', 'none');
	} else $j('#repetitionDetail-wrapper-'+index).remove();
	
	if ($j('.repetitionDetail-wrapper').length == 1 && $j('.repetitionParameter') == 'one time event') $j('.addRepetitionButton').css('display', 'none');
}

$j('.addRepetitionButton').click(function() {
	var idNumber = parseInt($j(this).attr('id').substring(20, 22));
	index = idNumber+1;
	$j("<div class='repetitionDetail-wrapper' id='repetitionDetail-wrapper-"+index+"'><div id='repetitionParameter-wrapper-"+index+"'><select name='addEventForm[repetitions]["+index+"][repetition_parameter]' class='repetitionParameter' id='addEventForm-repetitionParameter-"+index+"' data-validators='required' onchange='changeRepetitionParameter("+index+")'><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='years'>Yearly</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='months'>Monthly</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='weeks'>Weekly</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='days'>Every day</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='one time event'>One time event</option></select></div><div id='repetitionSpacing-wrapper-"+index+"' class='repetitionSpacing-wrapper'><span>The event will repeat every</span> <input id='addEventForm-repetitionSpacing-"+index+"' type='text' name='addEventForm[repetitions]["+index+"][repetition_spacing]' data-validators='required' /> <span id='repetitionFactor-wrapper-"+index+"'>weeks on</span>&nbsp;</div> <div><select class='daysOfMonth-selector' name='addEventForm[repetitions]["+index+"][day_of_month]' id='daysOfMonth-select-"+index+"' onchange='changeDayOfMonth("+index+")'><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> selected='selected'></option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='last'>last</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='1'>1st</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='2'>2nd</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='3'>3rd</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='4'>4th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='5'>5th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='6'>6th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='7'>7th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='8'>8th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='9'>9th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='10'>10th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='11'>11th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='12'>12th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='13'>13th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='14'>14th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='15'>15th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='16'>16th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='17'>17th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='18'>18th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='19'>19th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='20'>20th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='21'>21st</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='22'>22nd</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='23'>23rd</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='24'>24th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='25'>25th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='26'>26th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='27'>27th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='28'>28th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='29'>29th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='30'>30th</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='31'>31st</option></select> <select class='daysOfWeek-selector' name='addEventForm[repetitions]["+index+"][day_of_week]' id='daysOfWeek-select-"+index+"' onchange='changeDayOfWeek("+index+")'><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> selected='selected'></option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='day'>day</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='Sunday'>Sunday</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='Monday'>Monday</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='Tuesday'>Tuesday</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='Wednesday'>Wednesday</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='Thursday'>Thursday</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='Friday'>Friday</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='Saturday'>Saturday</option></select> <div id='monthsOfYear-wrapper-"+index+"'>in <select name='addEventForm[repetitions]["+index+"][month_of_year]' id='monthsOfYear-select-"+index+"' onchange='changeMonthOfYear("+index+")'><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> selected='selected'></option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='1'>January</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='2'>February</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='3'>March</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='4'>April</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='5'>May</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='6'>June</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='7'>July</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='8'>August</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='9'>September</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='10'>October</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='11'>November</option><option <?php if ($_POST&&$_POST['siteSearchForm']['location']['state']=='CA'){?>selected='selected'<?php }?> value='12'>December</option></select></div> <a onclick='deleteRepetition("+index+")' id='deleteRepetitionButton-"+index+"' class='btn negative deleteRepetitionButton'>-</a></div></div>").insertAfter($j('.repetitionDetail-wrapper').last());
	$j('#repetitionSpacing-wrapper-'+index).css('display', 'none');
	$j('#deleteRepetitionButton-'+index).css('display', 'inline-block');
	$j('#repetitionSpacing-wrapper-'+index).css('display', 'inline-block');
	$j('#monthsOfYear-wrapper-'+index).css('display', 'inline-block');
	$j('#monthsOfYear-select-'+index).css('display', 'inline-block');
	$j('#daysOfWeek-select-'+index).css('display', 'inline-block');
	$j('#daysOfMonth-select-'+index).css('display', 'inline-block');
	$j('#repetitionFactor-wrapper-'+index).text(' years on the ');
	$j(this).attr('id', 'addRepetitionButton-'+index);
});

var peopleTypes = [];
indexForCost = 0;
$j('#addCost-button').click(function(){
	if ($j(this).text() == 'Click to put in cost details') {
		$j(this).text('Add more cost details');
		$j(this).attr('onclick', 'addCost()');
		$j('#costDetails-container').css('display', 'block');
	}
});

function addCost() {
	indexForCost = indexForCost + 1;
	var costDetailsWrapper = document.getElementById('costDetails-rhsWrapper');
	costDetailsWrapper.insertAdjacentHTML('beforeend', "<div><input type='text' name='addEventForm[costs]["+indexForCost+"][person_type]' class='person-type' placeholder='Type (eg members, non-members, etc)' /> pay $ <input type='text' name='addEventForm[costs]["+indexForCost+"][amount]' placeholder='Amount (USD)' data-validators='validate-numeric' /></div>");
}

$j('.addEventForm-cost').each(function() {
	costTypes = $j(this).val();
});

$j('#addEventForm-startDate').change(function() {
	var startDateValue = $j(this).val();
	$j('#addEventForm-endDate').attr('value', startDateValue);
});

$j('#addEventForm-startTime').change(function() {
	var startTimeValue = $j(this).val();
	$j('#addEventForm-endTime').attr('value', startTimeValue);
});


function changeRepetitionParameter(index) {
	var frequency = $j('#addEventForm-repetitionParameter-'+index).val();
	if (frequency != 'one time event') {
		$j('#eventWillStop-wrapper').css('display', 'block');
		$j('#eventEndDate-wrapper').css('display', 'none');
		$j('#deleteRepetitionButton-'+index).css('display', 'inline-block');
		$j('.addRepetitionButton').css('display', 'inline-block');
		if (frequency == 'days') {
			$j('#daysOfWeek-select-'+index).css('display', 'none');
			$j('#daysOfWeek-select-'+index).val('');
			$j('#daysOfMonth-select-'+index).css('display', 'none');
			$j('#daysOfMonth-select-'+index).val('');
			$j('#monthsOfYear-wrapper-'+index).css('display', 'none');
			$j('#monthsOfYear-select-'+index).val('');
			$j('#repetitionSpacing-wrapper-'+index).css('display', 'none');
		}else if (frequency == 'weeks') {
			$j('#repetitionSpacing-wrapper-'+index).css('display', 'inline-block');
			$j('#daysOfWeek-select-'+index).css('display', 'inline-block');
			$j('#daysOfMonth-select-'+index).css('display', 'none');
			$j('#monthsOfYear-wrapper-'+index).css('display', 'none');
			$j('#monthsOfYear-select-'+index).val('');
			$j('#repetitionFactor-wrapper-'+index).text('weeks on');
		}else if (frequency == 'months') {
			$j('#repetitionSpacing-wrapper-'+index).css('display', 'inline-block');
			$j('#daysOfWeek-select-'+index).css('display', 'inline-block');
			$j('#daysOfMonth-select-'+index).css('display', 'inline-block');
			$j('#monthsOfYear-select-'+index).val('');
			$j('#monthsOfYear-wrapper-'+index).css('display', 'none');
			$j('#repetitionFactor-wrapper-'+index).text('months on the');
		}else if (frequency == 'years') {
			$j('#repetitionSpacing-wrapper-'+index).css('display', 'inline-block');
			$j('#monthsOfYear-wrapper-'+index).css('display', 'inline-block');
			$j('#monthsOfYear-select-'+index).css('display', 'inline-block');
			$j('#daysOfWeek-select-'+index).css('display', 'inline-block');
			$j('#daysOfMonth-select-'+index).css('display', 'inline-block');
			$j('#repetitionFactor-wrapper-'+index).text('years on the');
		}
	} else {
		$j('.repetitionDetail-wrapper').each(function() {
			eachRepIdString = $j(this).children('div:first').attr('id');
			eachRepShortId = eachRepIdString.substring(28, 30);
			if (eachRepShortId != index && $j('.repetitionDetail-wrapper').length != 1) $j(this).remove();
			if ($j('.repetitionDetail-wrapper').length == 1) {
				$j('.repetitionSpacing-wrapper').css('display', 'none');
				$j('.daysOfMonth-selector').css('display', 'none');
				$j('.daysOfWeek-selector').css('display', 'none');
				$j('#monthsOfYear-wrapper-'+eachRepShortId).css('display', 'none');
				$j('.addRepetitionButton').css('display', 'none');
			}
			$j('#addRepetitionButton-'+index).css('display', 'none');
		});
		$j('#eventEndDate-wrapper').css('display', 'none');
		$j('.deleteRepetitionButton').css('display', 'none');
	}
}

var willStop = $j('#addEventForm-willStop').val();
$j('#addEventForm-willStop').change(function() {
	willStop = $j(this).val();
	console.log(willStop);
	if (willStop=='1') $j('#eventEndDate-wrapper').css('display', 'block');
	else  $j('#eventEndDate-wrapper').css('display', 'none');
});

	
function changeDayOfWeek(index) {
	var dayOfMonthSelection = $j('#daysOfMonth-select-'+index).val();
	var dayOfWeekSelection = $j('#daysOfWeek-select-'+index).val();
	var monthOfYearSelection = $j('#monthsOfYear-select-'+index).val();
	
	if (dayOfMonthSelection != '4' && dayOfMonthSelection != '3' && dayOfMonthSelection != '2' && dayOfMonthSelection !='1' && dayOfWeekSelection != 'day' && dayOfWeekSelection != '') {
		$j('#daysOfMonth-select-'+index).val('last');
	}
}

function changeDayOfMonth(index) {
	var dayOfMonthSelection = $j('#daysOfMonth-select-'+index).val();
	var dayOfWeekSelection = $j('#daysOfWeek-select-'+index).val();
	var monthOfYearSelection = $j('#monthsOfYear-select-'+index).val();
	
	if (dayOfMonthSelection != '4' && dayOfMonthSelection != '3' && dayOfMonthSelection != '2' && dayOfMonthSelection !='1' && dayOfWeekSelection != 'day' && dayOfWeekSelection != '') {
		$j('#daysOfWeek-select-'+index).val('day');
	}
}

$j('button').click(function() {
	var startDate = $j('#addEventForm-startDate').val();
	$j('#addEventForm-endDate').attr('value', startDate);
	$j('form').submit();
});
</script><?php }} ?>