<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->group('', [['filter' => 'session']], function ($routes) {
    $routes->get('/', 'HomeController::home', ['filter' => \App\Filters\AccessFilter::class]);
    $routes->get('products', 'HomeController::listing',['filter' => \App\Filters\AccessFilter::class]);
    $routes->match(['get', 'post'], 'profile', 'HomeController::user_profile',['filter' => \App\Filters\AccessFilter::class]);
});

service('auth')->routes($routes);
