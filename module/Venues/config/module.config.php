<?php
return array(
	'controllers'	=> array(
		'invokables'	=> array(
			'Venues\Controller\Venues'		=> 'Venues\Controller\VenuesController'
		)
	),

	'router'	=> array(
		'routes'	=> array(
			'venues'	=> array(
				'type'		=> 'literal',
				'options'	=> array(
					'route'		=> '/venues',
					'defaults'	=> array(
						'controller'	=> 'Venues\Controller\Venues',
						'action'		=> 'venues'
					)
				),
				'may_terminate'	=>	false,
				'child_routes'	=> array(
					'search'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/search[/:eventId]',
							'defaults'	=> array(
								'action'		=> 'search'
							)
						),
						'may_terminate'	=>	true,
						'child_routes'	=>	array(
							'results'		=>	array(
								'type'		=>	'segment',
								'options'	=>	array(
									'route'		=>	'/results/:searchCriteria/:searchPhrase',
									'defaults'	=>	array(
										'action' => 'results'
									)
								)
							)
						)
					),
					'add'	=> array(
						'type'		=> 'literal',
						'options'	=> array(
							'route'		=> '/add',
							'defaults'	=> array(
								'action'		=> 'add'
							)
						)
					),
					'view'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/view[/:venueId]',
							'defaults'	=> array(
								'action'		=> 'view'
							)
						)
					),
					'review'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/review[/:venueId]',
							'defaults'	=> array(
								'action'		=> 'review'
							)
						)
					),
					'approve'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/approve[/:venueId]',
							'defaults'	=> array(
								'action'		=> 'approve'
							)
						)
					),
					'edit'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/edit[/:venueId]',
							'defaults'	=> array(
								'action'		=> 'edit'
							)
						)
					),
					'inactivate'	=> array(
						'type'		=> 'segment',
						'options'	=> array(
							'route'		=> '/inactivate[/:venueId]',
							'defaults'	=> array(
								'action'		=> 'inactivate'
							)
						)
					)
				)
			)
		)
	),

	'view_manager'	=> array(
	    'template_path_stack'	=> array(
	        __DIR__ . '/../view'
	    )
	)
);