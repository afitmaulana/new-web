<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Desa Kaliboja'); ?> | Website Resmi</title>
  <meta name="description" content="Website resmi Desa Kaliboja - Portal digital untuk transparansi informasi, promosi potensi, dan pelayanan digital kepada masyarakat.">
  <link rel="icon" href="/img/logo.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #4A6C6F;
      --primary-dark: #3a5659;
      --secondary: #F4EAD5;
      --accent: #D6A25B;
      --accent-light: #e6b877;
      --dark: #1f2937;
      --light: #F9F7F3;
      --success: #28a745;
      --text-dark: #333;
      --text-light: #6c757d;
      --shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      --shadow-hover: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    body {
      background: var(--light);
      color: var(--text-dark);
      font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Ubuntu, 'Helvetica Neue', Arial, sans-serif;
      line-height: 1.6;
      scroll-behavior: smooth;
    }
    
    h1, h2, h3, h4, h5, h6, .navbar-brand {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
    }
    
    .navbar {
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      padding: 0.8rem 0;
      transition: all 0.3s ease;
    }
    
    .navbar.scrolled {
      padding: 0.5rem 0;
      background: rgba(255, 255, 255, 0.95) !important;
      backdrop-filter: blur(10px);
    }
    
    .navbar-brand img {
      height: 40px;
      transition: all 0.3s ease;
    }
    
    .navbar.scrolled .navbar-brand img {
      height: 36px;
    }
    
    .nav-link {
      font-weight: 500;
      position: relative;
      padding: 0.5rem 0.8rem !important;
      margin: 0 0.2rem;
      transition: all 0.3s ease;
    }
    
    .nav-link::before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background: var(--accent);
      transition: all 0.3s ease;
      transform: translateX(-50%);
    }
    
    .nav-link:hover::before, .nav-link.active::before {
      width: 70%;
    }
    
    .btn-primary {
      background: var(--primary);
      border-color: var(--primary);
      padding: 0.6rem 1.5rem;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      background: var(--primary-dark);
      border-color: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: var(--shadow-hover);
    }
    
    .btn-outline-primary {
      color: var(--primary);
      border-color: var(--primary);
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-outline-primary:hover {
      background: var(--primary);
      border-color: var(--primary);
      transform: translateY(-2px);
    }
    
    .btn-success {
      background: var(--success);
      border-color: var(--success);
      transition: all 0.3s ease;
    }
    
    .btn-success:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-hover);
    }
    
    .section-title {
      font-weight: 700;
      color: var(--primary);
      text-align: center;
      margin-bottom: 2.4rem;
      position: relative;
    }
    
    .section-title::after {
      content: '';
      display: block;
      width: 84px;
      height: 4px;
      background: var(--accent);
      margin: 0.8rem auto 0;
      border-radius: 2px;
    }
    
    .hero .carousel-item {
      height: 100vh;
      min-height: 600px;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
    }
    
    .hero .carousel-item::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.55));
    }
    
    .hero .carousel-caption {
      z-index: 2;
      bottom: 30%;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .hero h1 {
      font-size: 3.5rem;
      margin-bottom: 1.5rem;
      animation: fadeInDown 1s ease;
    }
    
    .hero p {
      font-size: 1.25rem;
      margin-bottom: 2rem;
      animation: fadeInUp 1s ease;
    }
    
    .stat-card {
      background: #fff;
      border-radius: 1rem;
      padding: 2rem;
      text-align: center;
      box-shadow: var(--shadow);
      transition: all 0.3s ease;
      height: 100%;
      border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .stat-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-hover);
    }
    
    .stat-card i {
      font-size: 2.6rem;
      color: var(--primary);
      margin-bottom: 0.6rem;
    }
    
    .counter {
      font-size: 2.2rem;
      font-weight: 800;
      color: var(--accent);
    }
    
    .card-elev {
      border: none;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: all 0.3s ease;
      height: 100%;
    }
    
    .card-elev:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-hover);
    }
    
    .product-thumb {
      height: 200px;
      object-fit: cover;
      width: 100%;
      transition: all 0.5s ease;
    }
    
    .card-elev:hover .product-thumb {
      transform: scale(1.05);
    }
    
    .official-avatar {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid var(--accent);
      background: #fff;
      box-shadow: var(--shadow);
      transition: all 0.3s ease;
    }
    
    .official-item:hover .official-avatar {
      transform: scale(1.05);
      border-color: var(--accent-light);
    }
    
    footer {
      background: linear-gradient(to right, #0a1920, #111);
      color: #bbb;
      position: relative;
      overflow: hidden;
    }
    
    footer::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(to right, var(--accent), var(--primary));
    }
    
    footer a {
      color: #bbb;
      text-decoration: none;
      transition: all 0.3s ease;
    }
    
    footer a:hover {
      color: #fff;
      padding-left: 5px;
    }
    
    /* Floating */
    .wa-float {
      position: fixed;
      right: 20px;
      bottom: 20px;
      z-index: 1030;
      animation: pulse 2s infinite;
    }
    
    .to-top {
      position: fixed;
      right: 20px;
      bottom: 80px;
      z-index: 1030;
      display: none;
      animation: fadeIn 0.5s ease;
    }
    
    /* Announcement bar */
    .announcement-bar {
      background: linear-gradient(90deg, var(--primary-dark), var(--primary));
      color: white;
      padding: 10px 0;
      position: relative;
      overflow: hidden;
    }
    
    .announcement-bar::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h20L0 20z' fill='%23ffffff' fill-opacity='0.05'/%3E%3C/svg%3E");
      opacity: 0.1;
    }
    
    /* New sections */
    .feature-icon {
      font-size: 2.5rem;
      color: var(--accent);
      margin-bottom: 1rem;
    }
    
    .testimonial-card {
      background: white;
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: var(--shadow);
      position: relative;
      margin-top: 2rem;
    }
    
    .testimonial-card::before {
      content: '\201C';
      font-size: 5rem;
      color: var(--accent-light);
      position: absolute;
      top: -1rem;
      left: 1rem;
      line-height: 1;
      opacity: 0.2;
      font-family: Georgia, serif;
    }
    
    .testimonial-avatar {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--accent);
    }
    
    .gallery-item {
      border-radius: 0.5rem;
      overflow: hidden;
      position: relative;
      cursor: pointer;
    }
    
    .gallery-item img {
      transition: all 0.5s ease;
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    
    .gallery-item:hover img {
      transform: scale(1.1);
    }
    
    .gallery-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
      padding: 1rem;
      color: white;
      transform: translateY(100%);
      transition: all 0.3s ease;
    }
    
    .gallery-item:hover .gallery-overlay {
      transform: translateY(0);
    }
    
    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }
    
    /* Dark mode */
    .dark body {
      background: #0b1220;
      color: #e5e7eb;
    }
    
    .dark .navbar {
      background: #0f172a !important;
    }
    
    .dark .stat-card,
    .dark .card-elev,
    .dark .testimonial-card {
      background: #1e293b;
      color: #e5e7eb;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.35);
    }
    
    .dark footer {
      background: #020617;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2.5rem;
      }
      
      .hero .carousel-item {
        min-height: 500px;
        height: 70vh;
      }
      
      .section-title {
        font-size: 1.8rem;
      }
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">
      <img src="/img/logo.png" class="me-2" alt="Logo">Desa Kaliboja
    </a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item"><a href="#statistik" class="nav-link">Statistik</a></li>
      <li class="nav-item"><a href="#berita" class="nav-link">Berita</a></li>
        <li class="nav-item"><a href="/produk" class="nav-link">Produk</a></li>
        <li class="nav-item"><a href="#potensi" class="nav-link">Potensi</a></li>
        <li class="nav-item"><a href="#agenda" class="nav-link">Agenda</a></li>
        <li class="nav-item"><a href="#aparatur" class="nav-link">Aparatur</a></li>
        <li class="nav-item"><a href="#galeri" class="nav-link">Galeri</a></li>
        <li class="nav-item ms-lg-3"><a href="/login" class="btn btn-primary btn-sm">Login</a></li>
        <li class="nav-item ms-2">
          <button id="darkToggle" class="btn btn-outline-secondary btn-sm" title="Dark Mode"><i class="fa-solid fa-moon"></i></button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Pengumuman (marquee halus) -->


