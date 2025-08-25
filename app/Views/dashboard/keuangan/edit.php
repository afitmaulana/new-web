<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<h1 class="h3 mb-4 text-gray-800"><?= esc($title) ?></h1>

<form action="<?= site_url('dashboard/keuangan/update/'.$keuangan['id']) ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= old('tanggal', $keuangan['tanggal']) ?>" required>
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control" value="<?= old('keterangan', $keuangan['keterangan']) ?>" required>
    </div>
    <div class="form-group">
        <label>Pemasukan</label>
        <input type="number" name="pemasukan" class="form-control" value="<?= old('pemasukan', $keuangan['pemasukan']) ?>" step="0.01">
    </div>
    <div class="form-group">
        <label>Pengeluaran</label>
        <input type="number" name="pengeluaran" class="form-control" value="<?= old('pengeluaran', $keuangan['pengeluaran']) ?>" step="0.01">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="<?= site_url('dashboard/keuangan') ?>" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
