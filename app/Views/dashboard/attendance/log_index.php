<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Riwayat Absensi Perangkat Desa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama Perangkat</th>
                        <th>Jabatan</th>
                        <th>Waktu Absen</th>
                        <th style="width: 10%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($logs)): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($logs as $log): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= esc($log['official_name']) ?></td>
                                <td><?= esc($log['position']) ?></td>
                                <td>
                                    <?php
                                        // Format ulang tanggal dan waktu agar lebih mudah dibaca
                                        $dateTime = new DateTime($log['check_in_time'], new DateTimeZone('UTC'));
                                        $dateTime->setTimezone(new DateTimeZone('Asia/Jakarta')); // Sesuaikan dengan zona waktu Anda
                                        echo $dateTime->format('d F Y, H:i');
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                        // Logika pewarnaan badge yang lebih dinamis
                                        $statusClass = 'bg-secondary'; // Warna default
                                        if ($log['status'] == 'Hadir') {
                                            $statusClass = 'bg-success';
                                        } elseif ($log['status'] == 'Izin') {
                                            $statusClass = 'bg-warning text-dark';
                                        } elseif ($log['status'] == 'Sakit') {
                                            $statusClass = 'bg-danger';
                                        }
                                    ?>
                                    <span class="badge <?= $statusClass ?>">
                                        <?= esc($log['status']) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data absensi.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?php // Sisipkan CSS & JS untuk DataTables di akhir halaman ?>
<?= $this->section('page-scripts') ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Inisialisasi DataTables
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json"
            }
        });
    });
</script>
<?= $this->endSection() ?>