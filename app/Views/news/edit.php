<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<h4>Edit Berita</h4>

<form action="/dashboard/news/update/<?= $news['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="<?= esc($news['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Isi Berita</label>
        <textarea name="content" class="form-control" rows="5" required><?= esc($news['content']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
    <a href="/dashboard/news" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
