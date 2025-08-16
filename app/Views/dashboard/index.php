<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary">
                Selamat datang kembali, <strong><?= session()->get('username'); ?></strong>!
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Total Penduduk</h5>
                            <p class="card-text fs-2 fw-bold">1,250</p>
                        </div>
                        <i class="fas fa-users card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Total Berita</h5>
                            <p class="card-text fs-2 fw-bold"><?= $total_news; ?></p>
                        </div>
                        <i class="fas fa-newspaper card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-info shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Layanan Surat</h5>
                            <p class="card-text fs-2 fw-bold">25</p>
                        </div>
                        <i class="fas fa-envelope-open-text card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>