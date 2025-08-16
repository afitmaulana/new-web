<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Portal Berita</a>
            <a href="/login" class="btn btn-outline-primary">Login</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <h1 class="mb-4">Berita Terbaru</h1>
            <?php if (!empty($news) && is_array($news)): ?>
                <?php foreach ($news as $item): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= base_url('uploads/' . $item['image']) ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($item['title']) ?></h5>
                                <p class="card-text"><?= substr(esc($item['content']), 0, 100) ?>...</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Belum ada berita.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>