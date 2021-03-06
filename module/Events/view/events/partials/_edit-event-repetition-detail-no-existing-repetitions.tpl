<div class='repetitionDetail-wrapper'>
	<div id='repetitionParameter-wrapper-0'>
		<select name="editEventForm[repetitions][0][repetition_parameter]" class="repetitionParameter" id="editEventForm-repetitionParameter-0" data-validators='required' onchange="changeRepetitionParameter(0)">
			<option value="one time event">One Time Event</option>
			<option value="years">Yearly</option>
			<option value="months">Monthly</option>
			<option value="weeks">Weekly</option>
			<option value="days">Every day</option>
		</select>
	</div>
	<div id='repetitionSpacing-wrapper-0' class='hidden'>
		<span>The event will repeat every</span>
		<input id="editEventForm-repetitionSpacing-0" type="text" name="editEventForm[repetitions][0][repetition_spacing]" value="1" data-validators="required" />
		<span id='repetitionFactor-wrapper-0'>weeks on</span>&nbsp;
	</div>
	<div>
		<select class='daysOfMonth-selector hidden' id="daysOfMonth-select-0" name="editEventForm[repetitions][0][day_of_month]" onchange="changeDayOfMonth(0)">
			{include './../partials/_days-of-month.tpl'}
		</select>
		<select class='daysOfWeek-selector hidden' id="daysOfWeek-select-0" name="editEventForm[repetitions][0][day_of_week]" onchange="changeDayOfWeek(0)">
			{include './../partials/_days-of-week.tpl'}	
		</select>
		<div class='monthsOfYear-wrapper hidden' id="monthsOfYear-select-0">
			in <select name="editEventForm[repetitions][0][month_of_year]" id="monthsOfYear-select-0" onchange="changeMonthOfYear(0)">
				{include './../partials/_months-of-year.tpl'}	
			</select>
		</div>
		<a onclick="deleteRepetition(0)" id='deleteRepetitionButton-0' class='btn negative deleteRepetitionButton' style='display:none;'>-</a>
	</div>
</div>
