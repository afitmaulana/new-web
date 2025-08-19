<!DOCTYPE html>
<html lang="id">
<head>
   <?= $this->extend('layout/dashboard_layout') ?>

    <!-- Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900" rel="stylesheet">

    <!-- SB Admin 2 Styles -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .sidebar-header {
            text-align: center;
            padding: 20px 10px;
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: #fff;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .sidebar-header img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }
        .nav-link {
            transition: all 0.2s ease-in-out;
        }
        .nav-link:hover {
            background: rgba(78, 115, 223, 0.2);
            color: #224abe !important;
            font-weight: 600;
        }
        .topbar h5 {
            font-weight: 700;
            color: #4e73df;
        }
        footer {
            font-size: 14px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div class="bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Brand -->
            <div class="sidebar-header">
                <img src="/img/logo.png" alt="Logo Desa" class="mb-2">
                <h6 class="mb-0">Desa Makmur Jaya</h6>
                <small>Kabupaten Sejahtera</small>
            </div>

            <!-- Nav -->
            <ul class="nav nav-pills flex-column mt-3 mb-auto">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link text-white <?= ($title == 'Dashboard') ? 'active' : '' ?>">
                        <i class="fas fa-tachometer-alt fa-fw"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="/dashboard/news" class="nav-link text-white <?= (strpos($title, 'Berita') !== false) ? 'active' : '' ?>">
                        <i class="fas fa-newspaper fa-fw"></i> Berita Desa
                    </a>
                </li>
            </ul>

            <hr class="sidebar-divider my-2">

            <!-- User -->
            <div class="px-3 mb-3">
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle fa-fw me-2"></i>
                        <strong><?= session()->get('username'); ?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow-sm">
                    <h5 class="m-0"><?= esc($title ?? 'Dashboard'); ?></h5>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="https://ui-avatars.com/api/?name=Admin&background=random">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('/logout'); ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Page Content -->
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white shadow-sm">
                <div class="container my-auto text-center">
                    <span class="text-muted">© <?= date('Y'); ?> Desa Makmur Jaya | Dibuat dengan ❤️ oleh Afit</span>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scroll to Top -->
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/js/sb-admin-2.min.js"></script>
</body>
</html>
