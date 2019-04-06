<?php


// Rotas do Site
use App\Controller\AdminController;

$app->get('/', '\App\Controller\SiteController:indexAction')->setName('homeSite');

// Rotas do Desafio
$app->get('/desafio/', '\App\Controller\DesafioController:indexAction')->setName('homeDesafio');

// Rotas do Desafio
$app->group('/admin',function (){
    // Inicio
    $this->get('/', '\App\Controller\AdminController:indexAction')->setName('adminIndex');

    // Jornadas
    $this->group('/jornada', function(){
        $this->get('/', '\App\Controller\JornadaController:indexAction')->setName('jornadaIndex');
        $this->get('/incluir', '\App\Controller\JornadaController:addAction')->setName('jornadaAdd');
        $this->post('/incluir', '\App\Controller\JornadaController:addPostAction')->setName('jornadaPost');
        $this->get('/editar/{id}/', '\App\Controller\JornadaController:editAction')->setName('jornadaEdit');
        $this->post('/editar/{id}/', '\App\Controller\JornadaController:editPostAction')->setName('jornadaEdit');
        $this->get('/excluir/{id}/', '\App\Controller\JornadaController:deleteAction')->setName('jornadaDelete');
        // Trilhas em Jornada
        $this->get('/{id}/trilha/', '\App\Controller\JornadaController:listTrilhas')->setName('jornadaListTrilhas');
        $this->get('/{id}/trilha/incluir/', '\App\Controller\TrilhaController:addAction')->setName('jornadaTrilhaIncluir');
        $this->post('/{id}/trilha/incluir/', '\App\Controller\TrilhaController:addPostAction')->setName('jornadaTrilhaPost');
    });

    // Trilhas
    $this->group('/trilha', function(){
        $this->get('/', '\App\Controller\TrilhaController:indexAction')->setName('trilhaIndex');
        $this->get('/editar/{id}/', '\App\Controller\TrilhaController:editAction')->setName('trilhaEdit');
        $this->post('/editar/{id}/', '\App\Controller\TrilhaController:editPostAction')->setName('trilhaEdit');
        $this->get('/excluir/{id}/', '\App\Controller\TrilhaController:deleteAction')->setName('trilhaDelete');

        // Desafios em Trilhas
        $this->get('/{id}/desafio/', '\App\Controller\TrilhaController:listDesafios')->setName('trilhaListDesafios');
        $this->get('/{id}/desafio/incluir/', '\App\Controller\DesafioController:addAction')->setName('trilhaDesafioIncluir');
        $this->post('/{id}/desafio/incluir/', '\App\Controller\DesafioController:addPostAction')->setName('trilhaDesafioPost');
    });

    // Desafios
    $this->group('/desafio', function(){
        $this->get('/', '\App\Controller\DesafioController:indexAction')->setName('desafioIndex');
        $this->get('/editar/{id}/', '\App\Controller\DesafioController:editAction')->setName('desafioEdit');
        $this->post('/editar/{id}/', '\App\Controller\DesafioController:editPostAction')->setName('desafioEdit');
        $this->get('/excluir/{id}/', '\App\Controller\DesafioController:deleteAction')->setName('desafioDelete');
    });

    // Usuarios 
    $this->group('/usuario', function(){
        $this->get('/', '\App\Controller\UsuarioController:indexAction')->setName('usuarioIndex');
        $this->get('/incluir', '\App\Controller\UsuarioController:addAction')->setName('usuarioAdd');
        $this->post('/incluir', '\App\Controller\UsuarioController:addPostAction')->setName('usuarioPost');
        $this->get('/editar/{id}/', '\App\Controller\UsuarioController:editAction')->setName('usuarioEdit');
        $this->post('/editar/{id}/', '\App\Controller\UsuarioController:editPostAction')->setName('usuarioEdit');
        $this->get('/excluir/{id}/', '\App\Controller\UsuarioController:deleteAction')->setName('usuarioDelete');
    });

    // Sistema - rota de status
    $this->group('/sistema', function(){
        $this->get('/', '\App\Controller\SistemaController:indexAction')->setName('sistemaIndex');
    });

    // Rotas para lidar com sistema antigo, e migrações

    // Usuarios codewars - sistema antigo
    $this->group('/usuarioOld', function(){
        $this->get('/', '\App\Controller\UsuarioOldController:indexAction')->setName('usuarioOldIndex');
        $this->get('/incluir', '\App\Controller\UsuarioOldController:addAction')->setName('usuarioOldAdd');
        $this->post('/incluir', '\App\Controller\UsuarioOldController:addPostAction')->setName('usuarioOldPost');
        $this->get('/editar/{id}/', '\App\Controller\UsuarioOldController:editAction')->setName('usuarioOldEdit');
        $this->post('/editar/{id}/', '\App\Controller\UsuarioOldController:editPostAction')->setName('usuarioOldEdit');
        $this->get('/excluir/{id}/', '\App\Controller\UsuarioOldController:deleteAction')->setName('usuarioOldDelete');
    });
});

// Rotas de teste
$app->get('/teste/', '\App\Controller\TesteController:indexAction')->setName('testeIndex');

// Rotas de teste
$app->get('/cron/', '\App\Controller\CronController:indexAction')->setName('cronIndex');
$app->get('/cron/mautic/sync/', '\App\Controller\CronController:mauticSyncAction')->setName('cronMauticSync');