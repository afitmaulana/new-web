<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
        <a href="<?= site_url('dashboard/population') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="<?= site_url('dashboard/population/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK)</label>
                <input type="text" name="nik" id="nik" class="form-control" required maxlength="16" minlength="16">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Data
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>