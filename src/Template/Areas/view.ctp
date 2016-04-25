<div class="box-header with-border">
  <h3 class="box-title">Visualizar área</h3>
</div><!-- /.box-header -->
<div class="box-body">
  <div class="table-responsive mailbox-messages">
    <table class="table table-bordered table-striped">
      <tbody>
          <?php if (!empty($area)): ?>
            <tr>
              <td><b>ID</b></td>
              <td><?= $area->id ?></td>
            </tr>
            <tr>
              <td><b>Parent id</b></td>
              <td><?= $area->parent_id ?></td>
            </tr>
            <tr>
              <td><b>Grupo</b></td>
              <td><?= $area->name_group_menu ?></td>
            </tr>
            <tr>
              <td><b>Grupo label</b></td>
              <td><?= $area->label_group_name ?></td>
            </tr>
            <tr>
              <td><b>Aparecer</b></td>
              <td><?= $area->appear ?></td>
            </tr>
            <tr>
              <td><b>Controller</b></td>
              <td><?= $area->controller ?></td>
            </tr>
            <tr>
              <td><b>Controlle label</b></td>
              <td><?= $area->controller_label ?></td>
            </tr>
            <tr>
              <td><b>Action</b></td>
              <td><?= $area->action ?></td>
            </tr>
            <tr>
              <td><b>Action laebl</b></td>
              <td><?= $area->action_label ?></td>
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
          'actions' => ['edit' => "/users/edit/{$area->id}", 'delete' => $area]]
          )
        ;?>           
    </div>
  </div>
  </br>
</div>

             