<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<div class="alert alert-info shadow-sm">
    Selamat datang kembali, <strong><?= esc(session()->get('username')) ?>!</strong>
</div>

<div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penduduk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_penduduk, 0, ',', '.') ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Berita</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($total_berita) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Layanan Surat</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= esc($layanan_surat) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Rekap Absensi Terkini</h6>
        <a href="<?= site_url('dashboard/attendance/log') ?>" class="btn btn-sm btn-info">Lihat Semua</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTablePresensi" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Jam Masuk</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($presensi)) : ?>
                        <?php foreach ($presensi as $p) : ?>
                            <tr>
                                <td><?= \CodeIgniter\I18n\Time::parse($p['check_in_time'])->toLocalizedString('d MMMM yyyy') ?></td> 
                                <td><?= esc($p['nip']) ?></td>
                                <td><?= esc($p['nama']) ?></td>
                                <td><?= esc($p['jabatan']) ?></td>
                                <td><?= \CodeIgniter\I18n\Time::parse($p['check_in_time'])->toLocalizedString('HH:mm:ss') ?></td> 
                                <td>
                                    <span class="badge bg-success"><?= esc($p['status']) ?></span>
                                </td> 
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data absensi hari ini.</td>
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
        $('#dataTablePresensi').DataTable({
            "language": { "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json" },
            "searching": false, // Menghilangkan kotak pencarian
            "lengthChange": false, // Menghilangkan pilihan jumlah data
            "pageLength": 5, // Hanya menampilkan 5 data
            "ordering": false // Menghilangkan fitur sortir
        });
    });
</script>
<?= $this->endSection() ?>