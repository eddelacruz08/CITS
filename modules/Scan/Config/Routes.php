<?php

$routes->group('scan', ['namespace' => 'Modules\Scan\Controllers'], function($routes)
{
    $routes->match(['get', 'post'], '/', 'QrcodeAttendance::index');
});
