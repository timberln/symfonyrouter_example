<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Loader\PhpFileLoader;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;

require 'vendor/autoload.php';
require 'routes.php';

$fileLocator = new FileLocator([__DIR__]);
$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());


$router = new Router(
    new PhpFileLoader($fileLocator),
    'routes.php',
    ['cache_dir' => __DIR__.'/cache'],
    $context
);
$route = $router->match($context->getPathInfo());




call_user_func([$route['controller'], $route['method']], []);

