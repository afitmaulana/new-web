<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6 text-center">
        <div class="alert alert-success">
            <h4>Absensi Berhasil!</h4>
            <p>Atas nama: <strong><?= esc($official['name']) ?></strong></p>
            <p>Waktu: <strong><?= date('d-m-Y H:i:s') ?></strong></p>
            <a href="<?= site_url('dashboard/officials') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
