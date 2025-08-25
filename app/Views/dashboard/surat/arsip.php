<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
        <a href="<?= site_url('dashboard/surat') ?>" class="btn btn-success btn-sm">
            <i class="fas fa-plus fa-sm"></i> Buat Surat Baru
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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No. Surat</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal</th>
                        <th>Data Pemohon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($arsip)) : ?>
                        <?php foreach ($arsip as $item) : ?>
                            <tr>
                                <td><?= esc($item['nomor_surat']) ?></td>
                                <td><?= esc($item['jenis_surat_nama']) ?></td>
                                <td><?= \CodeIgniter\I18n\Time::parse($item['tanggal_surat'])->toLocalizedString('d MMMM yyyy') ?></td>
                                <td>
                                    <?php 
                                        $dataPemohon = json_decode($item['data_pemohon']);
                                        // Tampilkan nama atau NIK sebagai perwakilan data
                                        echo esc($dataPemohon->nama_pemohon ?? $dataPemohon->nik ?? 'Data tidak lengkap');
                                    ?>
                                </td>
                                <td class="text-center">
                                    <!-- Anda bisa menambahkan tombol untuk re-download PDF di sini jika perlu -->
                                    <form action="<?= site_url('dashboard/surat/arsip/delete/' . $item['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus arsip surat ini?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus Arsip">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center">Belum ada data surat yang diarsipkan.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() { 
        $('#dataTable').DataTable({"language": { "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json" }}); 
    });
</script>
<?= $this->endSection() ?>