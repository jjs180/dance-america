$('[data-toggle-display]').on('change', function() {
	if ($(this).val() && $(this).find('input:selected').data('display')) {
		alert('aaaaa');
	}
});
