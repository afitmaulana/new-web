<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// =====================================================================
// RUTE PUBLIK (HALAMAN DEPAN)
// =====================================================================
$routes->get('/', 'Home::index');

$routes->group('news', static function ($routes) {
    $routes->get('/', 'PublicNews::index');
    $routes->get('detail/(:num)', 'PublicNews::detail/$1');
});

$routes->post('scan/process', 'ScanController::process');
$routes->get('absensi', 'Absensi::index');

$routes->get('profile', 'ProfileController::index');

// =====================================================================
// RUTE AUTENTIKASI
// =====================================================================
$routes->get('login', 'Auth::index', ['as' => 'login']);
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// =====================================================================
// AREA ADMIN (BUTUH LOGIN)
// =====================================================================
$routes->group('dashboard', ['filter' => 'auth'], static function ($routes) {

    // ✅ Dashboard utama
    $routes->get('/', 'Dashboard::index');
    $routes->get('/', 'Page::index');

    // Manajemen Berita
    $routes->group('news', static function ($routes) {
        $routes->get('/', 'News::index');
        $routes->get('show/(:num)', 'News::show/$1');
        $routes->get('create', 'News::create');
        $routes->post('store', 'News::store');
        $routes->get('edit/(:num)', 'News::edit/$1');
        $routes->post('update/(:num)', 'News::update/$1');
        $routes->post('delete/(:num)', 'News::delete/$1');
        $routes->get('berita', 'Page::berita');
        $routes->get('berita', 'BeritaController::landing'); 
$routes->get('berita/(:num)', 'BeritaController::detail/$1');


    });

    // Manajemen Aparatur Desa
    $routes->group('apparatus', static function ($routes) {
        $routes->get('/', 'ApparatusController::index');
        $routes->get('create', 'ApparatusController::create');
        $routes->post('store', 'ApparatusController::store');
        $routes->get('edit/(:num)', 'ApparatusController::edit/$1');
        $routes->post('update/(:num)', 'ApparatusController::update/$1');
        $routes->post('delete/(:num)', 'ApparatusController::delete/$1');
    });

    // Manajemen Produk
    $routes->group('products', static function ($routes) {
    $routes->get('/', 'Products::index');       // /products/
    $routes->get('create', 'Products::create'); // /products/create
    $routes->post('store', 'Products::store');  // /products/store
    $routes->get('edit/(:num)', 'Products::edit/$1');   // /products/edit/1
    $routes->post('update/(:num)', 'Products::update/$1'); // /products/update/1
    $routes->get('delete/(:num)', 'Products::delete/$1'); // /products/delete/1
});

// Alias agar /products langsung ke Products::index
$routes->get('products', 'Products::index');

    // Manajemen Penduduk
    $routes->group('population', static function ($routes) {
        $routes->get('/', 'PopulationController::index');
        $routes->get('create', 'PopulationController::create');
        $routes->post('store', 'PopulationController::store');
        $routes->get('edit/(:num)', 'PopulationController::edit/$1');
        $routes->post('update/(:num)', 'PopulationController::update/$1');
        $routes->post('delete/(:num)', 'PopulationController::delete/$1');
    });

    // Manajemen Surat
    $routes->group('surat', static function ($routes) {
        $routes->get('/', 'SuratController::index');
        $routes->get('create', 'SuratController::create');
        $routes->post('store', 'SuratController::store');
        $routes->get('edit/(:num)', 'SuratController::edit/$1');
        $routes->post('update/(:num)', 'SuratController::update/$1');
        $routes->post('delete/(:num)', 'SuratController::delete/$1');
        $routes->get('get-form-fields/(:num)', 'SuratController::getFormFields/$1');
        $routes->post('generate', 'SuratController::generate');
        $routes->get('arsip', 'SuratController::arsip');
        $routes->post('arsip/delete/(:num)', 'SuratController::deleteArsip/$1');
    });

}); // ✅ tutup group dashboard

// =====================================================================
// PRODUK PUBLIK
// =====================================================================
$routes->group('produk', function($routes) {
    $routes->get('/', 'PublicProductController::index');
    $routes->get('unggulan', 'PublicProductController::featured');
    $routes->get('kategori/(:segment)', 'PublicProductController::category/$1');
    $routes->get('detail/(:num)', 'PublicProductController::detail/$1');
    $routes->get('cari', 'PublicProductController::search');
});

