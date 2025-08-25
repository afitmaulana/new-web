<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
        <a href="<?= site_url('dashboard/apparatus') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <?php if(session('errors')): ?>
            <div class="alert alert-danger" role="alert">
                Harap periksa kembali isian formulir Anda.
            </div>
        <?php endif; ?>

        <form action="<?= isset($apparatus) ? site_url('dashboard/apparatus/update/' . $apparatus['id']) : site_url('dashboard/apparatus/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <?php if (isset($apparatus)): ?>
                <input type="hidden" name="_method" value="POST">
            <?php endif; ?>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" 
                       value="<?= old('name', $apparatus['name'] ?? '') ?>" 
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
                       value="<?= old('position', $apparatus['position'] ?? '') ?>"
                       required>
                <?php if(session('errors.position')): ?>
                    <div class="invalid-feedback">
                        <?= session('errors.position') ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Aparatur (JPG, PNG, maks 2MB)</label>
                <input type="file" 
                       name="photo" 
                       id="photo" 
                       class="form-control <?= session('errors.photo') ? 'is-invalid' : '' ?>" 
                       accept="image/png, image/jpeg">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto saat edit.</small>
                <?php if(session('errors.photo')): ?>
                    <div class="invalid-feedback">
                        <?= session('errors.photo') ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if (isset($apparatus) && !empty($apparatus['photo']) && $apparatus['photo'] != 'default.jpg'): ?>
                <div class="mb-3">
                    <label class="form-label">Foto Saat Ini:</label><br>
                    <img src="<?= base_url('uploads/apparatus/' . $apparatus['photo']) ?>" alt="Foto <?= esc($apparatus['name']) ?>" style="max-height: 150px;" class="img-thumbnail">
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Data
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>