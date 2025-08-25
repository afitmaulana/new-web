<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Form Tambah Data Pertanian</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('dashboard/pertanian/store') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Tanaman</label>
                <input type="text" name="nama" id="nama" class="form-control <?= (isset($validation) && $validation->hasError('nama')) ? 'is-invalid' : '' ?>" value="<?= old('nama') ?>">
                <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nama') : '' ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="luas" class="form-label">Luas (Ha)</label>
                <input type="text" name="luas" id="luas" class="form-control <?= (isset($validation) && $validation->hasError('luas')) ? 'is-invalid' : '' ?>" value="<?= old('luas') ?>">
                <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('luas') : '' ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="hasil" class="form-label">Hasil (Ton)</label>
                <input type="text" name="hasil" id="hasil" class="form-control <?= (isset($validation) && $validation->hasError('hasil')) ? 'is-invalid' : '' ?>" value="<?= old('hasil') ?>">
                <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('hasil') : '' ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= base_url('dashboard/pertanian') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
