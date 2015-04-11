<?php

return array(
    'db' => [
        'driver' => 'pdo',
        'dsn' => 'mysql:host=localhost;dbname=onlinemarket',
        'username' => 'root',
        'password' => 'root',
        'driver_options' => [
            'PDO::ATTR_ERRMODE'=> 'PDO::ERRMODE_EXCEPTION'
        ],        
    ],
    'service_manager' => [
        'factories' => [
            'general_adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
        ]
    ]
);
