<div class='repetitionDetail-wrapper' id="repetitionDetail-wrapper-{$index}">
	<div id="repetitionParameter-wrapper-{$index}">
		<select name="editEventForm[repetitions][{$index}][repetition_parameter]" class="repetitionParameter" id="editEventForm-repetitionParameter-{$index}" data-validators='required' onchange="changeRepetitionParameter({$index})">
			<option {if $repetition.repetition_parameter=='years'}selected='selected'{/if} value="years">Yearly</option>
			<option {if $repetition.repetition_parameter=='months'}selected='selected'{/if} value="months">Monthly</option>
			<option {if $repetition.repetition_parameter=='weeks'}selected='selected'{/if} value="weeks">Weekly</option>
			<option {if $repetition.repetition_parameter=='days'}selected='selected'{/if} value="days">Every day</option>
			<option value="one time person">One time person</option>
		</select>
	</div>
	<div id='repetitionSpacing-wrapper-{$index}' class='repetitionSpacing-wrapper'>
		<span>The person will repeat every</span>
		<input id="editEventForm-repetitionSpacing-{$index}" type="text" name="editEventForm[repetitions][{$index}][repetition_spacing]" value="{$repetition.repetition_spacing}" data-validators="required" />
		<span id='repetitionFactor-wrapper-{$index}'>{$repetition.repetition_parameter} on</span>
	</div>
	<div>
		<select class='daysOfMonth-selector' name="editEventForm[repetitions][{$index}][day_of_month]" id="daysOfMonth-select-{$index}" style="{if $repetition.day_of_month != ''}display:inline-block;{else}display:none;{/if}" onchange="changeDayOfMonth({$index})">
			{include './_days-of-month.tpl'}
		</select>
		<select class='daysOfWeek-selector' name="editEventForm[repetitions][{$index}][day_of_week]" id="daysOfWeek-select-{$index}" style="{if $repetition.day_of_week != ''}display:inline-block;{else}display:none;{/if}" onchange="changeDayOfWeek({$index})">
			{include './_days-of-week.tpl'}	
		</select>
		<div id="monthsOfYear-wrapper-{$index}" style="{if $repetition.month_of_year != ''}display:inline-block;{else}display:none;{/if}">
			in <select name="editEventForm[repetitions][{$index}][month_of_year]" id="monthsOfYear-select-{$index}" onchange="changeMonthOfYear({$index})">
				{include './_months-of-year.tpl'}	
			</select>
		</div>
		<a onclick="deleteRepetition({$index})" id="deleteRepetitionButton-{$index}" class='btn negative deleteRepetitionButton' style='display:block;'>-</a>
	</div>
	<input type="hidden" name="editEventForm[repetitions][{$index}][id]" value="{$repetition.id}" />
</div>