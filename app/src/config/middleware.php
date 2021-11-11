<?php

return (
    function($app, $c) {
        $twig = $c->get(Slim\Views\Twig::class);
        $twigMiddleware = $c->get(Slim\Views\TwigMiddleware::class);

        $app->addRoutingMiddleware();
        $app->add($twigMiddleware);
        $app->addErrorMiddleware(true, true, true);
    }
);