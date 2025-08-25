<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
        <a href="<?= site_url('dashboard/apparatus/create') ?>" class="btn btn-primary btn-sm">
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
         <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 20%;">Foto</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($apparatuses)) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($apparatuses as $item) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center">
                                    <img src="<?= base_url('uploads/apparatus/' . esc($item['photo'])) ?>" alt="<?= esc($item['name']) ?>" style="width: 80px; height: 80px; object-fit: cover;" class="rounded">
                                </td>
                                <td><?= esc($item['name']) ?></td>
                                <td><?= esc($item['position']) ?></td>
                                <td class="text-center">
                                    <form action="<?= site_url('dashboard/apparatus/delete/' . $item['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus Data">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data aparatur desa.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": { "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json" }
        });
    });
</script>
<?= $this->endSection() ?>