<?php
use Slim\App;
use DI\Container;
use Slim\Views\Twig;

return [
    App::class => function (Container $c) {
        $app = DI\Bridge\Slim\Bridge::create($c);
        (require __DIR__ . '/middleware.php')($app, $c);
        (require __DIR__ . '/route.php')($app);

        return $app;
    },

    Psr\Http\Message\ResponseFactoryInterface::class => function (Container $c) {
        return $c->get(Slim\Psr7\Factory\ResponseFactory::class);
    },

    Twig::class => function(Container $c) {
        $twig = Twig::create(__DIR__ . '/../../templates', ['cache' => false]);

        return $twig;
    },

    Slim\Views\TwigMiddleware::class => function(Container $c) {
        return Slim\Views\TwigMiddleware::create($c->get(App::class), $c->get(Twig::class));
    }
];