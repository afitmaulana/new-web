<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800"><?= esc($title) ?></h1>

<!-- Statistik Ringkas -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow-sm h-100 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Penduduk</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">1,254</div>
                </div>
                <i class="fas fa-users fa-2x text-primary"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow-sm h-100 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Laki-laki</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">610</div>
                </div>
                <i class="fas fa-male fa-2x text-success"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow-sm h-100 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Perempuan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">644</div>
                </div>
                <i class="fas fa-female fa-2x text-info"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Tabel Data Penduduk -->
    <div class="col-lg-8 mb-4">
        <div class="card shadow-sm">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Penduduk</h6>
                <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
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
                            <tr>
                                <td>1</td>
                                <td>Budi Santoso</td>
                                <td>3328123456780001</td>
                                <td>Jl. Merdeka No. 12</td>
                                <td>L</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Siti Aminah</td>
                                <td>3328123456780002</td>
                                <td>Jl. Melati No. 5</td>
                                <td>P</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <!-- nanti loop dari database -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Penduduk -->
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

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('genderChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [610, 644],
                backgroundColor: ['#4e73df', '#e74a3b'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>

<?= $this->endSection() ?>
