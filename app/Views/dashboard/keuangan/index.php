<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800"><?= esc($title) ?></h1>

<a href="<?= site_url('dashboard/keuangan/create') ?>" class="btn btn-primary mb-3">+ Tambah Data</a>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($keuangan as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($row['tanggal']) ?></td>
            <td><?= esc($row['keterangan']) ?></td>
            <td><?= number_format($row['pemasukan'],0,',','.') ?></td>
            <td><?= number_format($row['pengeluaran'],0,',','.') ?></td>
            <td>
                <a href="<?= site_url('dashboard/keuangan/edit/'.$row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= site_url('dashboard/keuangan/delete/'.$row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h4>Statistik</h4>
<ul>
    <li><b>Total Pemasukan:</b> Rp <?= number_format($stats['pemasukan_total'],0,',','.') ?></li>
    <li><b>Total Pengeluaran:</b> Rp <?= number_format($stats['pengeluaran_total'],0,',','.') ?></li>
    <li><b>Saldo:</b> Rp <?= number_format($stats['saldo'],0,',','.') ?></li>
</ul>

<?= $this->endSection() ?>
