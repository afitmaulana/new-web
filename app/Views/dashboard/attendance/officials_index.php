<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-end mb-3">
    <a href="<?= base_url('/dashboard/officials/create') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Perangkat Desa</a>
</div>
<div class="card shadow-sm">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Perangkat Desa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($officials as $official): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= esc($official['name']) ?></td>
                        <td><?= esc($official['position']) ?></td>
                        <td><?= esc($official['address']) ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('/dashboard/officials/qr/' . $official['id']) ?>" class="btn btn-sm btn-info" title="Lihat QR Code"><i class="fas fa-qrcode"></i></a>
                            <!-- Tambahkan tombol edit/delete jika perlu -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
