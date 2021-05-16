<?php

$routes->group('profile', ['namespace' => 'Modules\Profile\Controllers'], function($routes)
{
    $routes->get('/', 'Profile::index');
    $routes->match(['get', 'post'], 'edit/(:num)', 'Profile::update_user/$1');
    $routes->get('update_user/(:num)', 'Profile::update_user/$1');
});
