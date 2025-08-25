<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2C5B5A;
            --secondary-color: #EAE7DC;
            --accent-color: #E85A4F;
        }
        body {
            font-family: 'Work Sans', sans-serif;
            background-color: var(--secondary-color);
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: white;
            border: 0;
            border-radius: 1.5rem;
            box-shadow: 0 1rem 3rem rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .login-card-img {
            background: url('https://images.unsplash.com/photo-1557682250-33bd709cbe85?q=80&w=2070') no-repeat center center;
            background-size: cover;
        }
        .login-form {
            padding: 3rem;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(44, 91, 90, 0.25);
        }
        .btn-login {
            background-color: var(--primary-color);
            border: 0;
            padding: 0.75rem;
            font-weight: 700;
        }
        .btn-login:hover {
            background-color: #1e3c3b;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="col-lg-8 col-xl-7">
            <div class="card login-card">
                <div class="row g-0">
                    <div class="col-md-6 d-none d-md-block login-card-img"></div>
                    <div class="col-md-6">
                        <div class="login-form">
                            <div class="text-center mb-4">
                                <img src="/img/logo.png" alt="Logo" style="max-height: 60px;">
                                <h4 class="mt-3 fw-bold">Login Administrator</h4>
                                <p class="text-muted small">Website Desa Kaliboja</p>
                            </div>
                            
                            <form action="/login/process" method="post"> 
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-login" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>