<?php
return [
    'settings' => [
        // Slim settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,

        // DB Conection
        'db' => [
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'root',
            'dbname'   => 'pagaoseguro'
        ],

        // Twig Settings
        'view' => [
            'templatePath' => __DIR__ . '/src/View',
            'cachePath' => __DIR__ . '/../cache'
        ]
    ],
];