<!-- HERO Carousel -->
<section class="hero">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image:url('https://images.unsplash.com/photo-1591822059941-5d9732490a92?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')">
        <div class="carousel-caption text-center">
          <h1 class="display-4 fw-bold">Desa Kaliboja</h1>
          <p class="lead fs-4">Transparan, partisipatif, dan berdaya saing.</p>
          <a href="/produk" class="btn btn-primary btn-lg mt-3">Lihat Produk Unggulan</a>
        </div>
      </div>
      <div class="carousel-item" style="background-image:url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')">
        <div class="carousel-caption text-center">
          <h1 class="display-4 fw-bold">Potensi Alam & UMKM</h1>
          <p class="lead fs-4">Pertanian, peternakan, kerajinan, dan wisata.</p>
          <a href="#potensi" class="btn btn-primary btn-lg mt-3">Jelajahi Potensi</a>
        </div>
      </div>
      <div class="carousel-item" style="background-image:url('https://images.unsplash.com/photo-1516387938699-a93567ec168e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80')">
        <div class="carousel-caption text-center">
          <h1 class="display-4 fw-bold">Layanan Digital</h1>
          <p class="lead fs-4">Informasi publik, agenda, dan berita terkini.</p>
          <a href="#layanan" class="btn btn-primary btn-lg mt-3">Lihat Layanan</a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

