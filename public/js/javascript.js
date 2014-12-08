// @codekit-prepend '../../vendor/markisacat/novumware-module/public/js/main.js'
// @codekit-prepend "jquery.js"
// @codekit-prepend "jquery.ui.js"
$j('[data-toggle-display]').on('change', function() {
	$j(this).on('click', function() {
		alert('aa');
	});
	if ($j(this).val() && $j(this).find('input:selected').data('display')) {
		alert('aaaaa');
	}

});

$j('form').on('click', function() {
	alert('aaa');
});