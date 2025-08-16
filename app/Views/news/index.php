<?= $this->extend('layout/dashboard') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Manajemen Berita</h4>
    <a href="/dashboard/news/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Berita</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="row">
    <?php foreach ($news as $n): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">
                <?php if (!empty($n['images'])): ?>
                    <img src="/uploads/news/<?= esc($n['images'][0]['image_filename']) ?>" class="card-img-top" height="180" style="object-fit: cover">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?= esc($n['title']) ?></h5>
                    <p class="card-text"><?= word_limiter(strip_tags($n['content']), 20) ?></p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="/dashboard/news/edit/<?= $n['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <form action="/dashboard/news/delete/<?= $n['id'] ?>" method="post" onsubmit="return confirm('Hapus berita ini?')">
                        <?= csrf_field() ?>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
