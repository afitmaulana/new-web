<?= $this->extend('/layout/template'); ?>
<?= $this->section('content'); ?>

<style>
/* ===== Produk Desa Kaliboja Style ===== */
.card-elev {
  border: none;
  border-radius: 12px;
  overflow: hidden;
  transition: transform 0.25s ease, box-shadow 0.25s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.card-elev:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 22px rgba(0,0,0,0.15);
}

.product-thumb {
  width: 100%;
  height: 220px;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.card-elev:hover .product-thumb {
  transform: scale(1.05);
}

/* Judul section */
#produk h1, #produk h5 {
  font-family: 'Poppins', sans-serif;
}

/* Tombol WA */
.btn-success {
  background: linear-gradient(135deg, #25d366, #128c7e);
  border: none;
  font-weight: 600;
  padding: 6px 14px;
  border-radius: 8px;
  transition: background 0.3s ease;
}

.btn-success:hover {
  background: linear-gradient(135deg, #128c7e, #075e54);
}

/* Info toko kecil */
.card-body small {
  font-size: 0.85rem;
}

/* Bagian kosong (jika produk tidak ada) */
#produk .text-center {
  border: 2px dashed #ccc;
  border-radius: 12px;
  background: #f9f9f9;
}
</style>

<main>
  <section class="py-5 text-center bg-light">
    <div class="container">
      <h1 class="display-4 fw-bold">Produk Desa Kaliboja</h1>
      <p class="lead text-muted">Jelajahi berbagai produk unggulan dari UMKM dan masyarakat Desa Kaliboja.</p>
    </div>
  </section>

  <section id="produk" class="py-5">
    <div class="container">
      <div class="row g-4">
        <?php if (!empty($products)) : foreach ($products as $p) : ?>
          <div class="col-md-4 col-lg-3" data-aos="fade-up">
            <div class="card card-elev h-100">
              <div class="overflow-hidden">
                <img src="<?= $p['image'] ? '/uploads/products/' . esc($p['image']) : 'https://images.unsplash.com/photo-1603400521630-9f2de124b33b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80' ?>" class="product-thumb" alt="<?= esc($p['name']) ?>" loading="lazy">
              </div>
              <div class="card-body d-flex flex-column">
                <div class="fw-bold mb-1"><?= esc($p['name']) ?></div>
                <div class="small text-muted mb-2 flex-grow-1"><?= esc(word_limiter($p['description'], 10)) ?></div>
                <div class="fw-bold text-success mb-3">Rp <?= number_format((float)$p['price'], 0, ',', '.') ?></div>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                  <?php if (!empty($p['contact'])) : ?>
                    <a href="https://wa.me/<?= preg_replace('/\D/', '', $p['contact']) ?>" target="_blank" class="btn btn-success btn-sm">
                      <i class="fa-brands fa-whatsapp me-1"></i> Pesan
                    </a>
                  <?php endif; ?>
                  <small class="text-muted"><i class="fa-solid fa-store me-1"></i> <?= esc($p['store_name'] ?? 'BUMDes Kaliboja') ?></small>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach;
        else : ?>
          <div class="col-12">
            <div class="text-center py-5">
              <i class="fa-solid fa-cart-shopping fa-3x text-muted mb-3"></i>
              <h5 class="text-muted">Belum ada produk yang tersedia saat ini.</h5>
              <p class="text-secondary">Silakan cek kembali nanti.</p>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</main>

<?= $this->endSection(); ?>
