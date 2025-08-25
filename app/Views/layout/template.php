<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Selamat Datang'); ?> | Website Desa Digital</title>
    <link rel="icon" href="/img/logo.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&family=Work+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    /* Mengubah warna link navbar menjadi lebih gelap dan mudah dibaca */
    .navbar-nav .nav-link {
        color: #333333 !important; /* Gunakan warna teks utama */
        font-weight: 600; /* Sedikit lebih tebal agar menonjol */
    }

    /* Mengubah warna link saat di-hover */
    .navbar-nav .nav-link:hover {
        color: #6B705C !important; /* Gunakan warna hijau zaitun dari tema */
    }
</style>
    <style>
        :root {
            --primary-color: #2C5B5A; /* Hijau Pinus Tua */
            --secondary-color: #EAE7DC; /* Krem Pucat */
            --accent-color: #E85A4F; /* Merah Bata Cerah */
            --text-dark: #3E3636;
            --text-light: #F9F9F9;
            --background-light: #FDFDFB;
        }

        body {
            font-family: 'Work Sans', sans-serif;
            background-color: var(--background-light);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        .aurora-background {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -2;
            background: radial-gradient(circle at 10% 20%, rgba(44, 91, 90, 0.08), transparent 40%),
                        radial-gradient(circle at 80% 90%, rgba(232, 90, 79, 0.06), transparent 50%),
                        radial-gradient(circle at 50% 50%, rgba(234, 231, 220, 0.1), transparent 60%);
            animation: aurora 25s infinite linear;
        }
        @keyframes aurora {
            0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; }
        }

        .navbar { transition: all 0.4s ease; }
        .navbar-brand img { max-height: 40px; }
        .navbar-brand strong { color: var(--primary-color); font-weight: 600; }
        .navbar-scrolled {
            background-color: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05) !important;
        }
        .nav-link { font-weight: 500; color: var(--primary-color) !important; }
        .nav-link.active, .nav-link:hover { color: var(--accent-color) !important; }

        .btn-primary {
            background-color: var(--primary-color); border-color: var(--primary-color);
            font-weight: 600; padding: 0.75rem 1.5rem; transition: all 0.2s ease;
        }
        .btn-primary:hover {
            background-color: #1e3c3b; border-color: #1e3c3b;
            transform: translateY(-2px); box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
         .btn-outline-primary {
            color: var(--primary-color); border-color: var(--primary-color);
            font-weight: 600; padding: 0.75rem 1.5rem; transition: all 0.2s ease;
        }
        .btn-outline-primary:hover {
            background-color: var(--primary-color); color: white;
            transform: translateY(-2px); box-shadow: 0 4px 10px rgba(44, 91, 90, 0.2);
        }

        .section-title {
            font-family: 'Merriweather', serif; font-weight: 900; color: var(--primary-color);
            position: relative; padding-bottom: 1.5rem; margin-bottom: 4rem !important;
        }
        .section-title::after {
            content: ''; position: absolute; display: block; width: 50px; height: 5px;
            background: var(--accent-color); border-radius: 5px; bottom: 0;
            left: 50%; transform: translateX(-50%);
        }
        .page-header {
            padding: 8rem 0 6rem 0;
            background-color: var(--secondary-color);
            text-align: center;
        }
        .page-header h1 {
            font-family: 'Merriweather', serif;
            font-weight: 900;
            color: var(--primary-color);
            font-size: 3.5rem;
        }

        .footer { background-color: var(--text-dark); color: #adb5bd; font-size: 0.9rem; }
        .footer h5 { color: white; }
        .footer a { color: #adb5bd; text-decoration: none; transition: color 0.2s ease; }
        .footer a:hover { color: var(--accent-color); }
    </style>
</head>
<body>
    <div class="aurora-background"></div>

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/img/logo.png" alt="Logo Desa" class="me-2">
                <strong>Desa Kaliboja</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="/layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/kontak">Kontak</a></li>
                </ul>
                <div class="d-flex">
                    <a href="/login" class="btn btn-primary">Login Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <?= $this->renderSection('content') ?>
    </main>
    
    <div class="modal fade" id="scanModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Scan QR Code Absensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="reader" style="width:100%; max-width:400px; margin:auto;"></div>
                    <div id="scanResult" class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-5">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>Tentang Desa Kaliboja</h5>
                    <p>Website resmi Pemerintah Desa Kaliboja. Menyajikan informasi transparan dan akurat untuk kemajuan masyarakat.</p>
                </div>
                <div class="col-lg-2 mb-4 mb-lg-0">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="/berita">Berita</a></li>
                        <li><a href="/layanan">Layanan</a></li>
                        <li><a href="/kontak">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Raya Kaliboja, Paninggaran</li>
                        <li><i class="fas fa-phone me-2"></i> (0285) 123-456</li>
                        <li><i class="fas fa-envelope me-2"></i> kontak@kaliboja.desa.id</li>
                    </ul>
                </div>
                 <div class="col-lg-3">
                    <h5>Tautan Terkait</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Kabupaten Pekalongan</a></li>
                        <li><a href="#">Kecamatan Paninggaran</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <span>© <?= date('Y'); ?> Pemerintah Desa Kaliboja. Dirancang dengan <i class="fas fa-heart text-danger"></i>.</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
        
        // Aktifkan link navbar sesuai halaman
        const navLinks = document.querySelectorAll('#navbarNav .nav-link');
        const currentUrl = window.location.pathname;
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentUrl) {
                link.classList.add('active');
            }
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>