<!-- Visi & Misi Desa -->
<section id="visi-misi" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center mb-4">Visi & Misi Desa</h2>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="p-4 bg-white shadow-sm rounded">

          <!-- Visi -->
          <h4 class="fw-bold text-primary mb-2">Visi</h4>
          <p class="fst-italic text-center mb-4" style="font-size: 1rem; line-height: 1.6;">
            “Terwujudnya Pemerintahan Desa yang Baik dan Bersih Guna Mewujudkan Desa Kaliboja yang Adil, Makmur, Sejahtera, dan Bermasyarakat”
          </p>

          <!-- Misi -->
          <h4 class="fw-bold text-primary mt-3 mb-2">Misi</h4>
          <ol class="mb-0" style="font-size: 1rem; line-height: 1.7;">
            <li>Meningkatkan kualitas pelayanan kepada masyarakat.</li>
            <li>Menyelenggarakan pemerintahan yang bersih, terbebas dari korupsi serta bentuk-bentuk penyelewengan lainnya.</li>
            <li>Meningkatkan partisipasi aktif dan peran serta masyarakat dalam penyelenggaraan pemerintahan, pembangunan, keagamaan, kepemudaan, dan kehidupan bermasyarakat.</li>
            <li>Mewujudkan kehidupan masyarakat yang aman, tentram, dan tertib sehingga tercipta iklim yang kondusif.</li>
            <li>Meningkatkan jumlah dan mutu sarana prasarana serta sumber daya yang dimiliki Pemerintah Desa Kaliboja Kecamatan Paninggaran dalam rangka mendukung tercapainya pemerintahan profesional.</li>
          </ol>

        </div>
      </div>
    </div>
  </div>
</section>



<!-- Statistik -->
<section id="statistik" class="py-5">
  <div class="container text-center">
    <h2 class="section-title mb-4">Statistik Desa</h2>
    <div class="row g-4 justify-content-center">
      <?php foreach($stats as $s): ?>
      <div class="col-6 col-md-3">
        <div class="stat-card shadow-sm p-3 rounded" data-aos="fade-up">
          <i class="<?= esc($s['icon']) ?> mb-2" style="font-size:2rem;"></i>
          <div class="h6 mb-1"><?= esc($s['label']) ?></div>
          <div class="counter fw-bold" data-target="<?= (int)$s['value'] ?>">0</div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-4">
      <a href="/dashboard/statistik" class="btn btn-outline-primary">Lihat Detail Statistik</a>
    </div>
  </div>
</section>


