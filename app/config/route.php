<?php
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;


return (function(Slim\App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write("Olá mundo do slimframework!");
        return $response;
    });

    $app->get('/validar-numero/{numero_raw}', function (Request $request, Response $response, array $args) {
        $numeroRaw = $args['numero_raw'];
        $numero = $request->getAttribute('numero');

        $response->getBody()->write("<p>O número é $numeroRaw</p>");
        $response->getBody()->write("<p>O número filtrado é $numero</p>");
        return $response;
    })->add(encoinfo\minicurso\slim\middleware\FiltrarEntradaInt::class);

    $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
    })->add(encoinfo\minicurso\slim\middleware\LinhaHorizontal::class);

    $app->add(function(Request $request, RequestHandler $handler) {
        $response = $handler->handle($request);

        $agora = date(date('Y-m-d H:i:s'));
        $response->getBody()->write("<p>Hora agora: $agora</p>");

        return $response;
    });
});