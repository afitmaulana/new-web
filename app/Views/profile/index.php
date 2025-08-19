<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <!-- Kolom Informasi Utama -->
    <div class="col-lg-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body text-center">
                <img src="/img/logo.png" alt="Logo Desa" class="rounded-circle img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: contain;">
                <h5 class="my-3"><?= esc($desa['nama_desa'] ?? 'Nama Desa') ?></h5>
                <p class="text-muted mb-1">Kepala Desa: <?= esc($desa['kepala_desa'] ?? '-') ?></p>
                <p class="text-muted mb-4"><?= esc($desa['alamat_kantor'] ?? '-') ?></p>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h6 class="font-weight-bold text-primary">Kontak</h6>
                <hr>
                <p><i class="fas fa-envelope fa-fw me-2"></i><?= esc($desa['email'] ?? '-') ?></p>
                <p><i class="fas fa-phone fa-fw me-2"></i><?= esc($desa['telepon'] ?? '-') ?></p>
            </div>
        </div>
    </div>

    <!-- Kolom Sejarah, Visi, Misi -->
    <div class="col-lg-8">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h6 class="font-weight-bold text-primary">Sejarah Singkat Desa</h6>
                <hr>
                <p><?= esc($desa['sejarah'] ?? 'Data belum diisi.') ?></p>
            </div>
        </div>
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h6 class="font-weight-bold text-primary">Visi</h6>
                <hr>
                <p><em>"<?= esc($desa['visi'] ?? 'Data belum diisi.') ?>"</em></p>
                <br>
                <h6 class="font-weight-bold text-primary">Misi</h6>
                <hr>
                <!-- nl2br() digunakan untuk mengubah baris baru menjadi tag <br> -->
                <p><?= nl2br(esc($desa['misi'] ?? 'Data belum diisi.')) ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
