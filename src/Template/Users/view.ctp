<div class="box-header with-border">
  <h3 class="box-title">Visualizar usuário</h3>
</div><!-- /.box-header -->
<div class="box-body">
  <div class="table-responsive mailbox-messages">
    <table class="table table-bordered table-striped">
      <tbody>
          <?php if (!empty($user)): ?>
            <tr>
              <td><b>Nome</b></td>
              <td><?= $user->name ?></td>
            </tr>

            <tr>
              <td><b>E-mail</b></td>
              <td><?= $user->email ?></td>
            </tr>

            <tr>
              <td><b>Gênero</b></td>
              <td><?= $user->gender ?></td>
            </tr>

            <tr>
              <td><b>Perfil</b></td>
              <td><?= $user->profile->name ?></td>
            </tr>
          <?php endif;?>
      </tbody>
    </table><!-- /.table -->
  </div><!-- /.mail-box-messages -->
</div><!-- /.box-body -->
<div class="box-footer">
  <div class="mailbox-controls">
    <div class="pull-right">
        <?= $this->element('buttonsCrud', [
          'actions' => ['edit' => "/users/edit/{$user->id}", 'delete' => $user]]
          )
        ;?>           
    </div>
  </div>
  </br>
</div>

             