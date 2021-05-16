<?php

$routes->group('guest%20assessment', ['namespace' => 'Modules\GuestAssessment\Controllers'], function($routes)
{
    $routes->get('/', 'GuestAssessment::index');
    $routes->get('div_assess', 'GuestAssessment::div_assess');
    $routes->match(['get', 'post'], 'add', 'GuestAssessment::add_guest_assessment');
    // $routes->get('show/(:num)', 'GuestAssessment::show_guest/$1');//ito yung sa show
    $routes->match(['get', 'post'], 'edit/(:num)', 'GuestAssessment::edit_guest_assessment/$1');
    // $routes->match(['get', 'post'], 'add', 'GuestAssessment::add_guest_assessment');
    $routes->get('delete/(:num)', 'GuestAssessment::delete_guest_assessment/$1');
    // $routes->get('print/(:num)', 'GuestAssessment::print/$1');
});
