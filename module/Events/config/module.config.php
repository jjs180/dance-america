<?php
return array(
	'controllers'	=> array(
		'invokables'	=> array(
			'Events\Controller\Events'		=> 'Events\Controller\EventsController'
		)
	),

	'router'	=> array(
		'routes'	=> array(
			'events'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/events',
					'defaults'	=> array(
						'controller'	=> 'Events\Controller\Events',
						'action'		=> 'events'
					)
				),
				'may_terminate'	=>	false,
				'child_routes'	=> array(
					'add'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/add[/:venueId]',
							'defaults'	=> array(
								'action'		=> 'add'
							)
						)
					),
					'edit'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/edit[/:eventId]',
							'defaults'	=> array(
								'action'		=> 'edit'
							)
						)
					),
					'review'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/review[/:eventId]',
							'defaults'	=> array(
								'action'		=> 'review'
							)
						),
					),
					'approve'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/approve[/:eventId]',
							'defaults'	=> array(
								'action'		=> 'approve'
							)
						)
					),
					'archive'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/archive[/:eventId]',
							'defaults'	=> array(
								'action'		=> 'archive'
							)
						)
					),
					'renew'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/renew[/:eventId]',
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