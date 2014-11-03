<?php
return array(
	'controllers'	=> array(
		'invokables'	=> array(
			'People\Controller\People'		=> 'People\Controller\PeopleController'
		)
	),

	'router'	=> array(
		'routes'	=> array(
			'people'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/people',
					'defaults'	=> array(
						'controller'	=> 'People\Controller\People',
						'action'		=> 'index'
					)
				),
				'may_terminate'	=>	false,
				'child_routes'	=> array(
					'add'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/add',
							'defaults'	=> array(
								'action'		=> 'add'
							)
						)
					),
					'edit'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/edit[/:personId]',
							'defaults'	=> array(
								'action'		=> 'edit'
							)
						)
					),
					'review'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/review[/:personId]',
							'defaults'	=> array(
								'action'		=> 'review'
							)
						),
					),
					'approve'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/approve[/:personId]',
							'defaults'	=> array(
								'action'		=> 'approve'
							)
						)
					),
					'archive'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/archive[/:personId]',
							'defaults'	=> array(
								'action'		=> 'archive'
							)
						)
					),
					'renew'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/renew[/:personId]',
							'defaults'	=> array(
								'action'		=> 'renew'
							)
						)
					)
				)
			),

		)
	),

	'view_manager'	=> array(
	    'template_path_stack'	=> array(
	        __DIR__ . '/../view'
	    )
	)
);