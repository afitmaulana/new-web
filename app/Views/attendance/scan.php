<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
    <div class="col-md-8 text-center">
        <h4 class="mb-3">Scan QR Code untuk Absensi</h4>
        <div id="qr-reader" style="width:100%;"></div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
<script src="https://unpkg.com/html5-qrcode"></script>
<script>
function onScanSuccess(decodedText, decodedResult) {
    // Redirect ke URL checkIn otomatis
    window.location.href = decodedText;
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: 250 }
);
html5QrcodeScanner.render(onScanSuccess);
</script>
<?= $this->endSection() ?>
