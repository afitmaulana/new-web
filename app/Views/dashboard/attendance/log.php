<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Absensi Perangkat Desa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($records)): ?>
                        <?php $i = 1; ?>
                        <?php foreach($records as $record): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= \CodeIgniter\I18n\Time::parse($record['attendance_date'])->toLocalizedString('d MMMM yyyy') ?></td>
                            <td><?= esc($record['name']) ?></td>
                            <td><?= esc($record['position']) ?></td>
                            <td><span class="badge bg-success"><?= esc($record['check_in']) ?></span></td>
                            <td><span class="badge bg-danger"><?= esc($record['check_out'] ?? 'Belum Absen') ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center">Belum ada data absensi.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>