// =====================================================================
// API PRODUK
// =====================================================================
$routes->group('api/products', function($routes) {
    $routes->get('/', 'ApiProductController::index');
    $routes->get('featured', 'ApiProductController::featured');
    $routes->get('category/(:segment)', 'ApiProductController::category/$1');
    $routes->get('search', 'ApiProductController::search');
});

$routes->get('produk/unggulan', function() {
    return view('page/landing', [
        'title' => 'Produk Unggulan'
    ]);
});

// =====================================================================
// DASHBOARD MODUL TAMBAHAN
// =====================================================================
$routes->group('dashboard/pertanian', function($routes) {
    $routes->get('/', 'Pertanian::index');
    $routes->get('list', 'Pertanian::list');
    $routes->get('detail/(:num)', 'Pertanian::detail/$1');
    $routes->get('create', 'Pertanian::create');
    $routes->post('store', 'Pertanian::store');
    $routes->get('edit/(:num)', 'Pertanian::edit/$1');
    $routes->post('update/(:num)', 'Pertanian::update/$1');
    $routes->get('delete/(:num)', 'Pertanian::delete/$1');
    $routes->get('statistik', 'Pertanian::statistik');
});

$routes->group('dashboard/peternakan',  function($routes) {
    $routes->get('/', 'Peternakan::index');
    $routes->get('create', 'Peternakan::create');
    $routes->post('store', 'Peternakan::store');
    $routes->get('statistik', 'Peternakan::statistik');
});

$routes->group('dashboard/kerajinan',function($routes) {
    $routes->get('/', 'Kerajinan::index');
    $routes->get('create', 'Kerajinan::create');
    $routes->post('store', 'Kerajinan::store');
    $routes->get('edit/(:num)', 'Kerajinan::edit/$1');
    $routes->post('update/(:num)', 'Kerajinan::update/$1');
    $routes->get('delete/(:num)', 'Kerajinan::delete/$1');
    $routes->get('statistik', 'Kerajinan::statistik');

});

$routes->group('dashboard/wisata', function($routes) {
    $routes->get('/', 'WisataController::index');
    $routes->get('create', 'WisataController::create');
    $routes->post('store', 'WisataController::store');
    $routes->get('edit/(:num)', 'WisataController::edit/$1');
    $routes->post('update/(:num)', 'WisataController::update/$1');
    $routes->get('delete/(:num)', 'WisataController::delete/$1');
    $routes->get('statistik', 'WisataController::statistik');
    $routes->get('/potensi/(:num)', 'Page::potensiDetail/$1');
    $routes->get('wisata', 'Page::wisata');
    $routes->get('wisata/(:num)', 'Page::potensiDetail/$1');
    // Halaman wisata untuk publik (landing page)

$routes->get('wisata', 'WisataController::index');
$routes->get('wisata/(:num)', 'WisataController::detail/$1');

});

// =====================================================================
// ATTENDANCE (di luar dashboard)
// ====================================================

// Daftar aparatur
$routes->get('dashboard/officials', 'Attendance::officials');

// Form tambah aparatur
$routes->get('dashboard/officials/add', 'Attendance::addOfficial');

// Simpan data aparatur baru
$routes->post('dashboard/officials/save', 'Attendance::saveOfficial');

// QR Code
$routes->get('dashboard/officials/qr-view/(:num)', 'Attendance::qrView/$1');
$routes->get('dashboard/officials/qr-image/(:num)', 'Attendance::qrImage/$1');

// Scan absensi
$routes->get('dashboard/attendance/scan', 'Attendance::scan');
$routes->get('dashboard/attendance/checkin', 'Attendance::checkIn');
$routes->get('dashboard/attendance/success', 'Attendance::success');

// Rute Keuangan
$routes->group('dashboard/keuangan', static function($routes) {
    $routes->get('/', 'Keuangan::index');               // Halaman index
    $routes->get('create', 'Keuangan::create');         // Form tambah
    $routes->post('store', 'Keuangan::store');          // Proses simpan
    $routes->get('edit/(:num)', 'Keuangan::edit/$1');   // Form edit
    $routes->post('update/(:num)', 'Keuangan::update/$1'); // Proses update
    $routes->get('delete/(:num)', 'Keuangan::delete/$1');  // Hapus
});








