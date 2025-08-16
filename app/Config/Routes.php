<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Rute Publik (Landing Page)
$routes->get('/', 'LandingPage::index');

// Rute Autentikasi (Login & Logout)
$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// --- GRUP UNTUK SEMUA HALAMAN YANG DILINDUNGI ---
// Semua URL yang diawali dengan /dashboard akan otomatis memerlukan login.
$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {
    // Rute utama dasbor
    $routes->get('/', 'Dashboard::index');

    // Rute untuk Manajemen Berita (menampilkan halaman)
    $routes->get('news', 'News::index');
    $routes->get('news/create', 'News::create');
    $routes->get('news/edit/(:num)', 'News::edit/$1');
});


// --- GRUP UNTUK PROSES DATA YANG DILINDUNGI ---
// Rute ini juga perlu dilindungi filter, tapi kita letakkan di luar
// grup 'dashboard' agar URL-nya lebih pendek (contoh: /news/store).
// Anda juga bisa memasukkannya ke dalam grup di atas jika ingin URL-nya menjadi /dashboard/news/store.
$routes->post('news/store', 'News::store', ['filter' => 'auth']);
$routes->post('news/update/(:num)', 'News::update/$1', ['filter' => 'auth']);
$routes->post('news/delete/(:num)', 'News::delete/$1', ['filter' => 'auth']);
