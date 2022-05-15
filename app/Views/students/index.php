<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>

<div class="row badge-danger ">
    <div class="col-md-12">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Alunos</h1>

            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= site_url('student/newStudent'); ?>" class="btn btn-primary">Novo aluno</a>
                </div>
            </div>
            <div class="row">
                <?php for ($i = 0; $i < 6; $i++) : ?>
                    <div class="col-md-4">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-success">Aluno</strong>
                                <h3 class="mb-0">Luciano</h3>
                                <p class="mb-auto"><strong>Endereço</strong>. dadsdsadadas</p>
                                <p class="mb-auto"> <a href="#" class="btn btn-success btn-sm ">Editar</a>
                                    <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                                </p>

                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>

                            </div>
                        </div>

                    </div>
                <?php endfor; ?>
            </div>

        </main>
        
    </div>
</div>

        
 

<?= $this->endSection() ?>