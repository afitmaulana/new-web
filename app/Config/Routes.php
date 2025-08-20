<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Rute Publik
$routes->post('scan/process', 'ScanController::process');
$routes->get('/absensi', 'Absensi::index');

// Rute Autentikasi
$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// Grup rute untuk dashboard
$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');
    
    // Rute Berita
    $routes->get('news', 'News::index');
    // ... (rute berita lainnya)

    // RUTE GALERI
    $routes->get('gallery', 'GalleryController::index');
    $routes->post('gallery/store', 'GalleryController::store');
    $routes->post('gallery/delete/(:num)', 'GalleryController::delete/$1');


    // RUTE APARATUR DESA
    $routes->get('apparatus', 'ApparatusController::index');
    // (Tambahkan rute store, update, delete nanti jika diperlukan)

    // RUTE DATA PENDUDUK
    $routes->get('population', 'PopulationController::index');
    // (Tambahkan rute store, update, delete nanti jika diperlukan)
    
    // RUTE PERANGKAT DESA & ABSENSI
    $routes->get('officials', 'Attendance::officials');
    $routes->get('officials/create', 'Attendance::createOfficial');
    $routes->post('officials/store', 'Attendance::storeOfficial');
    $routes->get('officials/qr/(:num)', 'Attendance::showQR/$1');
    $routes->get('officials/qr-image/(:num)', 'Attendance::generateQrImage/$1');
    $routes->get('officials/qr-download/(:num)', 'Attendance::downloadQR/$1');
    $routes->get('attendance/log', 'Attendance::log');
});