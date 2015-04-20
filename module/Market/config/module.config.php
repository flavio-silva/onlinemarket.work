<?php

return array(
    'controllers' => array(
        'factories' => array(
            'market-controller-post' => 'Market\Factory\PostControllerFactory',
            'market-controller-index' => 'Market\Factory\IndexControllerFactory',
            'market-controller-view' => 'Market\Factory\ViewControllerFactory',
            'market-controller-delete' => 'Market\Factory\DeleteControllerFactory',
            'market-controller-city_country' => 'Market\Factory\CityCountryControllerFactory',
        ),
        'aliases' => [
            'alt' => 'market-view-controller'
        ]
    ),
    'service_manager' => array(
        'factories' => array(
            'market-post-form' => 'Market\Factory\PostFormFactory',
            'market-post-filter' => 'Market\Factory\PostFormFilterFactory',
            'listings-table' => 'Market\Factory\ListingsTableFactory',
	    'world_city_area_codes-table' => 'Market\Factory\WorldCityAreaCodesTableFactory',
            'market-delete-form' => 'Market\Factory\DeleteFormFactory',
            'market-delete-filter' => 'Market\Factory\DeleteFilterFactory',
            'market-city_country-form' => 'Market\Factory\CityCountryFormFactory',
            'market-city_country-filter' => 'Market\Factory\CityCountryFilterFactory'
        ),
        'services' => array(
            'days' => array(
                1,2,3,4,5
            )
        )
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
                                    'defaults' => array()
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
                    ),
                    'controller-delete' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => 'delete[/][:action:]',
                            'defaults' => array(
                                'controller' => 'market-controller-delete',
                                'action' => 'index'
                            )
                        )
                    ),
                    'controller-city_country' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => 'citycountry[/][:action]',
                            'defaults' => array(
                                'controller' => 'market-controller-city_country',
                                'action' => 'index'
                            )
                        )
                    )
                )
            )
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Market' => __DIR__ . '/../view',
        ),
    ),
);
