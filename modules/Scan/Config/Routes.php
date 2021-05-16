<?php

$routes->group('scan', ['namespace' => 'Modules\Scan\Controllers'], function($routes)
{
    $routes->get('/', 'QrcodeAttendance::index');
    $routes->match(['get', 'post'], 'add-scan', 'QrcodeAttendance::add_scan');
});
