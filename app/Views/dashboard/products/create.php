<?= $this->extend('/layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Tambah Produk</h1>
  <a href="<?= base_url('dashboard/products'); ?>" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Kembali
  </a>
</div>

<form action="<?= base_url('dashboard/products/store'); ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field(); ?>
  
  <div class="mb-3">
    <label for="name" class="form-label">Nama Produk</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  
  <div class="mb-3">
    <label for="price" class="form-label">Harga</label>
    <input type="number" class="form-control" id="price" name="price" required>
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <input type="text" class="form-control" id="category" name="category" required>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Gambar</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>

  <div class="mb-3">
    <label for="contact" class="form-label">Kontak</label>
    <input type="text" class="form-control" id="contact" name="contact">
  </div>

  <button type="submit" class="btn btn-success">
    <i class="fas fa-save"></i> Simpan
  </button>
</form>

<?= $this->endSection(); ?>