<!-- Berita -->
<section id="berita" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center mb-4">
      <div class="col-12 position-relative text-center">
        <h2 class="section-title m-0">Berita Terbaru</h2>
        <a href="/berita" class="btn btn-outline-primary btn-sm position-absolute end-0 top-50 translate-middle-y">
          Lihat Semua
        </a>
      </div>
    </div>

    <div class="row g-4 justify-content-center">
      <?php if(!empty($news)): foreach($news as $n): ?>
      <div class="col-md-4" data-aos="fade-up">
        <article class="card card-elev h-100">
          <div class="position-relative overflow-hidden">
            <img class="w-100" style="height:200px;object-fit:cover" loading="lazy"
                 src="<?= $n['image'] ? '/uploads/news/'.esc($n['image']) : 'https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80' ?>" 
                 alt="<?= esc($n['title']) ?>">
            <div class="position-absolute top-0 end-0 m-2">
              <span class="badge bg-primary"><?= esc($n['category'] ?? 'Berita') ?></span>
            </div>
          </div>
          <div class="card-body text-start">
            <h5 class="fw-bold mb-2"><?= esc($n['title']) ?></h5>
            <p class="text-muted mb-3"><?= esc(word_limiter(strip_tags($n['content']), 15)) ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-secondary">
                <i class="fa-regular fa-clock me-1"></i><?= date('d M Y', strtotime($n['created_at'])) ?>
              </small>
              <a href="<?= site_url('news/detail/'. esc($n['id'])) ?>" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
            </div>
          </div>
        </article>
      </div>
      <?php endforeach; else: ?>
        <div class="col-12">
          <div class="text-center py-5">
            <i class="fa-regular fa-newspaper fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">Belum ada berita</h5>
            <a href="/dashboard/berita/tambah" class="btn btn-primary mt-2">Tambah Berita Pertama</a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- Wisata -->
<section id="wisata" class="py-5">
  <div class="container">
    <div class="row align-items-center mb-4">
      <div class="col-12 position-relative text-center">
        <h2 class="section-title m-0">Wisata Desa</h2>
        <!-- tombol lihat semua langsung ke route /wisata -->
        <a href="<?= base_url('wisata') ?>" 
           class="btn btn-outline-primary btn-sm position-absolute end-0 top-50 translate-middle-y">
          Lihat Semua
        </a>
      </div>
    </div>

    <div class="row g-4">
      <?php if (!empty($wisata)): foreach ($wisata as $w): ?>
        <div class="col-md-4" data-aos="fade-up">
          <div class="card card-elev h-100">
            <div class="overflow-hidden">
              <img src="<?= $w['gambar'] 
                ? base_url('uploads/wisata/' . esc($w['gambar'])) 
                : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=400&q=80' ?>"
                class="product-thumb w-100" 
                alt="<?= esc($w['nama']) ?>" 
                loading="lazy"
                style="height:200px;object-fit:cover;">
            </div>
            <div class="card-body">
              <h5 class="fw-bold mb-2"><?= esc($w['nama']) ?></h5>
              <p class="text-muted mb-3">
                <?= esc(word_limiter(strip_tags($w['deskripsi']), 15)) ?>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <!-- link detail -->
                <a href="<?= base_url('wisata/' . $w['id']) ?>" 
                   class="btn btn-sm btn-outline-primary">Lihat Detail</a>

                <small class="text-muted">
                  <i class="fa-solid fa-location-dot me-1"></i> 
                  <?= esc($w['lokasi'] ?? 'Kaliboja') ?>
                </small>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; else: ?>
        <div class="col-12">
          <div class="text-center py-5">
            <i class="fa-solid fa-mountain-sun fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">Belum ada data wisata</h5>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- Testimoni -->
<section class="py-5">
  <div class="container">
    <h2 class="section-title">Apa Kata Mereka?</h2>
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="testimonial-card" data-aos="fade-up">
          <div class="d-flex align-items-center mb-3">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" class="testimonial-avatar me-3" alt="Testimoni">
            <div>
              <h5 class="mb-0">Budi Santoso</h5>
              <small class="text-muted">Pelaku UMKM</small>
            </div>
          </div>
          <p class="mb-0">"Berkat website desa, produk saya semakin dikenal dan pemasaran menjadi lebih luas. Terima kasih kepada pengelola website yang telah memfasilitasi kami."</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Agenda -->
