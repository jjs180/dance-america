<?php
return array(
	'service_manager' => array(
		'factories' => array(
			'Authentication\Session' => function(){
				$mockAuthSession = \Mockery::mock('\NovumWare\Zend\Authentication\Storage\Session');
				return $mockAuthSession;
			},
			'Authentication\AuthAdapter' => function(){ return \Mockery::mock('\NovumWare\Zend\Authentication\Adapter'); }
		)
	)
);