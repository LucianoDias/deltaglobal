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
                    Cadastrar
                </div>

                <!-- Login Form -->
                <form action="<?= base_url('auth/save') ?>" method="post">
                    <?= csrf_field(); ?>
                    <?php if(!empty(session()->getFlashdata('fail'))):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail');?></div>
                    <?php endif ?>

                    <?php if(!empty(session()->getFlashdata('success'))):?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success');?></div>
                    <?php endif ?>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" id="name" class="fadeIn second" name="name" placeholder="Nome" >
                        </div>
                        <div class="col-md-12">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'name') : '' ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" id="email" class="fadeIn second" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Senha">
                        </div>
                        <div class="col-md-12">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="password" id="confirm_password" class="fadeIn third" name="confirm_password" placeholder="Confirmar Senha">
                        </div>
                        <div class="col-md-12">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'confirm_password') : '' ?></span>
                        </div>
                    </div>



                    <input type="submit" class="fadeIn fourth" value="Registrar">
                </form>
                <!-- login-->
                <div id="formFooter">
                    <a href="<?= site_url('auth/index') ?>" class="underlineHover" href="#">Login</a>
                </div>

            </div>
        </div>
    </div>

    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>