<section id="agenda" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center mb-4">
      <div class="col-12 position-relative text-center">
        <h2 class="section-title m-0">Agenda Kegiatan</h2>
        <div class="position-absolute end-0 top-50 translate-middle-y">
          <a href="/agenda" class="btn btn-outline-primary btn-sm me-2">Lihat Semua</a>
          <a href="/dashboard/agenda/tambah" class="btn btn-primary btn-sm">Tambah Agenda</a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 mx-auto">
        <?php if(!empty($events)): foreach($events as $e): ?>
        <div class="card card-elev mb-3" data-aos="fade-up">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="bg-primary text-white text-center p-3 rounded me-4" style="min-width: 70px;">
                <div class="fw-bold fs-4"><?= date('d', strtotime($e['date'])) ?></div>
                <div class="small"><?= date('M', strtotime($e['date'])) ?></div>
              </div>
              <div class="flex-grow-1">
                <h5 class="card-title mb-1"><?= esc($e['title']) ?></h5>
                <p class="card-text small text-muted mb-1">
                  <i class="fa-regular fa-clock me-1"></i> <?= date('H:i', strtotime($e['time'] ?? '08:00')) ?> 
                  <i class="fa-solid fa-location-dot ms-3 me-1"></i> <?= esc($e['location'] ?? 'Lokasi belum ditentukan') ?>
                </p>
                <p class="card-text small"><?= esc(word_limiter($e['description'] ?? '', 20)) ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; else: ?>
          <div class="text-center py-5">
            <i class="fa-regular fa-calendar fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">Belum ada agenda</h5>
            <a href="/dashboard/agenda/tambah" class="btn btn-primary mt-2">Tambah Agenda Pertama</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- Aparatur -->
<style>
  /* Warna biru keabu-abuan */
  .text-desa {
    color: #4E6E6E !important;
  }
  .bg-desa {
    background-color: #4E6E6E !important;
    color: #fff !important;
  }
  /* Kotakan seragam */
  .box-desa {
    border: 2px solid #4E6E6E;   /* warna tepi */
    border-radius: 10px;         /* sudut melengkung */
    padding: 15px;               /* jarak dalam */
    background-color: #fff;      /* latar putih biar rapi */
  }
</style>

<section id="aparatur" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center mb-5 text-desa">
      <div class="d-flex justify-content-between align-items-center mb-3"></div>
      Struktur Pemerintah Desa Kaliboja
    </h2>

    <!-- Kepala Desa -->
    <div class="text-center mb-5">
      <div class="box-desa d-inline-block shadow">
        <h4 class="fw-bold mb-0 text-desa">Kepala Desa</h4>
      </div>
    </div>

    <!-- Sekretaris + Kasi Pemerintahan -->
    <div class="row justify-content-center mb-4">
      <div class="col-md-4 mb-3">
        <div class="box-desa h-100 text-center shadow-sm">
          <h5 class="fw-bold text-desa">Sekretaris Desa</h5>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="box-desa h-100 text-center shadow-sm">
          <h5 class="fw-bold text-desa">Kasi Pemerintahan</h5>
        </div>
      </div>
    </div>

    <!-- Kasi lainnya + Kaur -->
    <div class="row justify-content-center mb-4">
      <div class="col-md-3 mb-3">
        <div class="box-desa h-100 text-center shadow-sm">
          <h6 class="fw-bold text-desa">Kasi Kesra & Pelayanan</h6>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="box-desa h-100 text-center shadow-sm">
          <h6 class="fw-bold text-desa">Kaur Umum & Perencanaan</h6>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="box-desa h-100 text-center shadow-sm">
          <h6 class="fw-bold text-desa">Kaur Keuangan</h6>
        </div>
      </div>
    </div>

    <!-- Kepala Dusun -->
    <h4 class="fw-bold text-center mt-5 mb-3 text-desa">Kepala Dusun</h4>
    <div class="row text-center">
      <div class="col-md-3 mb-3">
        <div class="box-desa shadow-sm">
          <strong>Kadus Samboja Timur</strong>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="box-desa shadow-sm">
          <strong>Kadus Samboja Barat</strong>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="box-desa shadow-sm">
          <strong>Kadus Kaligenteng</strong>
        </div>
      </div>
      <div class="col-md-3 mb-3">
        <div class="box-desa shadow-sm">
          <strong>Kadus Silemud</strong>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Galeri -->
