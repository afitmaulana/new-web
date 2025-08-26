<?= $this->extend('/layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Statistik Desa</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Statistik</li>
    </ol>

    <!-- Ringkasan Statistik -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="fs-3"><?= $total_penduduk ?? 0 ?></div>
                    <div>Total Penduduk</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <div class="fs-3"><?= $total_pertanian ?? 0 ?></div>
                    <div>Data Pertanian</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div class="fs-3"><?= $total_peternakan ?? 0 ?></div>
                    <div>Data Peternakan</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div class="fs-3"><?= $total_kerajinan ?? 0 ?></div>
                    <div>Data Kerajinan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Detail Penduduk -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Penduduk
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penduduk as $item) : ?>
                        <tr>
                            <td><?= esc($item['nik']) ?></td>
                            <td><?= esc($item['nama']) ?></td>
                            <td><?= esc($item['jenis_kelamin']) ?></td>
                            <td><?= esc($item['tanggal_lahir']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tambahkan tabel lain di sini jika perlu, contoh: -->
    <!-- Tabel Detail Pertanian -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-leaf me-1"></i>
            Data Pertanian
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                 <thead>
                    <tr>
                        <th>Nama Komoditas</th>
                        <th>Jenis</th>
                        <th>Luas Lahan (Ha)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pertanian as $item) : ?>
                        <tr>
                            <td><?= esc($item['nama_komoditas']) ?></td>
                            <td><?= esc($item['jenis']) ?></td>
                            <td><?= esc($item['luas_lahan']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>
