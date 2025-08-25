<?= $this->extend('layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<?php
// Muat class Time dan Text helper
use CodeIgniter\I18n\Time;
helper('text'); // Memuat helper untuk fungsi word_limiter()
?>

<style>
    .card-news {
        border: none; /* Menghapus border default */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 0.5rem; /* Sudut lebih tumpul */
    }
    .card-news:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
    }
    .card-img-container {
        position: relative;
        height: 200px;
        overflow: hidden;
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }
    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Diubah kembali ke cover untuk tampilan penuh */
        transition: transform 0.3s ease;
    }
    .card-news:hover .card-img-top {
        transform: scale(1.05);
    }
    /* Gradient overlay untuk gambar */
    .card-img-container::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.6), rgba(0,0,0,0));
    }
    .card-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background-color: #4e73df;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 10;
    }
    .card-title a {
        text-decoration: none;
        color: #333;
        font-weight: 700;
    }
    .card-title a:hover {
        color: #4e73df;
    }
    .card-footer {
        background-color: #fff;
        border-top: 1px solid #e3e6f0;
    }
    .card-footer-actions .btn {
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>

<!-- Tombol Tambah Berita -->
<div class="d-flex justify-content-end mb-4">
    <a href="<?= base_url('/dashboard/news/create') ?>" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Berita Baru
    </a>
</div>

<!-- Tampilan Kartu Berita -->
<div class="row">
    <?php if (empty($news)): ?>
        <div class="col-12">
            <div class="alert alert-info text-center">Belum ada berita. Silakan tambahkan berita baru.</div>
        </div>
    <?php else: ?>
        <?php foreach ($news as $item): ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card card-news h-100 shadow-sm">
                    <div class="card-img-container">
                        <span class="card-badge">Berita Desa</span>
                        <a href="<?= base_url('dashboard/news/show/' . $item['id']) ?>">
                            <?php if (!empty($item['images'])): ?>
                                <img src="/uploads/news/<?= esc($item['images'][0]['image_filename']); ?>" class="card-img-top" alt="<?= esc($item['title']); ?>">
                            <?php else: ?>
                                <img src="https://placehold.co/600x400/e0e0e0/666?text=Tidak+Ada+Gambar" class="card-img-top" alt="Tidak ada gambar">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            <a href="<?= base_url('dashboard/news/show/' . $item['id']) ?>"><?= esc($item['title']); ?></a>
                        </h5>
                        <p class="card-text text-muted small flex-grow-1">
                            <?= esc(word_limiter(strip_tags($item['content']), 20, '...')); ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-center">
                             <small class="text-muted">
                                 <?php if (!empty($item['updated_at'])): ?>
                                     <i class="fas fa-clock fa-sm"></i> <?= Time::parse($item['updated_at'])->toLocalizedString('d MMM yyyy') ?>
                                 <?php endif; ?>
                             </small>
                            <div class="card-footer-actions">
                                <a href="<?= base_url('dashboard/news/edit/' . $item['id']) ?>" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- ✅ FORM ACTION DIPERBAIKI -->
                                <form action="<?= base_url('dashboard/news/delete/' . $item['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
