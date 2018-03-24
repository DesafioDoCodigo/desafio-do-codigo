<?php


// Rotas do Site
$app->get('/', '\App\Controller\SiteController:indexAction')->setName('homeSite');


// Rotas do Desafio
$app->get('/desafio/', '\App\Controller\DesafioController:indexAction')->setName('homeDesafio');

// Rotas de teste
$app->get('/teste/', '\App\Controller\TesteController:indexAction')->setName('testeIndex');