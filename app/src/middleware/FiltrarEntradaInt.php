<?php
namespace encoinfo\minicurso\slim\middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteContext;

final class FiltrarEntradaInt {

    public function __construct() {
    
    }

    public function __invoke(Request $request, RequestHandler $handler): Response {
        $routeContext = RouteContext::fromRequest($request);
        $route = $routeContext->getRoute();

        $numeroRaw = $route->getArgument('numero_raw');
        $numero = filter_var($numeroRaw, FILTER_SANITIZE_NUMBER_INT);

        $request = $request->withAttribute('numero', $numero);
        return $handler->handle($request);
    }

}