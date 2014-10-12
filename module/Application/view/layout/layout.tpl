<!DOCTYPE html>
<html lang='en'>
	{include 'layout/partials/_head.tpl'}
	<body>
		{include 'layout/partials/_header.tpl'}
		<div id='content'>
			{$this->nwFlashMessenger()}
			{$this->content}
		</div>
	</body>
</html>