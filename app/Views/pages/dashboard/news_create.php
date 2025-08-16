<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Tambah Berita Baru</h3>
  </div>
  <form action="/news/store" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group">
        <label>Judul Berita</label>
        <input type="text" class="form-control" name="title" required>
      </div>
      <div class="form-group">
        <label>Konten</label>
        <textarea class="form-control" name="content" rows="5" required></textarea>
      </div>
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" class="form-control" name="image" required>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<?= $this->endSection() ?>