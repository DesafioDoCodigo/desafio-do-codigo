<?php
// DIC configuration
$container = $app->getContainer();

//Smarty
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig($container['settings']['view']['templatePath'], [
        'cache' => $container['settings']['view']['cachePath']
    ]);
    
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

//Not Found
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        return $container->get('view')->render($response, '404.twig')->withStatus(404);
    };
};

//Database Connection
$container['db'] = function ($container) {
    // Mysql
    return '';
};