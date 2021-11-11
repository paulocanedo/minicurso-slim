<?php

namespace encoinfo\minicurso\slim\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;


final class HomeAction {

    private $datetime;
    private $twig;

    public function __construct(\DateTime $datetime, \Slim\Views\Twig $twig) {
        $this->datetime = $datetime;
        $this->twig = $twig;
    }

    public function __invoke(Request $request, Response $response) {
        $agora = $this->datetime->format('Y-m-d\TH:i:s.u');

        return $this->twig->render($response, 'index.html', [
            'agora'=> $agora
        ]);
    }

}