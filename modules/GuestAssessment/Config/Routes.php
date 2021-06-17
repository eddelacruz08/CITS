<?php

$routes->group('guest%20assessment', ['namespace' => 'Modules\GuestAssessment\Controllers'], function($routes)
{
    $routes->get('/', 'GuestAssessment::index');
    $routes->get('pdf/(:num)', 'GuestAssessment::pdf/$1');
    $routes->match(['get', 'post'], 'add', 'GuestAssessment::add_guest_assessment');
    $routes->get('edit/(:num)', 'GuestAssessment::edit_guest_assessment/$1');
    $routes->get('invalidate_guest/(:num)/(:num)', 'GuestAssessment::invalidate_guest/$1/$2');
    $routes->match(['get', 'post'], 'email_resend/(:num)', 'GuestAssessment::email_resend/$1');
});
