<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article>
                    <h1 class="fw-bold mb-3 display-5"><?= esc($news['title']) ?></h1>

                    <div class="text-muted mb-4 border-bottom pb-3">
                        <i class="fa-regular fa-clock me-1"></i>
                        <span>Diterbitkan pada <?= date('d F Y', strtotime($news['created_at'])) ?></span>
                        <?php if (!empty($news['category'])) : ?>
                            <span class="mx-2">|</span>
                            <i class="fa-solid fa-tag me-1"></i>
                            <span class="badge bg-primary bg-opacity-10 text-primary fw-normal"><?= esc($news['category']) ?></span>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($images)) : ?>
                        <?php if (count($images) > 1) : ?>
                            <div id="newsCarousel" class="carousel slide carousel-fade shadow-lg rounded-3 mb-4" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <?php foreach ($images as $index => $image) : ?>
                                        <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-current="true" aria-label="Slide <?= $index + 1 ?>"></button>
                                    <?php endforeach; ?>
                                </div>
                                <div class="carousel-inner rounded-3">
                                    <?php foreach ($images as $index => $image) : ?>
                                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                            <img src="<?= base_url('uploads/news/' . esc($image['image_filename'])) ?>" class="d-block w-100" style="aspect-ratio: 16/9; object-fit: cover;" alt="Gambar Berita <?= $index + 1 ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        <?php else : ?>
                            <img src="<?= base_url('uploads/news/' . esc($images[0]['image_filename'])) ?>" class="img-fluid rounded-3 shadow-lg mb-4 w-100" style="aspect-ratio: 16/9; object-fit: cover;" alt="<?= esc($news['title']) ?>">
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="fs-5 article-content" style="line-height: 1.8;">
                        <?= $news['content'] // Tampilkan konten HTML tanpa di-escape ?>
                    </div>
                </article>

                <hr class="my-5">

                <a href="<?= site_url('/') ?>" class="btn btn-outline-primary">
                    <i class="fa-solid fa-arrow-left me-2"></i>Kembali ke Halaman Utama
                </a>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>