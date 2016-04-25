<div class="box-header with-border">
  <h3 class="box-title">Filtros</h3>
</div><!-- /.box-header -->
<div class="box-body">
  <div class="mailbox-controls">
    <?= $this->element('buttonsCrud', ['actions' => ['add' => '']]);?>
  </div>
  <div class="table-responsive mailbox-messages">
    <table class="table table-bordered table-striped">
      <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Perfil</th>
            <th>Ações</th>
          </tr>
      </thead>
      <tbody>
        <?php if (!empty($users)) :?>
          <?php foreach($users as $user):?>
            <tr>
              <td><i class="fa fa-user"></i></td>
              <td><?= $user->name ?></td>
              <td><?= $user->email?></td>
              <td><?= $user->profile->name?></td>
              <td>
                <?= $this->element('buttonsCrud', [
                      'actions' => ['view' => "/users/view/{$user->id}", 'edit' => "/users/edit/{$user->id}", 'delete' => $user]]
                    )
                ;?>
              </td>
            </tr>
        <?php endforeach;?>
      <?php endif;?>
      </tbody>
    </table><!-- /.table -->
  </div><!-- /.mail-box-messages -->
</div><!-- /.box-body -->
<div class="box-footer no-padding">
  <div class="mailbox-controls">
    <!-- Check all button -->
    <div class="pull-right">
      <?= $this->element('pagination');?>               
    </div><!-- /.pull-right -->
  </div>
</div>

             