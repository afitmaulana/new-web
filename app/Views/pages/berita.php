<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<style>
    .news-card {
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        background: white;
    }
    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 25px rgba(44, 91, 90, 0.12);
    }
    .news-card-img {
        height: 200px;
        object-fit: cover;
    }
    .pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    .pagination .page-link {
        color: var(--primary-color);
    }
</style>

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Kabar dan Berita Desa</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Informasi terbaru seputar kegiatan, pengumuman, dan pembangunan di Desa Kaliboja.</p>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row g-4">
        <?php if (!empty($news)) : ?>
            <?php foreach ($news as $item) : ?>
                <div class="col-lg-3 col-md-6" data-aos="fade-up">
                    <div class="card news-card h-100">
                        <img src="<?= $item['image'] ?? 'https://placehold.co/600x400/eae7dc/3e3636?text=Gambar' ?>" class="card-img-top news-card-img" alt="<?= esc($item['title']) ?>">
                        <div class="card-body d-flex flex-column">
                            <small class="text-muted"><?= \CodeIgniter\I18n\Time::parse($item['created_at'])->toLocalizedString('d MMMM yyyy') ?></small>
                            <h5 class="card-title fw-bold mt-2 flex-grow-1"><?= esc($item['title']) ?></h5>
                            <p class="card-text small text-muted"><?= esc(word_limiter($item['content'], 15, '...')) ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pb-3">
                            <a href="/berita/<?= esc($item['slug']) ?>" class="text-primary-color fw-bold">Baca Selengkapnya <i class="fas fa-arrow-right fa-sm"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada berita untuk ditampilkan.</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-5 d-flex justify-content-center" data-aos="fade-up">
        <?php if ($pager) : ?>
            <?= $pager->links('berita', 'bootstrap_template') ?>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>