<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'market-controller-index' => 'Market\Controller\IndexController',
        	'market-controller-view' => 'Market\Controller\ViewController'
        ),
    	'factories' => array(
			'market-controller-post' => 'Market\Factory\PostControllerFactory'    	
    	),
    	'aliases' => [
    		'alt' => 'market-view-controller'
    	]
    ),
    'router' => array(
        'routes' => array(
        	'home' => array(
        		'type' => 'Literal',        		
        		'options' => array(
        			'route' => '/',
        			'defaults' => array(
        				'controller' => 'market-controller-index',
        				'action' => 'index'
        			)
        		)
        	),
        	'market' => array(
        		'type' => 'segment',
        		'options' => array(
        			'route' => '/market[/]',
        			'defaults' => array(
        				'controller' => 'market-controller-index',
        				'action' => 'index'
        			)
        		),
        		'may_terminate' => true,
        		'child_routes' => array(
        			'controller-view' => array(
        				'type' => 'segment',
        				'options' => array(
        					'route' => 'view[/]',
        					'defaults' => array(
        						'controller' => 'market-controller-view',
        						'action' => 'index'
        					)
        				),
        				'may_terminate' => true,
        				'child_routes' => array(
        					'default' => array(
        						'type' => 'segment',
        						'options' => array(
        							'route' => '[:action:][/:param]',
        							'defaults' => array('action' => 'item')
        						)
        					),
        					'main' => array(
        						'type' => 'segment',
        						'options' => array(
        							'route' => 'main[/[:param:]]',
        							'defaults' => array(
        								
        							)
        						)
        					)        					
        				)
        			),	
        			'controller-post' => array(
        				'type' => 'segment',
        				'options' => array(
        					'route' => 'post[/][:action:]',
        					'defaults' => array(
        						'controller' => 'market-controller-post',
        						'action' => 'index' 
        					)
        				)
        			)
        		)
        	)   
            /*'market' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/market',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        #'__NAMESPACE__' => 'Market\Controller',
                        'controller'    => 'market-index-controller',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),*/
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Market' => __DIR__ . '/../view',
        ),
    ),
);
