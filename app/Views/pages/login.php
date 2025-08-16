<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin | Website Desa</title>
  <link rel="icon" href="/img/logo.png" type="image/png">

  <!-- Google Font: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <style>
    body.login-page {
      font-family: 'Poppins', sans-serif;
      /* Ganti URL ini dengan path ke gambar Anda, misalnya /img/bg-login.jpg */
      background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1932&auto=format&fit=crop');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
    .login-box .card {
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      /* Menambahkan sedikit transparansi agar background terlihat */
      background-color: rgba(255, 255, 255, 0.95);
    }
    .login-logo a {
        color: #495057;
        font-weight: 600;
    }
    .btn-primary {
        background-color: #6a5acd;
        border-color: #6a5acd;
    }
    .btn-primary:hover {
        background-color: #5d4db2;
        border-color: #5d4db2;
    }
    .input-group-text {
        width: 42px;
        justify-content: center;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo dipindahkan ke dalam card -->
  <div class="card">
    <div class="card-body login-card-body">
      
      <!-- Logo dan Judul dipindahkan ke sini -->
      <div class="login-logo mb-4 text-center">
        <img src="/img/logo.png" alt="Logo Desa" style="max-width: 90px; margin-bottom: 15px;">
        <h3 class="text-dark"><b>Admin</b> Desa</h3>
      </div>

      <p class="login-box-msg">Silakan masuk untuk memulai sesi Anda</p>

      <!-- Menampilkan error kredensial -->
      <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger py-2"><?= session()->getFlashdata('msg') ?></div>
      <?php endif;?>

      <!-- Menampilkan error validasi -->
      <?php if(session()->has('errors')): ?>
          <div class="alert alert-danger py-2">
              <ul class="mb-0 ps-3">
              <?php foreach (session('errors') as $error): ?>
                  <li><?= esc($error) ?></li>
              <?php endforeach ?>
              </ul>
          </div>
      <?php endif; ?>

      <form action="/auth/login" method="post">
        <?= csrf_field(); ?>
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
          <input type="email" name="email" class="form-control" placeholder="Email" value="<?= old('email') ?>" required>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text"><i class="fas fa-lock"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
