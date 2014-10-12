<?php
return array(
	'controllers'	=> array(
		'invokables'	=> array(
			'Scraps\Controller\Scraps'	=> 'Scraps\Controller\ScrapsController'
		)
	),

	'router'	=> array(
		'routes'	=> array(
			'manage-scraps' => array(
				'type' => 'literal',
				'options' => array(
					'route'    => '/manage-scraps',
					'defaults' => array(
						'controller' => 'Scraps\Controller\Scraps',
						'action'     => 'manage-scraps'
					)
				),
				'may_terminate'	=> true,
				'child_routes'	=> array(
					'view' => array(
						'type' => 'segment',
						'options' => array(
							'route'    => '/:scrapId',
							'defaults' => array(
								'action'     => 'view'
							)
						),
					),
					'update' => array(
						'type' => 'segment',
						'options' => array(
							'route'    => '/:scrapId/:status',
							'defaults' => array(
								'action'     => 'update'
							)
						)
					),
//					'delete' => array(
//						'type' => 'segment',
//						'options' => array(
//							'route'    => '/delete/:scrapId',
//							'defaults' => array(
//								'action'     => 'delete'
//							)
//						)
//					),
					'archive' => array(
						'type' => 'segment',
						'options' => array(
							'route'    => '/archive/:scrapId',
							'defaults' => array(
								'action'     => 'archive'
							)
						)
					)
				)
			),
			'archived-scraps' => array(
				'type' => 'literal',
				'options' => array(
					'route'    => '/archived-scraps',
					'defaults' => array(
						'controller' => 'Scraps\Controller\Scraps',
						'action'     => 'archived-scraps'
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