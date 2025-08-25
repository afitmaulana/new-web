<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<style>
    /* CSS Khusus Halaman Home */
    .hero-section {
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=2071&auto=format&fit=crop') no-repeat center center;
        background-size: cover;
        background-attachment: fixed;
        color: var(--text-light);
        padding: 14rem 0;
        text-align: center;
    }
    .hero-section h1 {
        font-family: 'Merriweather', serif; font-weight: 900; font-size: 4.5rem;
        text-shadow: 0 4px 15px rgba(0, 0, 0, 0.5); letter-spacing: 1.5px;
    }
    .typed-text {
        border-right: .15em solid var(--accent-color);
        white-space: nowrap; overflow: hidden; margin: 0 auto;
        animation: blink-caret .75s step-end infinite;
    }
    @keyframes blink-caret { from, to { border-color: transparent } 50% { border-color: var(--accent-color); } }

    .stat-card {
        background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(15px);
        border-radius: 1rem; padding: 2.5rem; text-align: center;
        box-shadow: 0 8px 32px 0 rgba(44, 91, 90, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.18); transition: all 0.3s ease;
    }
    .stat-card:hover { transform: translateY(-10px) scale(1.02); }
    .stat-card .icon { font-size: 3.5rem; color: var(--accent-color); }
    
    .news-card {
        border-radius: 1rem; overflow:hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }
     .news-card:hover { transform: translateY(-10px); box-shadow: 0 12px 25px rgba(0,0,0,0.12); }
    .news-card-img { height: 200px; object-fit: cover; }
    
    .official-card img {
        width: 150px; height: 150px; object-fit: cover; border-radius: 50%;
        border: 5px solid white; box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
</style>

<header class="hero-section">
    <div class="container">
        <h1 class="typed-text" data-aos="fade-up"></h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="200">Menyajikan informasi terkini seputar kegiatan dan potensi desa untuk masyarakat.</p>
    </div>
</header>

<section class="container my-5 py-5">
     <h2 class="text-center section-title" data-aos="fade-up">Desa dalam Angka</h2>
    <div class="row g-4 justify-content-center">
        <div class="col-lg-3 col-md-6">
            <div class="stat-card" data-aos="fade-up">
                <div class="icon"><i class="fas fa-users"></i></div>
                <h5 class="fw-bold text-uppercase small">Jumlah Penduduk</h5>
                <p class="fs-2 fw-bolder mb-0" style="color: var(--primary-color);">3,450</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="fas fa-male"></i></div>
                <h5 class="fw-bold text-uppercase small">Laki-laki</h5>
                <p class="fs-2 fw-bolder mb-0" style="color: var(--primary-color);">1,720</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="fas fa-female"></i></div>
                <h5 class="fw-bold text-uppercase small">Perempuan</h5>
                <p class="fs-2 fw-bolder mb-0" style="color: var(--primary-color);">1,730</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="fas fa-home"></i></div>
                <h5 class="fw-bold text-uppercase small">Jumlah KK</h5>
                <p class="fs-2 fw-bolder mb-0" style="color: var(--primary-color);">980</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: var(--secondary-color);">
    <div class="container">
        <h2 class="text-center section-title" data-aos="fade-up">Kabar Terkini Desa</h2>
        <div class="row g-4">
             <div class="col-lg-3 col-md-6">
                <div class="card news-card h-100" data-aos="fade-up">
                    <img src="https://images.unsplash.com/photo-1521295121783-8a321d551ad2?q=80&w=2070" class="card-img-top news-card-img" alt="Berita 1">
                    <div class="card-body">
                        <small class="text-muted">20 Agustus 2025</small>
                        <h5 class="card-title fw-bold mt-2">Pembangunan Jalan Usaha Tani</h5>
                        <p class="card-text small">Pemerintah Desa Kaliboja telah menyelesaikan pembangunan jalan usaha tani sepanjang 500 meter...</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <a href="/berita/detail" class="text-primary-color fw-bold">Baca Selengkapnya <i class="fas fa-arrow-right fa-sm"></i></a>
                    </div>
                </div>
            </div>
            </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="/berita" class="btn btn-outline-primary">Lihat Semua Berita</a>
        </div>
    </div>
</section>

<section class="py-5 my-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-center" data-aos="fade-right">
                <div class="official-card">
                    <img src="/img/kades.jpg" class="mb-3" alt="Kepala Desa"> <h4 class="mb-1 fw-bold">Nama Kepala Desa</h4>
                    <p class="text-muted fst-italic">Kepala Desa Kaliboja</p>
                </div>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <h2 class="section-title text-start mb-4" style="margin-left: -25px !important;">Sambutan Kepala Desa</h2>
                <p class="text-muted">Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>
                <p>Selamat datang di website resmi Desa Kaliboja. Melalui media ini, kami berharap dapat menyajikan informasi yang transparan, akurat, dan bermanfaat bagi seluruh warga. Mari bersama-sama membangun desa kita menjadi lebih maju, sejahtera, dan berbudaya.</p>
                <a href="/profil" class="btn btn-primary mt-3">Lihat Struktur Organisasi</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Animasi Ketik Teks di Hero
    document.addEventListener('DOMContentLoaded', function() {
        const text = "Portal Digital Desa Kaliboja";
        let i = 0;
        const typing = () => {
            if (i < text.length) {
                document.querySelector('.typed-text').innerHTML += text.charAt(i);
                i++;
                setTimeout(typing, 80);
            }
        }
        typing();
    });
</script>
<?= $this->endSection() ?>