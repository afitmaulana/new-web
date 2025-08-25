<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="row mb-3">
    <div class="col-12">
        <a href="<?= site_url('dashboard/officials/add') ?>" class="btn btn-success">
            <i class="fas fa-plus"></i> Tambah Aparatur
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-primary">Daftar Aparatur Desa</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>QR Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($officials as $official): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= esc($official['name']); ?></td>
                            <td><?= esc($official['position']); ?></td>
                            <td>
                                <a href="<?= site_url('dashboard/officials/qr-view/'.$official['id']) ?>" class="btn btn-sm btn-primary">
                                    Lihat QR
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if(empty($officials)): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada aparatur</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
