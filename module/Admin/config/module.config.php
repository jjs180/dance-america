<?php
return array(
	'controllers'	=> array(
		'invokables'	=> array(
			'Admin\Controller\Admin' => 'Admin\Controller\AdminController'
		)
	),

	'router'	=> array(
		'routes'	=> array(
			'admin'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/admin',
					'defaults'	=> array(
						'controller'	=> 'Admin\Controller\Admin',
						'action'		=> 'admin'
					)
				)
			),
			'manage-venues'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/manage-venues',
					'defaults'	=> array(
						'controller'	=> 'Admin\Controller\Admin',
						'action'		=> 'manage-venues'
					)
				),
				'may_terminate' => true,
				'child_routes'	=> array(
					'approve' => array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/approve/:venueId',
							'defaults'	=> array(
								'action'		=> 'approve-venue'
							)
						)
					),
					'reject' => array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/reject/:venueId',
							'defaults'	=> array(
								'action'		=> 'reject-venue'
							)
						)
					),
				)
			),
			'manage-events'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/manage-events',
					'defaults'	=> array(
						'controller'	=> 'Admin\Controller\Admin',
						'action'		=> 'manage-events'
					)
				),
				'may_terminate' => true,
				'child_routes'	=> array(
					'approve' => array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/approve/:eventId',
							'defaults'	=> array(
								'action'		=> 'approve-event'
							)
						)
					),
					'reject' => array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/reject/:eventId',
							'defaults'	=> array(
								'action'		=> 'reject-event'
							)
						)
					),
				)
			),
			'manage-people'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/manage-people',
					'defaults'	=> array(
						'controller'	=> 'Admin\Controller\Admin',
						'action'		=> 'manage-people'
					)
				),
				'may_terminate' => true,
				'child_routes'	=> array(
					'approve' => array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/approve/:personId',
							'defaults'	=> array(
								'action'		=> 'approve-person'
							)
						)
					),
					'reject' => array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/reject/:personId',
							'defaults'	=> array(
								'action'		=> 'reject-person'
							)
						)
					),
				)
			),
		)
	),

	'view_manager'	=> array(
	    'template_path_stack'	=> array(
	        __DIR__ . '/../view'
	    )
	),

	'maxnufsmarty' => array(
        'plugins' => array(
			__DIR__ . '/../src/Smarty/plugins'
        )
	)
);