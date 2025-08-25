<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Tambah Aparatur</h5>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>
                <form action="<?= site_url('dashboard/officials/save') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="position" class="form-control" value="<?= old('position') ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    <a href="<?= site_url('dashboard/officials') ?>" class="btn btn-secondary mt-3">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
