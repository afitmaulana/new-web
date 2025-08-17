<?php
use CodeIgniter\Router\RouteCollection;
/** @var RouteCollection $routes */
$routes->get('/', 'LandingPage::index'); 

$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Grup rute untuk dashboard yang memerlukan login
$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('news', 'News::index');
    $routes->get('news/create', 'News::create');
    $routes->get('news/edit/(:num)', 'News::edit/$1');
});

// Rute untuk proses data (tetap perlu filter)
$routes->post('news/store', 'News::store', ['filter' => 'auth']);
$routes->post('news/update/(:num)', 'News::update/$1', ['filter' => 'auth']);
$routes->post('news/delete/(:num)', 'News::delete/$1', ['filter' => 'auth']);