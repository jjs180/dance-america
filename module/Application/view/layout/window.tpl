<!DOCTYPE html>
<html lang='en'>
	{include 'layout/partials/_head.tpl'}
	<body>
		<div id='wrapper'>
			<div id='content'>
				{$this->nwFlashMessenger()}
				{$this->content}
			</div>
		</div>
	</body>
</html>