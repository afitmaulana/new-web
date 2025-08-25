<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<style>
    .service-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        transition: all 0.3s ease;
        border-left: 5px solid var(--primary-color);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .service-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 12px 25px rgba(44, 91, 90, 0.15);
        border-left-color: var(--accent-color);
    }
    .service-card .icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }
    .service-card .card-title {
        color: var(--text-dark);
    }
</style>

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Layanan Desa Online</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Ajukan surat keterangan yang Anda butuhkan secara mudah dan cepat.</p>
    </div>
</div>

<section class="container my-5 py-5">
    <h2 class="text-center section-title" data-aos="fade-up">Pilih Jenis Surat</h2>
    <div class="row g-4">
        
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <a href="/skm" class="text-decoration-none">
                <div class="service-card">
                    <div class="icon"><i class="fas fa-file-invoice-dollar"></i></div>
                    <div class="card-body p-0">
                        <h5 class="card-title fw-bold">Surat Keterangan Miskin (SKM)</h5>
                        <p class="card-text small text-muted">Surat keterangan yang menyatakan bahwa pemohon termasuk dalam kategori keluarga miskin atau tidak mampu.</p>
                    </div>
                    <div class="mt-auto pt-3">
                        <span class="fw-bold text-primary-color">Ajukan Sekarang <i class="fas fa-arrow-right fa-sm"></i></span>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
             <a href="/skk" class="text-decoration-none">
                <div class="service-card">
                    <div class="icon"><i class="fas fa-file-alt"></i></div>
                    <div class="card-body p-0">
                        <h5 class="card-title fw-bold">Surat Keterangan Kematian (SKK)</h5>
                        <p class="card-text small text-muted">Surat keterangan yang diterbitkan untuk menyatakan bahwa seseorang telah meninggal dunia.</p>
                    </div>
                     <div class="mt-auto pt-3">
                        <span class="fw-bold text-primary-color">Ajukan Sekarang <i class="fas fa-arrow-right fa-sm"></i></span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
             <a href="/surat-usaha" class="text-decoration-none">
                <div class="service-card">
                    <div class="icon"><i class="fas fa-store"></i></div>
                    <div class="card-body p-0">
                        <h5 class="card-title fw-bold">Surat Keterangan Usaha (SKU)</h5>
                        <p class="card-text small text-muted">Surat yang menerangkan bahwa pemohon memiliki suatu usaha. Diperlukan untuk berbagai keperluan legal.</p>
                    </div>
                     <div class="mt-auto pt-3">
                        <span class="fw-bold text-primary-color">Ajukan Sekarang <i class="fas fa-arrow-right fa-sm"></i></span>
                    </div>
                </div>
            </a>
        </div>

        </div>
</section>

<?= $this->endSection() ?>