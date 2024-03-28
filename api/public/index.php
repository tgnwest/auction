<?php

declare(strict_types=1);

use App\Http\Action\HomeAction;
use DI\Container;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Factory\AppFactory;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';

$builder = new DI\ContainerBuilder();

$builder->addDefinitions([
    'config' => [
//        'debug' => (bool)getenv('APP_DEBUG'),
        'debug' => true,
    ],
]);

$container = $builder->build();

$app = AppFactory::createFromContainer($container);

$app->addErrorMiddleware($container->get('config')['debug'], true, true);

$app->get('/', HomeAction::class);

$app->run();