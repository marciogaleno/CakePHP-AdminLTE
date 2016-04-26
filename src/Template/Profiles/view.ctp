<div class="box-header with-border">
  <h3 class="box-title"><?= 'Perfil ' . $profile->name?></h3>
</div><!-- /.box-header -->
<div class="box-body">
  <div class="table-responsive mailbox-messages">
    <table class="table table-bordered table-striped">
      <thead>
          <tr>
            <th><?= 'Perfil ' . $profile->name?></th>
            <th>Áreas de acesso</th>
          </tr>
      </thead>
      <tbody>
            <tr>
              <td></td>
              <td>
                <?php if (!empty($profile)) :?>
                  <?php foreach($profile->areas as $area):?>
                    <p><?= $area->controller_label?> &raquo; <?= $area->action_label?></p>
                  <?php endforeach;?>
                <?php endif;?>
              </td>
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
<?= $this->element('deleteModal', ['title' => 'Exclusão de Perfil', 'msg' => 'Tem certeza que deseja excluir esse perfil?']);?>


             