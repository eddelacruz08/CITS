<?php

$routes->group('scan', ['namespace' => 'Modules\Scan\Controllers'], function($routes)
{
    $routes->match(['get', 'post'], '/', 'QrcodeAttendance::index');
    $routes->get('print-pdf/(:alphanum)', 'QrcodeAttendance::print_pdf/$1');
});
