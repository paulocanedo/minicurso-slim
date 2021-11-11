<?php
use Slim\App;
use Psr\Http\Message\ResponseFactoryInterface;
use DI\Container;

return [
    App::class => function(Container $c) {
        $app = DI\Bridge\Slim\Bridge::create($c);

        (require __DIR__ . '/middleware.php')($app);
        (require __DIR__ . '/route.php')($app);

        return $app;
    },

    ResponseFactoryInterface::class => function(Container $c) {
        return $c->get(Slim\Psr7\Factory\ResponseFactory::class);
    }
];