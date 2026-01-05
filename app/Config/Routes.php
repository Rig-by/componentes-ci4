<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal
$routes->get('/', 'Home::index');

// Rutas de demostración (cuando hagan el DemoController)
$routes->group('demo', function($routes) {
    $routes->get('/', 'DemoController::index');
    $routes->get('statistics', 'DemoController::statistics');
    $routes->get('tables', 'DemoController::tables');
    $routes->get('layout', 'DemoController::layout');
});
