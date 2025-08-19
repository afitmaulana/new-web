<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<!-- Pesan Selamat Datang -->
<div class="alert alert-info shadow-sm">
    Selamat datang kembali, <strong><?= esc(session()->get('username')) ?>!</strong>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Kartu Total Penduduk -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Penduduk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_penduduk, 0, ',', '.') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Total Berita -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Berita</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($total_berita) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Layanan Surat -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Layanan Surat
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($layanan_surat) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
