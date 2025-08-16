<div class="sidebar-header">
    <img src="/img/logo.png" alt="Logo Desa">
    <h5 class="mt-2 mb-0">Desa Makmur Jaya</h5>
    <small>Kabupaten Sejahtera</small>
</div>
<hr class="text-secondary">
<ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <a href="/dashboard" class="nav-link <?= ($title == 'Dashboard') ? 'active' : '' ?>">
            <i class="fas fa-tachometer-alt fa-fw"></i>Dashboard
        </a>
    </li>
    <li>
        <a href="/dashboard/news" class="nav-link <?= (strpos($title, 'Berita') !== false) ? 'active' : '' ?>">
            <i class="fas fa-newspaper fa-fw"></i>Berita Desa
        </a>
    </li>
    </ul>
<hr class="text-secondary">
<div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw me-2"></i>
        <strong><?= session()->get('username'); ?></strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="/logout">Keluar</a></li>
    </ul>
</div>