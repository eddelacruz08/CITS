<?php

$routes->group('health%20declaration', ['namespace' => 'Modules\HealthDeclaration\Controllers'], function($routes)
{
    $routes->get('/', 'HealthDeclaration::index');
    $routes->match(['get', 'post'], 'captures/(:num)', 'HealthDeclaration::capture_checklists/$1');
    $routes->get('starts/(:num)', 'HealthDeclaration::starts/$1');
    $routes->get('ends/(:num)/(:num)', 'HealthDeclaration::ends/$1/$2');
});

$routes->group('checklists', ['namespace' => 'Modules\Visits\Controllers'], function($routes)
{
    $routes->match(['get', 'post'], 'capture/(:num)', 'Checklist::capture_checklist/$1');
    $routes->match(['get', 'post'], 'attend', 'Checklist::attend_checklist');
    $routes->match(['get', 'post'], 'scan/(:num)', 'Checklist::scan_checklist/$1');
    $routes->match(['get', 'post'], 'edit/(:num)/(:num)', 'Checklist::edit_checklists/$1/$2');
});
