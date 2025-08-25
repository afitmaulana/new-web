<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="card mt-3">
    <div class="card-header bg-primary text-white">
        <h6 class="m-0 font-weight-bold">QR Code Form Aparatur Desa</h6>
    </div>
    <div class="card-body text-center">
        <p>Scan QR Code berikut untuk mengisi form Aparatur Desa:</p>
        <img src="<?= site_url('qr/form-official') ?>" 
             alt="QR Code Form Aparatur Desa" 
             class="img-fluid" 
             style="max-width:250px;">
    </div>
</div>

<?= $this->endSection() ?>
