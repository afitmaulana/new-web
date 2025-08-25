<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-warning text-white">
        <h6 class="m-0 font-weight-bold">Edit Data Wisata</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('dashboard/wisata/update/'.$wisata['id']); ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Wisata</label>
                <input type="text" name="nama" id="nama" class="form-control <?= (isset($validation) && $validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama', $wisata['nama']); ?>">
                <div class="invalid-feedback"><?= $validation->getError('nama') ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control <?= (isset($validation) && $validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" value="<?= old('lokasi', $wisata['lokasi']); ?>">
                <div class="invalid-feedback"><?= $validation->getError('lokasi') ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control <?= (isset($validation) && $validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>"><?= old('deskripsi', $wisata['deskripsi']); ?></textarea>
                <div class="invalid-feedback"><?= $validation->getError('deskripsi') ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini</label><br>
                <?php if ($wisata['gambar']): ?>
                    <img src="<?= base_url('uploads/wisata/'.$wisata['gambar']); ?>" width="120" class="mb-2">
                <?php else: ?>
                    <p class="text-muted">Tidak ada gambar</p>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" id="gambar" class="form-control <?= (isset($validation) && $validation->hasError('gambar')) ? 'is-invalid' : ''; ?>">
                <div class="invalid-feedback"><?= $validation->getError('gambar') ?? ''; ?></div>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="<?= base_url('dashboard/wisata'); ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