<section id="galeri" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center mb-4">
      <div class="col-12 position-relative text-center">
        <h2 class="section-title m-0">Galeri Desa</h2>
        <a href="<?= base_url('galeri') ?>" 
           class="btn btn-outline-primary btn-sm position-absolute end-0 top-50 translate-middle-y">
          Lihat Semua
        </a>
      </div>
    </div>

    <div class="row g-3">
      <div class="col-md-4" data-aos="fade-up">
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1516387938699-a93567ec168e?auto=format&fit=crop&w=400&q=80" alt="Kegiatan Desa">
          <div class="gallery-overlay">
            <h6 class="mb-0">Kegiatan Desa</h6>
            <small>Kerja bakti bulanan</small>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=400&q=80" alt="Panen Raya">
          <div class="gallery-overlay">
            <h6 class="mb-0">Panen Raya</h6>
            <small>Hasil pertanian desa</small>
          </div>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1591822059941-5d9732490a92?auto=format&fit=crop&w=400&q=80" alt="Pemandangan Desa">
          <div class="gallery-overlay">
            <h6 class="mb-0">Pemandangan Desa</h6>
            <small>Keindahan alam Kaliboja</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Peta -->
<section class="container-fluid p-0">
  <div class="row g-0">
    <div class="col-md-8">
      <iframe src="https://maps.google.com/maps?q=desa%20kaliboja&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450" style="border:0" loading="lazy" allowfullscreen></iframe>
    </div>
    <div class="col-md-4 bg-primary text-white p-5">
      <h3 class="mb-4">Kunjungi Desa Kami</h3>
      <p><i class="fa-solid fa-location-dot me-2"></i> Jl. Raya Kaliboja, Paninggaran, Pekalongan, Jawa Tengah</p>
      <p><i class="fa-solid fa-phone me-2"></i> (0285) 123-456</p>
      <p><i class="fa-solid fa-envelope me-2"></i> kontak@kaliboja.desa.id</p>
      <p><i class="fa-solid fa-clock me-2"></i> Senin - Jumat: 08:00 - 16:00</p>
      <a href="https://goo.gl/maps/example" target="_blank" class="btn btn-light mt-3">
        <i class="fa-solid fa-directions me-2"></i> Dapatkan Petunjuk Arah
      </a>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="mt-0">
  <div class="container py-5">
    <div class="row g-4">
      <div class="col-md-4">
        <h5 class="text-white mb-4">Desa Kaliboja</h5>
        <p class="mb-4">Portal resmi desa untuk transparansi informasi, promosi potensi, dan pelayanan digital kepada masyarakat.</p>
        <div class="d-flex">
          <a href="#" class="text-white me-3"><i class="fa-brands fa-facebook fa-lg"></i></a>
          <a href="#" class="text-white me-3"><i class="fa-brands fa-instagram fa-lg"></i></a>
          <a href="#" class="text-white me-3"><i class="fa-brands fa-youtube fa-lg"></i></a>
          <a href="#" class="text-white"><i class="fa-brands fa-whatsapp fa-lg"></i></a>
        </div>
      </div>
      <div class="col-md-4">
        <h5 class="text-white mb-4">Kontak</h5>
        <ul class="list-unstyled small">
          <li class="mb-2"><i class="fa-solid fa-location-dot me-2"></i>Jl. Raya Kaliboja, Paninggaran</li>
          <li class="mb-2"><i class="fa-solid fa-phone me-2"></i>(0285) 123-456</li>
          <li class="mb-2"><i class="fa-solid fa-envelope me-2"></i>kontak@kaliboja.desa.id</li>
          <li><i class="fa-solid fa-clock me-2"></i>Senin - Jumat: 08:00 - 16:00</li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5 class="text-white mb-4">Tautan Cepat</h5>
        <div class="row">
          <div class="col-6">
            <ul class="list-unstyled small">
              <li class="mb-2"><a href="/berita">Berita</a></li>
              <li class="mb-2"><a href="/produk">Produk</a></li>
              <li class="mb-2"><a href="/agenda">Agenda</a></li>
              <li class="mb-2"><a href="/galeri">Galeri</a></li>
            </ul>
          </div>
          <div class="col-6">
            <ul class="list-unstyled small">
              <li class="mb-2"><a href="/layanan">Layanan</a></li>
              <li class="mb-2"><a href="/potensi">Potensi</a></li>
              <li class="mb-2"><a href="/aparatur">Aparatur</a></li>
              <li class="mb-2"><a href="/peta">Peta</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr class="border-secondary my-4">
    <div class="text-center small">
      <div class="mb-2">&copy; <?= date('Y') ?> Pemerintah Desa Kaliboja. All Rights Reserved.</div>
      <div>Dikembangkan oleh <a href="#" class="text-white">Tim IT Desa Kaliboja</a></div>
    </div>
  </div>
