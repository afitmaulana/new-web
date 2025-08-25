<?= $this->extend('layout/dashboard_layout'); ?>
<?= $this->section('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 bg-primary text-white">
        <h6 class="m-0 font-weight-bold">Data Wisata Desa</h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url('dashboard/wisata/create'); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle"></i> Tambah Data
        </a>
        <a href="<?= base_url('dashboard/wisata/statistik'); ?>" class="btn btn-info btn-sm">
            <i class="fas fa-chart-bar"></i> Lihat Statistik
        </a>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success mt-3"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>

        <?php if (!empty($wisata)): ?>
            <table class="table table-bordered table-striped mt-3 align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 15%;">Nama</th>
                        <th style="width: 15%;">Lokasi</th>
                        <th style="width: 25%;">Deskripsi</th>
                        <th style="width: 15%;">Gambar</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($wisata as $w): ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= esc($w['nama']); ?></td>
                        <td><?= esc($w['lokasi']); ?></td>
                        <td>
                            <?= strlen(strip_tags($w['deskripsi'])) > 100 
                                ? substr(strip_tags($w['deskripsi']), 0, 100) . '...' 
                                : strip_tags($w['deskripsi']); ?>

                            <?php if (strlen($w['deskripsi']) > 100): ?>
                                <a href="#" class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#detailModal<?= $w['id']; ?>">Selengkapnya</a>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($w['gambar']): ?>
                                <img src="<?= base_url('uploads/wisata/'.$w['gambar']); ?>" width="80" class="img-thumbnail">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="<?= base_url('dashboard/wisata/edit/'.$w['id']); ?>" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('dashboard/wisata/delete/'.$w['id']); ?>" 
                                   onclick="return confirm('Hapus data ini?')" 
                                   class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Detail Deskripsi -->
<div class="modal fade" id="detailModal<?= $w['id']; ?>" tabindex="-1" aria-labelledby="detailModalLabel<?= $w['id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel<?= $w['id']; ?>"><?= esc($w['nama']); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <p><strong>Lokasi:</strong> <?= esc($w['lokasi']); ?></p>
                <div class="deskripsi-text" style="text-align: justify; line-height: 1.6;">
                    <?= nl2br(esc($w['deskripsi'])); ?>
                </div>
                <?php if ($w['gambar']): ?>
                    <div class="text-center mt-4">
                        <img src="<?= base_url('uploads/wisata/'.$w['gambar']); ?>" 
                             class="img-fluid rounded shadow-sm" 
                             alt="<?= esc($w['nama']); ?>">
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

                    
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning mt-3">Belum ada data wisata.</div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection(); ?>
