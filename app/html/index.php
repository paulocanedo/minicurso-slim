<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Slim\Routing\RoutecollectorProxy;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Olá mundo do slimframework!");
    return $response;
});

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

$app->run();