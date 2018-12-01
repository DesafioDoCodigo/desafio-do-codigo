<?php
/**
 * Este é o arquivo de configurações para o Desafio do Código funcionar em seu servidor local.
 * Não altere o settings.template.php!
 * Copie ele para settings.php e então altere as configurações obrigatórias apenas, no caso "db" (Conexão com o Banco)
 */
return [
    'settings' => [
        // Ambiente (Só pode ser "dev", "test" ou "production") > Na sua máquina de programador, é "dev"
        "environment" => "dev",

        // Configurações do Slim
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,

        // Conexão com o Banco - REQUERIDO
        'db' => [
            'driver'   => 'pdo_mysql',
            'host'     => '',
            'port'     => '',
            'user'     => '',
            'pass' => '',
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

        // Configurações de integração com Mautic
        'mautic' => [
            'baseUrl' => '',
            'callback' => '',
            'clientKey' => '',
            'clientSecret' => '',
            'accessToken' => '',
            'accessSecret' => '',
            'version' => 'OAuth1a'
        ],


        // Configurações do rollbar, para logar todos os erros online
        'rollbar' => [
            'access_token' => '',
            'environment' => 'dev', // deve ser o mesmo do "environment" lá no alto
            'root' => __DIR__
        ]
    ],
];
