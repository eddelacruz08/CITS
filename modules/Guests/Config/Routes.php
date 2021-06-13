<?php

$routes->group('guests', ['namespace' => 'Modules\Guests\Controllers'], function($routes)
{
    $routes->get('/', 'Guests::index');
    $routes->get('show/(:num)', 'Guests::show_guest/$1');//ito yung sa show
    $routes->get('print_summary/(:num)/(:num)', 'Guests::print_summary/$1/$2');
    $routes->match(['get', 'post'], 'print', 'Guests::print');
});

$routes->group('visits', ['namespace' => 'Modules\Guests\Controllers'], function($routes)
{
    $routes->get('(:num)', 'Visits::index/$1');
    $routes->get('start/(:num)', 'Visits::start/$1');
    $routes->get('end/(:num)/(:num)', 'Visits::end/$1/$2');
    $routes->get('delete/(:num)/(:num)', 'Visits::delete/$1/$2');
});
