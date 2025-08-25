<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- Tambahkan Bootstrap Icons jika belum ada di layout/template -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* =================================================================
       STYLE UNTUK NAVBAR
    ================================================================= */
    .navbar-nav .nav-link,
    .navbar-brand {
        color: #FFFFFF !important;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }
    .navbar-nav .nav-link:hover {
        color: rgba(255, 255, 255, 0.7) !important;
    }

    /* =================================================================
       PALET WARNA & FONT
    ================================================================= */
    :root {
        --primary-color: #2F4858;     /* Biru Hutan Gelap */
        --accent-color: #A47F6A;      /* Terakota Hangat */
        --background-color: #F4F1EA;  /* Krem Lembut */
        --surface-color: #FFFFFF;     /* Putih untuk Kartu */
        --text-color: #3C3C3C;        /* Abu-abu Hangat */
        --heading-color: #2F4858;     /* Sama dengan Warna Utama */

        --font-heading: 'Lora', serif;
        --font-body: 'Poppins', sans-serif;
    }

    body {
        background-color: var(--background-color);
        font-family: var(--font-body);
        color: var(--text-color);
        overflow-x: hidden;
    }

    /* =================================================================
       HERO HEADER
    ================================================================= */
    .profile-hero-header {
        position: relative;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
        overflow: hidden;
    }
    .hero-background-parallax {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 120%;
        background: url('https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?q=80&w=2070') center center;
        background-size: cover;
        z-index: -2;
    }
    .hero-overlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: linear-gradient(35deg, rgba(47, 72, 88, 0.7), rgba(0, 0, 0, 0.5));
        z-index: -1;
    }
    .hero-content h1 {
        font-family: var(--font-heading);
        font-size: clamp(3rem, 7vw, 5.5rem);
        font-weight: 700;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.6);
        letter-spacing: 1px;
        margin-bottom: 1rem;
    }
    .hero-content p {
        font-size: 1.4rem;
        max-width: 700px;
        margin: 0 auto;
        font-weight: 300;
        text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    }
    .shape-divider {
        position: absolute;
        bottom: 0; left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
    }
    .shape-divider svg {
        width: calc(100% + 1.3px);
        height: 150px;
    }
    .shape-divider .shape-fill {
        fill: var(--background-color);
    }

    /* =================================================================
       KONTEN
    ================================================================= */
    .profile-section {
        padding: 100px 0;
    }
    .scroll-reveal {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }
    .scroll-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }
    .profile-card {
        background-color: var(--surface-color);
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
        padding: 2.5rem;
        margin-bottom: 2rem;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .profile-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
    }
    .profile-card h3 {
        font-family: var(--font-heading);
        color: var(--heading-color);
        font-weight: 600;
        margin-bottom: 1.5rem;
        font-size: 2rem;
        border-left: 4px solid var(--accent-color);
        padding-left: 1rem;
    }

    /* Struktur Organisasi */
    .organization-chart { text-align: center; margin-top: 2rem; }
    .organization-chart ul { padding: 0; list-style: none; position: relative; }
    .organization-chart li { display: inline-block; vertical-align: top; padding: 20px 5px; position: relative; }

    /* Garis */
    .organization-chart li::before,
    .organization-chart li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 2px solid #ccc;
        width: 50%;
        height: 20px;
    }
    .organization-chart li::after {
        right: auto; left: 50%; border-left: 2px solid #ccc;
    }
    .organization-chart li:only-child::after,
    .organization-chart li:only-child::before { display: none; }

    .org-node {
        padding: 0.8rem 1.2rem;
        border-radius: 8px;
        min-width: 180px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        border: 1px solid #ddd;
        background-color: var(--surface-color);
        transition: transform 0.3s ease;
    }
    .org-node:hover { transform: scale(1.05); }
    .org-node .title { font-weight: 600; display: block; font-size: 1.1rem; color: var(--heading-color); }
    .org-node .subtitle { font-size: 0.9rem; color: var(--text-color); opacity: 0.8; }
    .org-node.kepala-desa { background-color: var(--accent-color); color: #fff; }
    .org-node.sekdes { background-color: var(--accent-color); color: #fff; }
</style>

<header class="profile-hero-header">
    <div class="hero-background-parallax"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1><?= esc($title) ?></h1>
        <p>Menjelajahi Jati Diri, Visi, dan Harapan Desa Kaliboja</p>
    </div>
    <div class="shape-divider">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
</header>

<section class="profile-section">
    <div class="container">
        <div class="row justify-content-center g-5">
            <div class="col-lg-10">
                <div class="profile-card scroll-reveal">
                    <h3>Jejak Sejarah</h3>
                    <p>Desa Kaliboja memiliki sejarah panjang ... (isi narasi sejarah desa di sini).</p>
                </div>
            </div>

            <div class="col-lg-10">
                <div class="profile-card scroll-reveal">
                    <h3>Visi & Misi</h3>
                    <div class="row">
                        <div class="col-md-5 mb-4 mb-md-0">
                            <h5>Visi</h5>
                            <p class="fst-italic">"Menjadi desa yang mandiri, sejahtera, dan berbudaya."</p>
                        </div>
                        <div class="col-md-7">
                            <h5>Misi</h5>
                            <ul class="mission-list">
                                <li><i class="bi bi-people-fill"></i> Peningkatan SDM melalui pendidikan</li>
                                <li><i class="bi bi-graph-up-arrow"></i> Pengembangan potensi ekonomi</li>
                                <li><i class="bi bi-shield-check"></i> Tata kelola pemerintahan transparan</li>
                                <li><i class="bi bi-palette-fill"></i> Pelestarian budaya lokal</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-10">
                <div class="profile-card scroll-reveal">
                    <h3>Struktur Organisasi</h3>
                    <div class="organization-chart">
                        <ul>
                            <li>
                                <div class="org-node kepala-desa">
                                    <span class="title">Kepala Desa</span>
                                </div>
                                <ul>
                                    <li>
                                        <div class="org-node sekdes">
                                            <span class="title">Sekretaris Desa</span>
                                        </div>
                                        <ul>
                                            <li><div class="org-node"><span class="title">Kadus</span><span class="subtitle">Samboja Timur</span></div></li>
                                            <li><div class="org-node"><span class="title">Kadus</span><span class="subtitle">Samboja Barat</span></div></li>
                                            <li><div class="org-node"><span class="title">Kadus</span><span class="subtitle">Kaligenteng</span></div></li>
                                            <li><div class="org-node"><span class="title">Kadus</span><span class="subtitle">Silemud</span></div></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Parallax effect
    const parallaxBg = document.querySelector('.hero-background-parallax');
    window.addEventListener('scroll', function() {
        let offset = window.pageYOffset;
        parallaxBg.style.transform = 'translateY(' + offset * 0.4 + 'px)';
    });

    // Scroll reveal
    const revealElements = document.querySelectorAll('.scroll-reveal');
    const revealOnScroll = () => {
        const windowHeight = window.innerHeight;
        revealElements.forEach(el => {
            const elementTop = el.getBoundingClientRect().top;
            if (elementTop < windowHeight - 150) {
                el.classList.add('visible');
            }
        });
    };
    window.addEventListener('scroll', revealOnScroll);
    document.addEventListener('DOMContentLoaded', revealOnScroll);
</script>

<?= $this->endSection() ?>
