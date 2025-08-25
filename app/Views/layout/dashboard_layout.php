<?php
    // Helper untuk membaca URL
    $uri = service('uri');
    $segment1 = $uri->getSegment(1); // dashboard
    $segment2 = $uri->getSegment(2); // news, products, etc.

    // Grup untuk menu dropdown (UPDATED: ganti 'gallery' dengan 'products')
    $contentPages   = ['news', 'products'];
    $adminPages     = ['apparatus', 'population', 'surat'];
    $absensiPages   = ['attendance', 'officials'];

    // Cek apakah menu dropdown harus aktif/terbuka
    $isContentActive = in_array($segment2, $contentPages);
    $isAdminActive   = in_array($segment2, $adminPages);
    $isAbsensiActive = in_array($segment2, $absensiPages);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= esc($title ?? 'Dashboard'); ?> | Website Desa</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard') ?>">
                <div class="sidebar-brand-icon"><img src="/img/logo.png" alt="Logo Desa" style="height: 40px;"></div>
                <div class="sidebar-brand-text mx-2">Desa Kaliboja</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item <?= ($segment1 == 'dashboard' && empty($segment2)) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= site_url('dashboard') ?>"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Manajemen Konten</div>
            <li class="nav-item <?= $isContentActive ? 'active' : '' ?>">
                <a class="nav-link <?= !$isContentActive ? 'collapsed' : '' ?>" href="#" data-toggle="collapse" data-target="#collapseKonten">
                    <i class="fas fa-fw fa-pencil-alt"></i><span>Konten Website</span>
                </a>
                <div id="collapseKonten" class="collapse <?= $isContentActive ? 'show' : '' ?>" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= ($segment2 == 'news') ? 'active' : '' ?>" href="<?= site_url('dashboard/news') ?>">Berita Desa</a>
                        <!-- UPDATED: Ganti dari gallery ke products -->
                        <a class="collapse-item <?= ($segment2 == 'products') ? 'active' : '' ?>" href="<?= site_url('dashboard/products') ?>">Produk Unggulan</a>
                    </div>
                </div>
            </li>

            <!-- Administrasi Desa -->
            <div class="sidebar-heading">Administrasi Desa</div>
            <li class="nav-item <?= $isAdminActive ? 'active' : '' ?>">
                <a class="nav-link <?= !$isAdminActive ? 'collapsed' : '' ?>" href="#" data-toggle="collapse" data-target="#collapseAdministrasi">
                    <i class="fas fa-fw fa-landmark"></i><span>Administrasi</span>
                </a>
                <div id="collapseAdministrasi" class="collapse <?= $isAdminActive ? 'show' : '' ?>" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= ($segment2 == 'apparatus') ? 'active' : '' ?>" href="<?= site_url('dashboard/apparatus') ?>">Aparatur Desa</a>
                        <a class="collapse-item <?= ($segment2 == 'population') ? 'active' : '' ?>" href="<?= site_url('dashboard/population') ?>">Data Penduduk</a>
                        
                        <!-- Link Layanan Surat -->
                        <a class="collapse-item <?= ($segment2 == 'surat') ? 'active' : '' ?>" href="<?= site_url('dashboard/surat') ?>">Layanan Surat</a>
                    </div>
                </div>
            </li>

            <!-- Potensi Desa -->
<div class="sidebar-heading">Potensi Desa</div>
<li class="nav-item <?= in_array($segment2, ['pertanian','peternakan','kerajinan','wisata']) ? 'active' : '' ?>">
    <a class="nav-link <?= in_array($segment2, ['pertanian','peternakan','kerajinan','wisata']) ? '' : 'collapsed' ?>" 
       href="#" data-toggle="collapse" data-target="#collapsePotensi">
        <i class="fas fa-fw fa-seedling"></i><span>Potensi Desa</span>
    </a>
    <div id="collapsePotensi" class="collapse <?= in_array($segment2, ['pertanian','peternakan','kerajinan','wisata']) ? 'show' : '' ?>" 
         data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?= ($segment2 == 'pertanian') ? 'active' : '' ?>" href="<?= site_url('dashboard/pertanian') ?>">
                <i class="fas fa-fw fa-tractor"></i> Pertanian
            </a>
            <a class="collapse-item <?= ($segment2 == 'peternakan') ? 'active' : '' ?>" href="<?= site_url('dashboard/peternakan') ?>">
                <i class="fas fa-fw fa-horse"></i> Peternakan
            </a>
            <a class="collapse-item <?= ($segment2 == 'kerajinan') ? 'active' : '' ?>" href="<?= site_url('dashboard/kerajinan') ?>">
                <i class="fas fa-fw fa-paint-brush"></i> Kerajinan Tangan
            </a>
            <a class="collapse-item <?= ($segment2 == 'wisata') ? 'active' : '' ?>" href="<?= site_url('dashboard/wisata') ?>">
                <i class="fas fa-fw fa-umbrella-beach"></i> Wisata Desa
            </a>
        </div>
    </div>
</li>
<!-- Absensi -->
        <div class="sidebar-heading">Absensi</div>
        <li class="nav-item <?= $isAbsensiActive ? 'active' : '' ?>">
            <a class="nav-link <?= !$isAbsensiActive ? 'collapsed' : '' ?>" href="#" data-toggle="collapse" data-target="#collapseAbsensi">
                <i class="fas fa-fw fa-qrcode"></i><span>Absensi QR</span>
            </a>
            <div id="collapseAbsensi" class="collapse <?= $isAbsensiActive ? 'show' : '' ?>" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?= ($segment2 == 'officials') ? 'active' : '' ?>" href="<?= site_url('dashboard/officials') ?>">Daftar Aparatur</a>
                    <a class="collapse-item <?= ($segment2 == 'attendance') ? 'active' : '' ?>" href="<?= site_url('dashboard/attendance/scan') ?>">Scan Absensi</a>
                </div>
            </div>
        </li>

<!-- Transparansi -->
<div class="sidebar-heading">Transparansi</div>
<li class="nav-item <?= ($segment2 == 'keuangan') ? 'active' : '' ?>">
    <a class="nav-link <?= ($segment2 == 'keuangan') ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapseTransparansi">
        <i class="fas fa-fw fa-coins"></i><span>Transparansi</span>
    </a>
    <div id="collapseTransparansi" class="collapse <?= ($segment2 == 'keuangan') ? 'show' : '' ?>" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?= ($segment2 == 'keuangan') ? 'active' : '' ?>" href="<?= site_url('dashboard/keuangan') ?>">Laporan Keuangan</a>
        </div>
    </div>
</li>
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
                    <h5 class="m-0 font-weight-bold text-primary d-none d-sm-inline-block"><?= esc($title ?? 'Dashboard'); ?></h5>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= esc(session()->get('username')); ?></span>
                                <img class="img-profile rounded-circle" src="https://ui-avatars.com/api/?name=<?= urlencode(session()->get('username')) ?>&background=4e73df&color=fff">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
            
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Desa Kaliboja <?= date('Y'); ?> | Dibuat oleh Afit</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= site_url('logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
    <?= $this->renderSection('page-scripts') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>