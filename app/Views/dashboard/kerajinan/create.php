<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Form Tambah Data Kerajinan</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('dashboard/kerajinan/store'); ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kerajinan</label>
                <input type="text" 
                       name="nama" 
                       id="nama" 
                       class="form-control <?= (isset($validation) && $validation->hasError('nama')) ? 'is-invalid' : '' ?>" 
                       value="<?= old('nama') ?>">
                <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('nama') : '' ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Kerajinan</label>
                <input type="text" 
                       name="jenis" 
                       id="jenis" 
                       class="form-control <?= (isset($validation) && $validation->hasError('jenis')) ? 'is-invalid' : '' ?>" 
                       value="<?= old('jenis') ?>">
                <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('jenis') : '' ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Produk</label>
                <input type="number" 
                       name="jumlah" 
                       id="jumlah" 
                       class="form-control <?= (isset($validation) && $validation->hasError('jumlah')) ? 'is-invalid' : '' ?>" 
                       value="<?= old('jumlah') ?>">
                <div class="invalid-feedback">
                    <?= isset($validation) ? $validation->getError('jumlah') : '' ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="<?= base_url('kerajinan'); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
