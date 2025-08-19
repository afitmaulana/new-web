<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Selamat Datang'); ?> | Website Desa Kaliboja</title>
    <link rel="icon" href="/img/logo.png" type="image/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f8f9fa;
        }
        .navbar-brand img {
            max-height: 40px;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1599056976487-73a69a163a0a?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 10rem 0;
            text-align: center;
        }
        .hero-section h1 {
            font-weight: 700;
            font-size: 3.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .section-title {
            font-weight: 700;
            color: #343a40;
            position: relative;
            padding-bottom: 15px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            display: block;
            width: 60px;
            height: 4px;
            background: #4e73df;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .stat-card {
            background-color: white;
            border-radius: 0.75rem;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,0.08);
        }
        .stat-card .icon {
            font-size: 3rem;
            color: #4e73df;
        }
        .news-card {
            border: none;
            border-radius: 0.75rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.1);
        }
        .news-card-img {
            height: 200px;
            object-fit: cover;
        }
        .official-card {
            text-align: center;
        }
        .official-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 4px solid #4e73df;
        }
        .potential-card {
            background: white;
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.05);
            text-align: center;
            height: 100%;
        }
        .potential-card .icon {
            font-size: 2.5rem;
            color: #4e73df;
        }
        .footer {
            background-color: #343a40;
            color: #adb5bd;
        }
        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }
        .footer a:hover {
            color: white;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/img/logo.png" alt="Logo Desa" class="me-2">
                <strong>Desa Kaliboja</strong>
            </a>
            <a href="/dashboard" class="btn btn-primary">Login Admin</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container">
            <h1 class="display-4">Portal Informasi Desa Kaliboja</h1>
            <p class="lead">Menyajikan berita dan informasi terkini seputar kegiatan dan potensi desa.</p>
        </div>
    </header>

    <!-- Statistik Desa -->
    <section class="container my-5 py-5">
        <div class="row g-4">
            <?php foreach($stats as $stat): ?>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="icon mb-3"><i class="<?= esc($stat['icon']) ?>"></i></div>
                    <h5 class="fw-bold"><?= esc($stat['label']) ?></h5>
                    <p class="fs-4 mb-0"><?= esc($stat['value']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Berita Terbaru Section -->
    <main class="container my-5">
        <h2 class="text-center mb-5 section-title">Berita Terbaru</h2>
        <div class="row">
            <?php if (!empty($news)): ?>
                <?php foreach ($news as $item): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card news-card h-100 shadow-sm">
                            <img src="<?= $item['image'] ? '/uploads/news/' . esc($item['image']) : 'https://placehold.co/600x400/e0e0e0/666?text=Tidak+Ada+Gambar' ?>" class="card-img-top news-card-img" alt="<?= esc($item['title']) ?>">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title flex-grow-1"><strong><?= esc($item['title']) ?></strong></h6>
                                <p class="card-text small text-muted"><?= esc(word_limiter($item['content'], 15, '...')) ?></p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <small class="text-muted">
                                    <i class="fas fa-clock fa-sm"></i> 
                                    <?= \CodeIgniter\I18n\Time::parse($item['created_at'])->toLocalizedString('d MMMM yyyy') ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center text-muted">Belum ada berita yang dipublikasikan.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>
    
    <!-- Potensi Desa -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 section-title">Potensi Desa</h2>
            <div class="row g-4">
                <?php foreach($potentials as $potential): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="potential-card">
                        <div class="icon mb-3"><i class="<?= esc($potential['icon']) ?>"></i></div>
                        <h5 class="fw-bold"><?= esc($potential['title']) ?></h5>
                        <p class="text-muted small"><?= esc($potential['description']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Aparatur Desa -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5 section-title">Aparatur Desa</h2>
            <div class="row text-center">
                <?php foreach($officials as $official): ?>
                <div class="col-lg-4 mb-4">
                    <div class="official-card">
                        <img src="<?= esc($official['photo']) ?>" class="rounded-circle mb-3" alt="<?= esc($official['name']) ?>">
                        <h5 class="mb-1"><?= esc($official['name']) ?></h5>
                        <p class="text-muted"><?= esc($official['position']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Peta Desa -->
    <section class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31687.97181014818!2d109.65610235!3d-7.000996449999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fe67a4210cfed%3A0x5027a76e3564750!2sPekalongan%2C%20Pekalongan%20City%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1663123456789!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <!-- Footer -->
    <footer class="footer mt-auto py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>Tentang Desa Kaliboja</h5>
                    <p>Website resmi Pemerintah Desa Kaliboja, Kecamatan Paninggaran, Kabupaten Pekalongan. Menyajikan informasi transparan dan akurat untuk masyarakat.</p>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Raya Kaliboja, Paninggaran</li>
                        <li><i class="fas fa-phone me-2"></i> (0285) 123-456</li>
                        <li><i class="fas fa-envelope me-2"></i> kontak@kaliboja.desa.id</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Tautan Terkait</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Kabupaten Pekalongan</a></li>
                        <li><a href="#">Kecamatan Paninggaran</a></li>
                        <li><a href="#">Berita Nasional</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <span>&copy; <?= date('Y'); ?> Pemerintah Desa Kaliboja. All Rights Reserved.</span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
