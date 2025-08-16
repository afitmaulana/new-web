<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// ... (bagian atas file)
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Grup rute untuk dashboard yang memerlukan login
$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('news', 'News::index');
    $routes->get('news/create', 'News::create');
});

// Rute untuk proses data (tetap perlu filter)
$routes->post('/news/store', 'News::store', ['filter' => 'auth']);
