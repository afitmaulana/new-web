<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Data Kerajinan Desa</h6>
    </div>
    <div class="card-body">
        <!-- Tombol aksi -->
        <a href="<?= base_url('dashboard/kerajinan/create'); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle"></i> Tambah Data
        </a>
        <a href="<?= base_url('dashboard/kerajinan/statistik'); ?>" class="btn btn-info btn-sm">
            <i class="fas fa-chart-bar"></i> Lihat Statistik
        </a>

        <!-- Tabel data -->
        <?php if (!empty($kerajinan)): ?>
            <div class="table-responsive mt-3">
                 <table class="table table-bordered table-striped mt-3 align-middle">
                <thead class="table-dark text-center">
                    <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 30%;">Nama</th>
                            <th style="width: 20%;">Jenis</th>
                            <th style="width: 15%;">Jumlah</th>
                            <th style="width: 30%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($kerajinan as $k): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($k['nama']); ?></td>
                            <td><?= esc($k['jenis']); ?></td>
                            <td><?= esc($k['jumlah']); ?></td>
                            <td>
                                <a href="<?= base_url('dashboard/kerajinan/edit/' . $k['id']); ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="<?= base_url('dashboard/kerajinan/delete/' . $k['id']); ?>" 
                                   onclick="return confirm('Yakin hapus data ini?');" 
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning mt-3">Belum ada data kerajinan.</div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>
