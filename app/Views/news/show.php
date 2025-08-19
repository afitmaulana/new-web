<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<?php 
use CodeIgniter\I18n\Time; 
helper('text');
?>

<!-- Gunakan class row untuk membungkus konten -->
<div class="row">
    <!-- Gunakan col-12 agar kolom memenuhi seluruh lebar yang tersedia -->
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <!-- Judul Berita -->
                <h2 class="font-weight-bold text-primary mb-3"><?= esc($news['title']) ?></h2>

                <!-- Info Tanggal -->
                <p class="text-muted small mb-4">
                    Dipublikasikan pada <?= Time::parse($news['created_at'])->toLocalizedString('d MMMM yyyy, HH:mm') ?>
                    <?php if($news['updated_at'] && $news['updated_at'] != $news['created_at']): ?>
                        | Diperbarui pada <?= Time::parse($news['updated_at'])->toLocalizedString('d MMMM yyyy, HH:mm') ?>
                    <?php endif; ?>
                </p>

                <!-- Galeri Gambar -->
                <?php if (!empty($news['images'])): ?>
                    <div id="newsCarousel" class="carousel slide mb-4" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php foreach($news['images'] as $key => $image): ?>
                                <li data-target="#newsCarousel" data-slide-to="<?= $key ?>" class="<?= $key == 0 ? 'active' : '' ?>"></li>
                            <?php endforeach; ?>
                        </ol>
                        <div class="carousel-inner rounded" style="background-color: #f8f9fa;">
                            <?php foreach($news['images'] as $key => $image): ?>
                                <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                                    <!-- ✅ PERBAIKAN DI SINI -->
                                    <img src="/uploads/news/<?= esc($image['image_filename']) ?>" class="d-block w-100" style="height: 500px; object-fit: contain;" alt="Gambar Berita">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Konten Berita -->
                <div class="news-content mt-4" style="line-height: 1.8; font-size: 1rem;">
                    <?= nl2br(esc($news['content'])) ?>
                </div>
            </div>
            <div class="card-footer bg-light">
                <a href="<?= base_url('/dashboard/news') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left fa-sm"></i> Kembali ke Daftar Berita</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
