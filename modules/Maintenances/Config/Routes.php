<?php
$routes->group('reasons', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Reasons::index');
    $routes->match(['get', 'post'], 'add', 'Reasons::add_reason');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Reasons::edit_reason/$1');
});

$routes->group('extensions', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Extensions::index');
    $routes->match(['get', 'post'], 'add', 'Extensions::add_extension');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Extensions::edit_extension/$1');
});

$routes->group('genders', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Genders::index');
    $routes->match(['get', 'post'], 'add', 'Genders::add_gender');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Genders::edit_gender/$1');
});

$routes->group('cities', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Cities::index');
    $routes->match(['get', 'post'], 'add', 'Cities::add_city');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Cities::edit_city/$1');
});

$routes->group('provinces', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Provinces::index');
    $routes->match(['get', 'post'], 'add', 'Provinces::add_province');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Provinces::edit_province/$1');
});
$routes->group('types', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Types::index');
    $routes->match(['get', 'post'], 'add', 'Types::add_type');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Types::edit_type/$1');
});
$routes->group('questions', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Questions::index');
    $routes->match(['get', 'post'], 'add', 'Questions::add_question');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Questions::edit_question/$1');
});
$routes->group('guidelines', ['namespace' => 'Modules\Maintenances\Controllers'], function($routes)
{
    $routes->get('/', 'Guidelines::index');
    $routes->match(['get', 'post'], 'add', 'Guidelines::add');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Guidelines::edit/$1');
    $routes->get('delete/(:num)', 'Guidelines::delete/$1');
});
