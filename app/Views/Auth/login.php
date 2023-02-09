<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giris Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container my-5">
    <div class="d-flex bg-light p-3 border-bottom align-items-center mb-4">
        <h1 class="display-5">
            Logo
        </h1>
        <div class="ms-auto">
            <a href="<?= base_url('auth/login') ?>" class="btn btn-primary">
                Giris Yap
            </a>
            <a href="<?= base_url('auth/register') ?>" class="btn btn-primary">
                Kayit Ol
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto bg-light p-3 rounded-3 border shadow-sm">
            <h2 class="text-center">
                Giris Yap
            </h2>
            <form action="" method="post">
                <div class="mb-3">
                    <? if (session()->has('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->error ?>
                        </div>
                    <? endif; ?>
                    <? if (session()->has('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->success ?>
                        </div>
                    <? endif; ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email Adresi
                    </label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" placeholder="name@example.com">
                    <span class="text-danger"><?= session()->has('validator') ? error_function(session()->validator, 'email') : null ?></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">
                        Parola
                    </label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="*********">
                    <span class="text-danger"><?= session()->has('validator') ? error_function(session()->validator, 'password') : null ?></span>
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <div class="ms-auto">
                            <a href="#">Parolami Unuttum?</a>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <?= csrf_field() ?>
                    <button class="btn btn-primary w-100">
                        Giris Yap
                    </button>
                </div>
                <div class="mb-3 text-center">
                    Hesabiniz yok mu? <a href="<?= base_url('auth/register') ?>">Hesap Olustur</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>