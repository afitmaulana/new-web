<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
    </div>
    <div class="card-body text-center">
        <p>QR Code ini unik untuk setiap perangkat desa. Silakan cetak atau unduh.</p>
        
        <img src="<?= site_url('dashboard/officials/qr-image/' . $official['id']); ?>" 
             alt="QR Code" 
             class="img-fluid mb-3" 
             style="max-width: 250px; border: 1px solid #ddd; padding: 5px;">
        
        <h5><?= esc($official['name']) ?></h5>
        <p class="text-muted"><?= esc($official['position']) ?></p>

        <div class="mt-4">
            <a href="<?= site_url('dashboard/officials/qr-download/' . $official['id']); ?>" class="btn btn-success">
                <i class="fas fa-download"></i> Download
            </a>
            <button class="btn btn-info" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>
            <a href="<?= base_url('/dashboard/officials') ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>