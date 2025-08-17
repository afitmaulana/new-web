<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
    <div class="d-flex justify-content-end mb-3">
        <a href="/dashboard/news/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Berita Baru</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead><tr><th>#</th><th>Judul & Gambar</th><th>Tanggal Publikasi</th><th class="text-center">Aksi</th></tr></thead>
                    <tbody>
                        <?php $i = 1; foreach($news as $item): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <strong><?= esc($item['title']); ?></strong>
                                <?php if (!empty($item['images'])): ?>
                                <div class="mt-2 d-flex flex-wrap">
                                    <?php foreach($item['images'] as $image): ?>
                                    <div class="me-2 mb-2">
                                        <a href="/uploads/news/<?= $image['image_filename']; ?>" target="_blank">
                                            <img src="/uploads/news/<?= $image['image_filename']; ?>" alt="Gambar Berita" class="img-thumbnail" style="width: 100px; height: 75px; object-fit: cover;">
                                        </a>
                                        <small class="d-block text-muted text-center">
                                            <?= date('d/m/y H:i', strtotime($image['uploaded_at'])); ?>
                                        </small>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </td>
                            <td><?= date('d M Y H:i', strtotime($item['created_at'])); ?></td>
                            
                            <!-- ✅ PERUBAHAN DI SINI -->
                            <td class="text-center">
                                <!-- Tombol Edit dan Delete sudah dihilangkan/dijadikan komentar -->
                                <!-- 
                                <a href="/dashboard/news/edit/<?= $item['id']; ?>" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                <form id="delete-form-<?= $item['id']; ?>" action="/news/delete/<?= $item['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $item['id']; ?>)" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                                -->
                                <span>-</span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>