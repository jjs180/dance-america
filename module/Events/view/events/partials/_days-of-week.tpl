<option selected='selected'></option>
<option {if isset($repetition.day_of_week) && $repetition.day_of_week == 'day'}selected='selected'{/if} value="day">day</option>
<option {if isset($repetition.day_of_week) && $repetition.day_of_week == 'Sunday'}selected='selected'{/if} value="Sunday">Sunday</option>
<option {if isset($repetition.day_of_week) && $repetition.day_of_week == 'Monday'}selected='selected'{/if} value="Monday">Monday</option>
<option {if isset($repetition.day_of_week) && $repetition.day_of_week == 'Tuesday'}selected='selected'{/if} value="Tuesday">Tuesday</option>
<option {if isset($repetition.day_of_week) && $repetition.day_of_week == 'Wednesday'}selected='selected'{/if} value="Wednesday">Wednesday</option>
<option {if isset($repetition.day_of_week) && $repetition.day_of_week == 'Thursday'}selected='selected'{/if} value="Thursday">Thursday</option>
<option {if isset($repetition.day_of_week) && $repetition.day_of_week == 'Friday'}selected='selected'{/if} value="Friday">Friday</option>
<option {if isset($repetition.day_of_week) && $repetition.day_of_week == 'Saturday'}selected='selected'{/if} value="Saturday">Saturday</option>