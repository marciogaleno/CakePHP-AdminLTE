<div class="box-header with-border">
  <h3 class="box-title">Visualizar usuário</h3>
</div><!-- /.box-header -->
<div class="box-body">
  <div class="table-responsive mailbox-messages">
    <table class="table table-bordered table-striped">
      <thead>
          <tr>
            <th>Nome</th>
            <th>E-mail</th>
          </tr>
      </thead>
      <tbody>
            <tr>
              <td><?= $user->name ?></td>
              <td><?= $user->email ?></td>
              <td><?= $user->perfil->name ?></td>
            </tr>
      </tbody>
    </table><!-- /.table -->
  </div><!-- /.mail-box-messages -->
</div><!-- /.box-body -->
<div class="box-footer">
  <div class="mailbox-controls">
    <div class="pull-right">
        <?= $this->element('buttonsCrud', [
          'actions' => ['edit' => "/profiles/edit/{$profile->id}", 'delete' => $profile]]
          )
        ;?>           
    </div>
  </div>
  </br>
</div>

             