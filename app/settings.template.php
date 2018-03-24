<?php
/**
 * Este é o arquivo de configurações para o Desafio do Código funcionar em seu servidor local.
 * Altere as configurações obrigatórias apenas, no caso "db" (Conexão com o Banco)
 */
return [
    'settings' => [
        // Configurações do Slim
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,

        // Conexão com o Banco
        'db' => [
            'driver'   => 'pdo_mysql',
            'user'     => '',
            'password' => '',
            'dbname'   => ''
        ],

        // Configurações do Twig
        'view' => [
            'templatePath' => __DIR__ . '/src/View/',
            'cachePath' => __DIR__ . '/../cache/' // Use false para desativar o cache de templates
        ],

        // Configurações de marketing e tracking
        'tracking' => [
            'facebookPixel' => '',
            'googleAnalytics' => '',
            'mauticMtc' => ''
        ],
    ],
];
