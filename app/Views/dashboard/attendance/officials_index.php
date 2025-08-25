<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="m-0 font-weight-bold text-primary">Data Perangkat Desa</h5>
        <a href="<?= site_url('dashboard/officials/create') ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus fa-sm"></i> Tambah Data
        </a>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th style="width: 5%;">No</th>
                        <th>Nama</th>
                        <th style="width: 25%;">Jabatan</th>
                        <th style="width: 25%;">QR Code</th>
                        <th style="width: 25%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($officials)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($officials as $official) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= esc($official['name']) ?></td>
                                <td><?= esc($official['position']) ?></td>
                                <td class="text-center">
                                </td>
                                <td>
                                <a href="<?= site_url('dashboard/officials/edit/' . $official['id']) ?>" class="btn btn-warning btn-sm" title="Edit Data">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>

                                    <form action="<?= site_url('dashboard/officials/delete/' . $official['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data perangkat desa.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>