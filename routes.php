<?php

use App\Controllers\IndexController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$route = new Route(
    '/',
    ['controller' => IndexController::class, 'method'=> 'home'],
    [], // requirements
    [], // options
    'localhost', // host
    ['http'], // schemes
    ['GET'] // methods
);

$routes = new RouteCollection();
$routes->add('home_route', $route);

return $routes;