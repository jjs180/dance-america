<?php
return array(
	'controllers' => array(
		'invokables' => array(
			'Authentication\Controller\Authentication'	=> 'Authentication\Controller\AuthenticationController',
			'Registration\Controller\Registration'		=> 'Registration\Controller\RegistrationController',
			'Account\Controller\Account'				=> 'Account\Controller\AccountController'
		)
	),

	'router' => array(
        'routes' => array(
			'login' => array(
				'type'	  => 'segment',
				'options' => array(
					'route'		  => '/login',
					'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
					'defaults' => array(
						'controller'	=> 'Authentication\Controller\Authentication',
						'action'		=> 'login'
					)
				)
			),
			'logout' => array(
				'type'	  => 'segment',
				'options' => array(
					'route'		  => '/logout',
					'defaults' => array(
						'controller'	=> 'Authentication\Controller\Authentication',
						'action'		=> 'logout'
					),
					'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
				)
			),
			'access-denied'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/access-denied',
					'defaults'	=> array(
						'controller'	=> 'Authentication\Controller\Authentication',
						'action'		=> 'access-denied'
					)
				)
			),
			'password'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/password',
					'defaults'	=> array(
						'controller'	=> 'Authentication\Controller\Authentication'
					)
				),
				'may_terminate'	=> false,
				'child_routes'	=> array(
					'forgot' => array(
						'type'		=> 'literal',
						'options'	=> array(
							'route'		=> '/forgot',
							'defaults'	=> array(
								'action'	=> 'forgot-password'
							)
						),
						'may_terminate'	=> true,
						'child_routes'	=> array(
							'thanks'	=> array(
								'type'		=> 'literal',
								'options'	=> array(
									'route'		=> '/thanks',
									'defaults'	=> array(
										'action'	=> 'forgot-password-thanks'
									)
								)
							)
						)
					),
					'reset'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/reset[/:email/:securityKey]',
							'defaults'	=> array(
								'action'	=> 'reset-password'
							)
						)
					)
				)
			),
			'register' => array(
				'type'	  => 'literal',
				'options' => array(
					'route'		  => '/register',
					'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
					'defaults' => array(
						'controller' => 'Registration\Controller\Registration',
						'action'	 => 'register'
					)
				),
				'may_terminate'	=> true,
				'child_routes'	=> array(
					'check-email-available'	=> array(
						'type'		=> 'literal',
						'options'	=> array(
							'route'		=> '/check-email-available',
							'defaults'	=> array(
								'action'	=> 'check-email-available'
							)
						)
					),
					'thanks' => array(
						'type'	  => 'segment',
						'options' => array(
							'route' => '/thanks/:email',
							'defaults' => array(
								'action'	 => 'thanks'
							)
						),
					),
					'verify-email' => array(
						'type'	  => 'segment',
						'options' => array(
							'route' => '/verify-email/:email/:securityKey',
							'defaults' => array(
								'action'	 => 'verify-email'
							)
						)
					),
					'verify-email-resend'	=> array(
						'type'	=> 'segment',
						'options'	=> array(
							'route'		=> '/verify-email-resend/:email',
							'defaults'	=> array(
								'action'	=> 'verify-email-resend'
							)
						)
					)
				)
			),
			'account' => array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/account',
					'defaults'	=> array(
						'controller'	=> 'Account\Controller\Account',
						'action'		=> 'account'
					)
				),
				'may_terminate'	=> true,
				'child_routes'	=> array(
					'my-events'	=> array(
						'type'		=> 'literal',
						'options'	=> array(
							'route'		=> '/my-events',
							'defaults'	=> array(
								'action'		=> 'my-events'
							)
						)
					),
					'my-venues'	=> array(
						'type'		=> 'literal',
						'options'	=> array(
							'route'		=> '/my-venues',
							'defaults'	=> array(
								'action'		=> 'my-venues'
							)
						)
					)
				)
			),
			'terms'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/terms',
					'defaults'	=> array(
						'controller'	=> 'Registration\Controller\Registration',
						'action'		=> 'terms'
					)
				)
			),
			'determine-user-status'	=> array(
				'type'		=> 'segment',
				'options'	=> array(
					'route'		=> '/determine-user-status/:type',
					'defaults'	=> array(
						'controller'	=> 'Registration\Controller\Registration',
						'action'		=> 'determine-user-status'
					)
				)
			)
        )
    ),

	'view_manager' => array(
	    'template_path_stack' => array(
	        __DIR__ . '/../view'
	    )
	),

	'service_manager' => array(
		'factories' => array(
			'Authentication\Session'		=> '\NovumWare\Zend\Authentication\Storage\SessionServiceFactory',
			'Authentication\AuthAdapter'	=> '\NovumWare\Zend\Authentication\AdapterServiceFactory'
		)
	)
);