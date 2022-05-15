<?= $this->extend('template/default') ?>
<?= $this->section('content') ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Perfil do Usúario</h1>
        
      </div>
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">Seja Bem Vindo </h5>
          <p class="card-text"><strong>Nome </strong> <?= $userInfo['name'];?> <strong>Email </strong><?= $userInfo['email'];?> </p>
          
          <p class="card-text"><small class="text-muted">Veja seus alunos no menu lista de alunos</small></p>
        </div>
      </div>
    </main>
  </div>
</div>


<?= $this->endSection() ?>