<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Selamat Datang'); ?> | Website Desa</title>
    <link rel="icon" href="/img/logo.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f4f7f6;
        }
        .gallery-container {
            display: flex;
            overflow-x: auto; /* Ini yang membuat bisa digulir horizontal */
            padding: 20px;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* IE 10+ */
        }
        .gallery-container::-webkit-scrollbar { /* WebKit */
            display: none;
        }
        .gallery-item {
            flex: 0 0 auto; /* Mencegah gambar menyusut */
            width: 300px;
            height: 200px;
            margin-right: 15px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Membuat gambar memenuhi kotak tanpa distorsi */
            transition: transform 0.3s ease;
        }
        .gallery-item:hover img {
            transform: scale(1.05);
        }
        .navbar-brand img {
            max-height: 40px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/img/logo.png" alt="Logo Desa" class="me-2">
                <strong>Galeri Desa Makmur Jaya</strong>
            </a>
            <a href="/dashboard" class="btn btn-outline-primary">Login Admin</a>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-4">Galeri Kegiatan Desa</h1>
        <p class="text-center text-muted mb-5">Geser ke samping untuk melihat lebih banyak gambar.</p>

        <!-- Galeri Gambar -->
        <div class="gallery-container">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $image): ?>
                    <div class="gallery-item">
                        <img src="/uploads/news/<?= esc($image['image_filename']); ?>" alt="Kegiatan Desa">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center w-100">Belum ada gambar yang diunggah.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer class="text-center p-4 mt-5 bg-dark text-white">
        &copy; <?= date('Y'); ?> Pemerintah Desa Makmur Jaya.
    </footer>
</body>
</html>