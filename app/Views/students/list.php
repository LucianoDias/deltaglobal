<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Alunos</h1>

    </div>
    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif ?>
    <div class="row ">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="<?= site_url('student'); ?>" class="btn btn-primary">Novo aluno</a>
                </div>
            </div>
            <div class="row">
                <?php foreach ($students as $student) : ?>
                    <div class="col-md-4">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-success">Aluno</strong>
                                <p class="mb-0"><?= $student['name'] ?></p>
                                <p class="mb-auto"><strong>End </strong> <?= $student['address'] ?> </p>
                                <p class="mb-auto"> <a href="<?= site_url('student-edit/' . $student['id']) ?>" class="btn btn-success btn-sm ">Editar</a>
                                    <a href="<?= site_url('student-del/' . $student['id']) ?>" class="btn btn-danger btn-sm" onclick="return excluir()">Excluir</a>
                                </p>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <img src="<?= base_url('uploads/images/' . $student['imagen']); ?>" width="150" height="170">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?= $pager->links() ?>

            <?php if($students == null):?>
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Não tem Registror </h5>
                    <p class="card-text"><small class="text-muted">Cadastrar seus alunos</small></p>
                </div>
            </div>
           <?php endif;?>
    </main>
</div>
</div>
</div>
</div>
</main>



<script>
    function excluir() {

        if (!confirm('Desejar excluir o registro?')) {
            return false;
        }
        return true;
    }
</script>


<?= $this->endSection() ?>