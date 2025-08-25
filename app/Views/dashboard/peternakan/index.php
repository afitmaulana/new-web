<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Data Peternakan Desa</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url('dashboard/peternakan/create'); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle"></i> Tambah Data
        </a>
        <a href="<?= base_url('dashboard/peternakan/statistik'); ?>" class="btn btn-info btn-sm">
            <i class="fas fa-chart-bar"></i> Lihat Statistik
        </a>

         <table class="table table-bordered table-striped mt-3 align-middle">
                <thead class="table-dark text-center">
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($peternakan as $p): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= esc($p['nama']); ?></td>
                    <td><?= esc($p['jenis']); ?></td>
                    <td><?= esc($p['jumlah']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
