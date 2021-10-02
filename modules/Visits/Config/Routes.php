<?php
$routes->group('visits', ['namespace' => 'Modules\Visits\Controllers'], function($routes)
{
    $routes->get('/', 'Visits::index');
    $routes->get('pdf', 'Visits::pdf');
    $routes->match(['get', 'post'], 'print', 'Visits::print');
});
$routes->group('checklists', ['namespace' => 'Modules\Visits\Controllers'], function($routes)
{
    $routes->match(['get', 'post'], 'requests/(:alphanum)', 'Checklist::requests/$1');
    $routes->match(['get', 'post'], 'edit/(:num)/(:num)', 'Checklist::edit_checklists/$1/$2');
});
