<?php

$routes->group('guest%20assessment', ['namespace' => 'Modules\GuestAssessment\Controllers'], function($routes)
{
    $routes->get('/', 'GuestAssessment::index');
    $routes->get('load_table_assessment', 'GuestAssessment::load_table_assessment');
    $routes->get('pdf/(:num)', 'GuestAssessment::pdf/$1');
    $routes->get('print-assess-guest/(:num)', 'GuestAssessment::print_assess_guest/$1');
    $routes->get('print-invalidated-guest/(:num)', 'GuestAssessment::print_invalidated_guest/$1');
    $routes->match(['get', 'post'], 'add', 'GuestAssessment::add_guest_assessment');
    $routes->match(['get', 'post'], 'generate-assess-report-by-daterange', 'GuestAssessment::generate_assess_report_by_daterange');
    $routes->match(['get', 'post'], 'generate-assess-report-by-date', 'GuestAssessment::generate_assess_report_by_date');
    $routes->match(['get', 'post'], 'generate-invalidated-report-by-daterange', 'GuestAssessment::generate_invalidated_report_by_daterange');
    $routes->match(['get', 'post'], 'generate-invalidated-report-by-date', 'GuestAssessment::generate_invalidated_report_by_date');
    $routes->get('edit/(:num)', 'GuestAssessment::edit_guest_assessment/$1');
    $routes->get('invalidate-guest/(:num)/(:alphanum)', 'GuestAssessment::invalidate_guest/$1/$2');
    $routes->get('denied-invalidate-guest/(:num)/(:alphanum)', 'GuestAssessment::denied_invalidate_guest/$1/$2');
    $routes->match(['get', 'post'], 'email_resend/(:num)', 'GuestAssessment::email_resend/$1');
});
