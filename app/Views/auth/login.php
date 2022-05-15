<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href=" <?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" id="bootstrap-css">
    <script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap/js/jquery.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('bootstrap/css/login.css') ?>">


    <title>Login</title>
</head>

<body>
    <div class="container">

        <!------ Include the above in your HEAD tag ---------->

        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
                    Login
                </div>

                <!-- Login Form -->
                <form action="<?= base_url('auth/check') ?>" method="post">
                    <?= csrf_field(); ?>
                    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif ?>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Senha">
                        </div>
                        <div class="col-md-12">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?>
                        </div>
                    </div>
                    <input type="submit" class="fadeIn fourth" value="Entrar">
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a href="<?= site_url('auth/register') ?>" class="underlineHover" href="#">Registrar</a>
                </div>

            </div>
        </div>
    </div>

    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>