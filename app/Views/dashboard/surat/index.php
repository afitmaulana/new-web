<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
        <a href="<?= site_url('dashboard/surat/create') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus fa-sm"></i> Tambah Surat</a>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No. Surat</th>
                        <th>Jenis Surat</th>
                        <th>Perihal</th>
                        <th>Tanggal</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($surat)) : ?>
                        <?php foreach ($surat as $item) : ?>
                            <tr>
                                <td><?= esc($item['nomor_surat']) ?></td>
                                <td><?= esc($item['jenis_surat']) ?></td>
                                <td><?= esc($item['perihal']) ?></td>
                                <td><?= \CodeIgniter\I18n\Time::parse($item['tanggal_surat'])->toLocalizedString('d MMMM yyyy') ?></td>
                                <td>
                                    <?php if (!empty($item['file_path'])): ?>
                                        <a href="<?= base_url('uploads/surat/' . $item['file_path']) ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <form action="<?= site_url('dashboard/surat/delete/' . $item['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus surat ini?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center">Belum ada data surat.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() { $('#dataTable').DataTable({"language": { "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json" }}); });
</script>
<?= $this->endSection() ?>