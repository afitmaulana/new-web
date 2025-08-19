<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Rute Publik untuk Absensi
$routes->post('/attendance/record', 'Attendance::record');

// Rute Autentikasi
$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Grup rute untuk dashboard yang memerlukan login
$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');
    
    // Rute Berita
    $routes->get('news', 'News::index');
    $routes->get('news/create', 'News::create');
    $routes->get('news/show/(:num)', 'News::show/$1');
    $routes->get('news/edit/(:num)', 'News::edit/$1');
    $routes->post('news/store', 'News::store');
    $routes->post('news/update/(:num)', 'News::update/$1');
    $routes->post('news/delete/(:num)', 'News::delete/$1');

    // Rute Profil Desa
    $routes->get('profile', 'Profile::index');

    // Rute Absensi
    $routes->get('officials', 'Attendance::officials');
    $routes->get('officials/create', 'Attendance::createOfficial');
    $routes->post('officials/store', 'Attendance::storeOfficial');
    $routes->get('officials/qr/(:num)', 'Attendance::showQR/$1');
    $routes->get('attendance/log', 'Attendance::log');
    // ... (rute lainnya)

$routes->post('scan/process', 'ScanController::process');

$routes->get('/absensi', 'Absensi::index');

// ... (rute lainnya)
});
