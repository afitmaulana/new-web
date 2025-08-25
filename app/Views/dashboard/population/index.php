<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800"><?= esc($title) ?></h1>

<div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow-sm h-100 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penduduk</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($stats['total']) ?></div>
                </div>
                <i class="fas fa-users fa-2x text-primary"></i>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow-sm h-100 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laki-laki</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($stats['laki_laki']) ?></div>
                </div>
                <i class="fas fa-male fa-2x text-success"></i>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow-sm h-100 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Perempuan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($stats['perempuan']) ?></div>
                </div>
                <i class="fas fa-female fa-2x text-info"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card shadow-sm">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Penduduk</h6>
                <a href="<?= site_url('dashboard/population/create') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                     <table class="table table-bordered table-striped mt-3 align-middle">
                <thead class="table-dark text-center">
                    <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>JK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($populations)) : ?>
                                <?php foreach ($populations as $key => $row) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= esc($row['name']) ?></td>
                                        <td><?= esc($row['nik']) ?></td>
                                        <td><?= esc($row['address']) ?></td>
                                        <td><?= esc($row['gender']) ?></td>
                                        <td>
                                            <a href="<?= site_url('dashboard/population/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="<?= site_url('dashboard/population/delete/' . $row['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data penduduk.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Gender</h6>
            </div>
            <div class="card-body">
                <canvas id="genderChart" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": { "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json" }
        });
    });

    // Inisialisasi Grafik
    const ctx = document.getElementById('genderChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [<?= $stats['laki_laki'] ?>, <?= $stats['perempuan'] ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>
<?= $this->endSection() ?>