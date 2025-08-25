<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<style>
    .contact-info-card {
        background: white;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        height: 100%;
        text-align: center;
    }
    .contact-info-card .icon {
        font-size: 3rem;
        color: var(--accent-color);
        margin-bottom: 1rem;
    }
</style>

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Hubungi Kami</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Kami siap membantu dan menerima masukan dari Anda.</p>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row g-4">
        <div class="col-lg-4" data-aos="fade-up">
            <div class="contact-info-card">
                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                <h5 class="fw-bold">Alamat Kantor Desa</h5>
                <p class="text-muted">Jl. Raya Kaliboja No. 12, Kecamatan Paninggaran, Kabupaten Pekalongan, Jawa Tengah</p>
            </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
             <div class="contact-info-card">
                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                <h5 class="fw-bold">Telepon</h5>
                <p class="text-muted">(0285) 123-456</p>
            </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
             <div class="contact-info-card">
                <div class="icon"><i class="fas fa-envelope"></i></div>
                <h5 class="fw-bold">Alamat Email</h5>
                <p class="text-muted">kontak@kaliboja.desa.id</p>
            </div>
        </div>
    </div>

    <div class="mt-5 pt-5">
        <h2 class="text-center section-title" data-aos="fade-up">Lokasi Kami</h2>
        <div class="card shadow-sm" data-aos="fade-up">
             <div class="card-body p-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.32289139178!2d109.69172105!3d-7.009363899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fe37a6aaaaaab%3A0x5027a76e3568b20!2sPekalongan%2C%20Kota%20Pekalongan%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1689234567890!5m2!1sid!2sid" width="100%" height="450" style="border:0; border-radius: 0.5rem;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>