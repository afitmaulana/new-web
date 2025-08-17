<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/news/store" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="title" name="title" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Berita</label>
                    <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="images" class="form-label">Upload Gambar (Bisa lebih dari satu)</label>
                    <input class="form-control" type="file" id="images" name="images[]" multiple>
                    <small class="form-text text-muted">Tipe file yang diizinkan: jpg, jpeg, png, gif.</small>
                </div>

                <button type="submit" class="btn btn-primary">Publikasikan</button>
                <a href="/dashboard/news" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
<?= $this->endSection(); ?>