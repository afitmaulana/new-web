<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<h4>Tambah Berita</h4>

<form action="/dashboard/news/store" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Isi Berita</label>
        <textarea name="content" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label>Upload Gambar (bisa lebih dari satu)</label>
        <input type="file" name="images[]" class="form-control" multiple>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
    <a href="/dashboard/news" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