</footer>

<!-- Floating WA & To Top -->
<a class="wa-float btn btn-success rounded-circle shadow" href="https://wa.me/6281234567890" target="_blank" title="Hubungi via WhatsApp">
  <i class="fa-brands fa-whatsapp fa-lg"></i>
</a>

<button id="toTop" class="to-top btn btn-primary rounded-circle shadow" title="Kembali ke atas">
  <i class="fa-solid fa-arrow-up"></i>
</button>

<!-- Loading Spinner -->
<div class="loading-spinner" style="position:fixed;top:0;left:0;width:100%;height:100%;background:white;z-index:9999;display:flex;align-items:center;justify-content:center;transition:opacity 0.5s ease">
  <div class="spinner-border text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  // Inisialisasi AOS
  AOS.init({
    once: true,
    duration: 800,
    offset: 100
  });

  // Loading spinner
  window.addEventListener('load', function() {
    document.querySelector('.loading-spinner').style.opacity = '0';
    setTimeout(function() {
      document.querySelector('.loading-spinner').style.display = 'none';
    }, 500);
  });

  // Counter animation
  document.querySelectorAll('.counter').forEach(el => {
    const target = +el.dataset.target || 0;
    let c = 0;
    const step = Math.max(1, Math.floor(target / 80));
    const itv = setInterval(() => {
      c += step;
      if (c >= target) {
        c = target;
        clearInterval(itv);
      }
      el.textContent = c.toLocaleString('id-ID');
    }, 20);
  });

  // Scroll effects & to top
  const toTop = document.getElementById('toTop');
  const navbar = document.querySelector('.navbar');
  window.addEventListener('scroll', () => {
    toTop.style.display = window.scrollY > 400 ? 'block' : 'none';
    if (window.scrollY > 100) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
  toTop.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  // Dark mode (client only)
  const darkToggle = document.getElementById('darkToggle');
  const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

  // Cek preferensi sistem atau localStorage
  if (localStorage.getItem('darkMode') === 'enabled' ||
    (localStorage.getItem('darkMode') !== 'disabled' && darkModeMediaQuery.matches)) {
    document.documentElement.classList.add('dark');
    darkToggle.innerHTML = '<i class="fa-solid fa-sun"></i>';
  }

  darkToggle.addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    if (document.documentElement.classList.contains('dark')) {
      localStorage.setItem('darkMode', 'enabled');
      darkToggle.innerHTML = '<i class="fa-solid fa-sun"></i>';
    } else {
      localStorage.setItem('darkMode', 'disabled');
      darkToggle.innerHTML = '<i class="fa-solid fa-moon"></i>';
    }
  });

  // Tanggal dan waktu real-time
  function updateDateTime() {
    const now = new Date();
    const options = {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    };
    const dateString = now.toLocaleDateString('id-ID', options);
    const timeString = now.toLocaleTimeString('id-ID');
    const dateElement = document.getElementById('current-date');
    const timeElement = document.getElementById('current-time');
    if (dateElement) dateElement.textContent = dateString;
    if (timeElement) timeElement.textContent = timeString;
  }
  setInterval(updateDateTime, 1000);
  updateDateTime();

  // Animasi teks hero
  document.addEventListener('DOMContentLoaded', function() {
    const heroText = document.querySelector('.hero .carousel-caption');
    if (heroText) {
      heroText.style.opacity = '0';
      setTimeout(() => {
        heroText.style.transition = 'opacity 1s ease';
        heroText.style.opacity = '1';
      }, 300);
    }
  });

  // Smooth scroll untuk navigasi
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        const navbarHeight = document.querySelector('.navbar').offsetHeight;
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
</script>
</body>
</html>
