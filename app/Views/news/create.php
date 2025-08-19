<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<!-- Card untuk form tambah berita -->
<div class="card shadow-sm">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Berita Baru</h6>
    </div>
    <div class="card-body">
        <!-- Menampilkan pesan error validasi jika ada -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                <?php foreach (session('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/dashboard/news/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" required autofocus>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Isi Berita</label>
                <!-- Textarea ini akan diubah menjadi rich text editor oleh TinyMCE -->
                <textarea class="form-control" id="content" name="content" rows="15"><?= old('content') ?></textarea>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Upload Gambar (Bisa lebih dari satu)</label>
                <input class="form-control" type="file" id="images" name="images[]" multiple>
                <small class="form-text text-muted">Tipe file yang diizinkan: jpg, jpeg, png, gif. Maksimal 2MB per file.</small>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Publikasikan Berita</button>
                <a href="<?= base_url('/dashboard/news') ?>" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
