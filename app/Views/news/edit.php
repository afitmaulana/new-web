<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3>Edit Berita</h3>
        </div>
        <div class="card-body">
            <?php if (session()->has('errors')) : ?>
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        <?php foreach (session('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>

            <!-- ✅ FORM ACTION DIPERBAIKI -->
            <form action="<?= base_url('dashboard/news/update/' . $news['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?= old('title', $news['title']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Konten</label>
                    <textarea name="content" id="content" class="form-control" rows="10" required><?= old('content', $news['content']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Manajemen Gambar</label>
                    <div class="p-3 border rounded">
                        <p><strong>Gambar Saat Ini:</strong></p>
                        <?php if (!empty($news['images'])): ?>
                            <div class="row">
                                <?php foreach ($news['images'] as $img): ?>
                                    <div class="col-md-3 col-sm-4 col-6 mb-3 text-center">
                                        <img src="/uploads/news/<?= esc($img['image_filename']) ?>" class="img-thumbnail mb-2" alt="Gambar Berita" style="height: 120px; object-fit: cover; width: 100%;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="delete_images[]" value="<?= $img['id'] ?>" id="delete_<?= $img['id'] ?>">
                                            <label class="form-check-label" for="delete_<?= $img['id'] ?>">
                                                Hapus
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p class="text-muted">Tidak ada gambar untuk berita ini.</p>
                        <?php endif; ?>
                        <hr>
                        <div>
                            <label for="images" class="form-label"><strong>Upload Gambar Baru (Opsional)</strong></label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple>
                            <small class="form-text text-muted">Anda bisa menambahkan gambar baru.</small>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Berita</button>
                    <a href="<?= base_url('dashboard/news') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
