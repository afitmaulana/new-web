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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/dashboard') ?>">
                <div class="sidebar-brand-icon"><img src="/img/logo.png" alt="Logo Desa" style="height: 40px;"></div>
                <div class="sidebar-brand-text mx-2">Desa Kaliboja</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item <?= ($title == 'Dashboard') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/dashboard') ?>"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Manajemen Konten</div>
            <li class="nav-item <?= (strpos($title, 'Berita') !== false) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/dashboard/news') ?>"><i class="fas fa-fw fa-newspaper"></i><span>Berita Desa</span></a>
            </li>
            <li class="nav-item <?= (strpos($title, 'Galeri') !== false) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/dashboard/gallery') ?>"><i class="fas fa-fw fa-images"></i><span>Galeri</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Administrasi Desa</div>
            <li class="nav-item <?= (strpos($title, 'Aparatur') !== false) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/dashboard/apparatus') ?>"><i class="fas fa-fw fa-users"></i><span>Aparatur Desa</span></a>
            </li>
            <li class="nav-item <?= (strpos($title, 'Penduduk') !== false) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/dashboard/population') ?>"><i class="fas fa-fw fa-chart-bar"></i><span>Data Penduduk</span></a>
            </li>
            <div class="sidebar-heading">Absensi</div>
            <li class="nav-item <?= (strpos($title, 'Laporan Absensi') !== false) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/dashboard/attendance/log') ?>"><i class="fas fa-fw fa-clipboard-list"></i><span>Laporan Absensi</span></a>
            </li>
            <li class="nav-item <?= (strpos($title, 'Perangkat Desa') !== false) ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('/dashboard/officials') ?>"><i class="fas fa-fw fa-user-tie"></i><span>Perangkat Desa</span></a>
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
                    <a class="btn btn-primary" href="<?= base_url('/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js"></script>
</body>
</html>