<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">QR Code Absensi</h6>
                <a href="<?= site_url('dashboard/officials') ?>" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left fa-sm"></i> Kembali
                </a>
            </div>
            <div class="card-body text-center p-4">
                <p class="mb-1">Pindai kode di bawah ini untuk absensi:</p>
                <h5 class="card-title font-weight-bold"><?= esc($official['name']) ?></h5>
                <p class="text-muted mb-4"><?= esc($official['position']) ?></p>
                
                <div class="qr-code-container border rounded p-3 d-inline-block bg-white">
                    <img src="<?= site_url('dashboard/officials/qr-image/' . $official['id']) ?>" 
     alt="QR Code untuk <?= esc($official['name']) ?>" 
     class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
