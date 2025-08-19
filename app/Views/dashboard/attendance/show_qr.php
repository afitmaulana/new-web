<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
    </div>
    <div class="card-body text-center">
        <p>QR Code ini unik untuk setiap perangkat desa. Silakan cetak dan berikan kepada yang bersangkutan.</p>
        <div id="qrcode" class="d-inline-block p-3 border rounded mb-3"></div>
        <h5><?= esc($official['name']) ?></h5>
        <p class="text-muted"><?= esc($official['position']) ?></p>
        <button class="btn btn-success" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>
        <a href="<?= base_url('/dashboard/officials') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        new QRCode(document.getElementById("qrcode"), {
            text: '<?= $qrData ?>',
            width: 256,
            height: 256,
        });
    });
</script>
<?= $this->endSection() ?>
