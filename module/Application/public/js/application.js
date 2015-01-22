$j("select").on('change', function() {
	if ($j(this).attr('data-toggle-display')) {
		var container = $j(this).attr('data-toggle-display');
		var value = $j(this).val();
		if (value) {
			$j('#'+container + ' #'+value+'_wrapper').removeClass('hidden');
			$j('#'+container + ' #'+value+'_wrapper').siblings().each(function() {
				$j(this).addClass('hidden')
			});
		} else $j('#'+container).children().addClass('hidden');
	}
});
