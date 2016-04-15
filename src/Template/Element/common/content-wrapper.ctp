<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php if ($this->name == 'Pages') {?>
          <?= 'Painel de Controle' ?>
      <?php } else {?>
          <?=  $this->request->session()->read("Auth.User.Profile.{$this->request->param('controller')}.controller_label") ?>
      <?php }?>
    </h1>

    <?= $this->FrontEnd->getNavegation()?>
  </section>

  <!-- Main content -->
  <section class="content">

     <?= $this->Flash->render()?>
    <div class="col-md-12">
      <div class="box box-success">
     <?= $this->fetch('content') ?>
      </div>
    </div>
    <!-- Small boxes (Stat box) -->
    <div class="row">

    </div><!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->

      </section><!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">

      </section><!-- right col -->
    </div><!-- /.row (main row) -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->