<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<form action="/dashboard/news/update/<?= $news['id']; ?>" method="post">
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="<?= esc($news['title']); ?>" required>
    </div>
    <div class="form-group">
        <label>Isi Berita</label>
        <textarea name="content" class="form-control" rows="5" required><?= esc($news['content']); ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>

<?= $this->endSection(); ?>
