<?php
namespace encoinfo\minicurso\slim\controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

final class ValidarNumeroController {

    public function __construct() {

    }

    public function validarNumero (Request $request, Response $response, string $numero_raw, string $numero) {
        $result = [
            'numero_filtrado' => $numero
        ];
        $response->getBody()->write(json_encode($result));

        return $response->withHeader('Content-Type', 'application/json');
    }

    public function validarNumeroFlutuante (Request $request, Response $response, string $numero_raw) {
        $numero = filter_var($numero_raw, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        $response->getBody()->write("<p>O número é $numero_raw</p>");
        $response->getBody()->write("<p>O número filtrado é $numero</p>");
        return $response;
    }

}