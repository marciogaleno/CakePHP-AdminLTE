<div class="box-header with-border">
  <h3 class="box-title">Visualizar grupo de menu</h3>
</div><!-- /.box-header -->
<div class="box-body">
  <div class="table-responsive mailbox-messages">
    <table class="table table-bordered table-striped">
      <tbody>
          <?php if (!empty($groupMenu)): ?>
            <tr>
              <td><b>Nome</b></td>
              <td><?= $groupMenu->name ?></td>
            </tr>

            <tr>
              <td><b>Icone</b></td>
              <td><?= $groupMenu->icon ?></td>
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
          'actions' => ['edit' => "/users/edit/{$groupMenu->id}", 'delete' => $groupMenu]]
          )
        ;?>           
    </div>
  </div>
  </br>
</div>
<?= $this->element('deleteModal', ['title' => 'Exclusão de Grupo de Menu', 'msg' => 'Tem certeza que deseja excluir esse grupo de menu?']);?>
             