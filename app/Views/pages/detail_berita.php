<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<style>
    .article-header {
        padding: 6rem 0;
        background-color: var(--primary-color);
        color: var(--text-light);
    }
    .article-header h1 {
        font-family: 'Merriweather', serif;
        font-weight: 900;
        font-size: 3.5rem;
    }
    .article-meta {
        font-size: 0.9rem;
    }
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .article-content {
        line-height: 1.8;
    }
</style>

<div class="article-header">
    <div class="container text-center">
        <h1 data-aos="fade-up"><?= esc($news['title']) ?></h1>
        <div class="article-meta mt-3" data-aos="fade-up" data-aos-delay="100">
            <span><i class="fas fa-user-edit me-2"></i>Oleh: <?= esc($news['author'] ?? 'Admin') ?></span>
            <span class="mx-3">|</span>
            <span><i class="fas fa-calendar-alt me-2"></i><?= \CodeIgniter\I18n\Time::parse($news['created_at'])->toLocalizedString('d MMMM yyyy, HH:mm') ?> WIB</span>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="article-content">
                <img src="<?= $news['image'] ?? 'https://placehold.co/1200x600/eae7dc/3e3636?text=Gambar+Utama' ?>" class="img-fluid rounded shadow-sm mb-4" alt="<?= esc($news['title']) ?>" data-aos="fade-up">
                
                <div data-aos="fade-up">
                    <?= $news['content'] // Tampilkan konten HTML dari database ?>
                </div>

                <hr class="my-5">
                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="/berita" class="btn btn-outline-primary"><i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Berita</a>
                    <div>
                        <span class="me-2">Bagikan:</span>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

            </article>
        </div>
    </div>
</div>

<?= $this->endSection() ?>