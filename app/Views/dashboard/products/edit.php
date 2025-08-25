<?= $this->extend('/layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Edit Produk</h1>
  <a href="<?= base_url('dashboard/products'); ?>" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Kembali
  </a>
</div>

<form action="<?= base_url('dashboard/products/update/' . $product['id']); ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field(); ?>
  
  <div class="mb-3">
    <label for="name" class="form-label">Nama Produk</label>
    <input type="text" class="form-control" id="name" name="name" 
           value="<?= esc($product['name']); ?>" required>
  </div>
  
  <div class="mb-3">
    <label for="price" class="form-label">Harga</label>
    <input type="number" class="form-control" id="price" name="price" 
           value="<?= esc($product['price']); ?>" required>
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Kategori</label>
    <input type="text" class="form-control" id="category" name="category" 
           value="<?= esc($product['category']); ?>" required>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="description" name="description" rows="3" required><?= esc($product['description']); ?></textarea>
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Gambar (kosongkan jika tidak diubah)</label>
    <input type="file" class="form-control" id="image" name="image">
    <?php if ($product['image']): ?>
      <div class="mt-2">
        <img src="<?= base_url('uploads/products/' . $product['image']); ?>" 
             alt="<?= esc($product['name']); ?>" width="120">
      </div>
    <?php endif; ?>
  </div>

  <div class="mb-3">
    <label for="contact" class="form-label">Kontak</label>
    <input type="text" class="form-control" id="contact" name="contact" 
           value="<?= esc($product['contact']); ?>">
  </div>

  <button type="submit" class="btn btn-primary">
    <i class="fas fa-save"></i> Update
  </button>
</form>

<?= $this->endSection(); ?>
