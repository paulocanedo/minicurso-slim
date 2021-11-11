<?php

namespace encoinfo\minicurso\slim\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;


final class HelloAction {

    public function __construct() {
    }

    public function __invoke(Request $request, Response $response, $name) {
        $response->getBody()->write("Hello, $name");
        return $response;
    }

}