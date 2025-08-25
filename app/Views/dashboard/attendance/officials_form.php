<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
        <a href="<?= site_url('dashboard/officials') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <?php if(session('errors')): ?>
            <div class="alert alert-danger" role="alert">
                Harap periksa kembali isian Anda.
            </div>
        <?php endif; ?>

        <form action="<?= site_url('dashboard/officials/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" 
                       value="<?= old('name') ?>" 
                       placeholder="Masukkan nama lengkap..."
                       required>
                <?php if(session('errors.name')): ?>
                    <div class="invalid-feedback">
                        <?= session('errors.name') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Jabatan</label>
                <input type="text" 
                       name="position" 
                       id="position" 
                       class="form-control <?= session('errors.position') ? 'is-invalid' : '' ?>" 
                       value="<?= old('position') ?>"
                       placeholder="Contoh: Kepala Desa"
                       required>
                <?php if(session('errors.position')): ?>
                    <div class="invalid-feedback">
                        <?= session('errors.position') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" 
                          id="address" 
                          class="form-control <?= session('errors.address') ? 'is-invalid' : '' ?>" 
                          rows="3" 
                          placeholder="Masukkan alamat lengkap..."
                          required><?= old('address') ?></textarea>
                <?php if(session('errors.address')): ?>
                    <div class="invalid-feedback">
                        <?= session('errors.address') ?>
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="<?= site_url('dashboard/officials') ?>" class="btn btn-outline-secondary">
                Batal
            </a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>