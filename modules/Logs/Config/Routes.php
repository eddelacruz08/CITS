<?php

$routes->group('activity%20logs', ['namespace' => 'Modules\Logs\Controllers'], function($routes)
{
    $routes->get('/', 'Logs::index');
    $routes->get('(:num)', 'Logs::index/$1');
});
