<?php
use Slim\Factory\AppFactory;
use Slim\Routing\RoutecollectorProxy;
use DI\ContainerBuilder;

require __DIR__ . '/../../vendor/autoload.php';

$builder = new ContainerBuilder();
$builder->addDefinitions(__DIR__ . '/container.php');
$container = $builder->build();

return $container->get(Slim\App::class);