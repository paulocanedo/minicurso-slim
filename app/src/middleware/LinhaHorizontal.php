<?php
namespace encoinfo\minicurso\slim\middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

final class LinhaHorizontal {

    public function __construct() {
    
    }

    public function __invoke(Request $request, RequestHandler $handler): Response {
        $response = $handler->handle($request);

        $response->getBody()->write('<hr />');
        return $response;
    }

}