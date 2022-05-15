<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar</h1>

    </div>
    <div class="row ">
        <div class="col-md-12">
            <fieldset>
                <legend>Aluno</legend>
                <form action="<?= base_url('student-editAction') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                     <input type="hidden" name="idStudent" id="idStudent" value="<?= $student['id']?>">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome " value="<?= $student['name']?>">

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Endereço</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço" value="<?= $student['address']?>">
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="imagen" name="imagen">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
                    </div>
                </form>
            </fieldset>

        </div>

    </div>
</main>


<?= $this->endSection() ?>