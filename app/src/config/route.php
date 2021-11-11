<?php
use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

return (function(App $app) {
    $app->get('/', encoinfo\minicurso\slim\action\HomeAction::class);
    
    $app->get('/validar-numero/{numero_raw}', [encoinfo\minicurso\slim\controller\ValidarNumeroController::class, 'validarNumero'])
        ->setName('rotaValidarNumero')
        ->add(encoinfo\minicurso\slim\middleware\FiltrarEntradaInt::class);

    $app->get('/validar-numero-flutuante/{numero_raw}', [encoinfo\minicurso\slim\controller\ValidarNumeroController::class, 'validarNumeroFlutuante']);

    $app->get('/hello/{name}', encoinfo\minicurso\slim\action\HelloAction::class)
        ->add(encoinfo\minicurso\slim\middleware\LinhaHorizontal::class);
});