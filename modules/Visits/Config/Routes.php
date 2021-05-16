<?php
$routes->group('visits', ['namespace' => 'Modules\Visits\Controllers'], function($routes)
{
    $routes->get('/', 'Visits::index');
  $routes->get('pdf', 'Visits::pdf');
    $routes->get('start/(:num)', 'Visits::start/$1');
    $routes->get('end/(:num)/(:num)', 'Visits::end/$1/$2');
});
$routes->group('checklists', ['namespace' => 'Modules\Visits\Controllers'], function($routes)
{
    $routes->match(['get', 'post'], 'capture/(:num)', 'Checklist::capture_checklist/$1');
    $routes->match(['get', 'post'], 'attend', 'Checklist::attend_checklist');
    $routes->match(['get', 'post'], 'scan/(:num)', 'Checklist::scan_checklist/$1');
    $routes->match(['get', 'post'], 'edit/(:num)/(:num)', 'Checklist::edit_checklists/$1/$2');
});
