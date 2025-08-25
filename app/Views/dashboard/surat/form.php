<?= $this->extend('layout/dashboard_layout') ?>
<?= $this->section('content') ?>
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary"><?= esc($title) ?></h6>
        <a href="<?= site_url('dashboard/surat') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left fa-sm"></i> Kembali</a>
    </div>
    <div class="card-body">
        <?php if(session('errors')): ?>
            <div class="alert alert-danger">Harap periksa kembali isian Anda.</div>
        <?php endif; ?>
        <form action="<?= site_url('dashboard/surat/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control <?= session('errors.nomor_surat') ? 'is-invalid' : '' ?>" value="<?= old('nomor_surat') ?>">
                <?php if(session('errors.nomor_surat')): ?><div class="invalid-feedback"><?= session('errors.nomor_surat') ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="jenis_surat" class="form-label">Jenis Surat</label>
                <input type="text" name="jenis_surat" id="jenis_surat" class="form-control <?= session('errors.jenis_surat') ? 'is-invalid' : '' ?>" value="<?= old('jenis_surat') ?>" placeholder="Contoh: Surat Keterangan Usaha">
                <?php if(session('errors.jenis_surat')): ?><div class="invalid-feedback"><?= session('errors.jenis_surat') ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <textarea name="perihal" id="perihal" class="form-control <?= session('errors.perihal') ? 'is-invalid' : '' ?>" rows="3"><?= old('perihal') ?></textarea>
                <?php if(session('errors.perihal')): ?><div class="invalid-feedback"><?= session('errors.perihal') ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control <?= session('errors.tanggal_surat') ? 'is-invalid' : '' ?>" value="<?= old('tanggal_surat') ?>">
                <?php if(session('errors.tanggal_surat')): ?><div class="invalid-feedback"><?= session('errors.tanggal_surat') ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload File (PDF/DOC/DOCX, maks 5MB)</label>
                <input type="file" name="file" id="file" class="form-control <?= session('errors.file') ? 'is-invalid' : '' ?>">
                <?php if(session('errors.file')): ?><div class="invalid-feedback"><?= session('errors.file') ?></div><?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>