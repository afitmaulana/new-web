<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Grup rute untuk dashboard yang memerlukan login
$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');
    
    // Rute Berita
    $routes->get('news', 'News::index');
    $routes->get('news/create', 'News::create');
    $routes->get('news/edit/(:num)', 'News::edit/$1');
    $routes->post('news/store', 'News::store');
    $routes->post('news/update/(:num)', 'News::update/$1');
    $routes->post('news/delete/(:num)', 'News::delete/$1');
    $routes->get('news/show/(:num)', 'News::show/$1');

    // Rute untuk Profil Desa
    $routes->get('profile', 'Profile::index');
});
