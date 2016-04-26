<div class="box-header with-border">
  <h3 class="box-title">Filtros</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="mailbox-controls">
      <!-- Check all button -->
      <?= $this->element('buttonsCrud', ['actions' => ['add' => '']]);?>
    </div>
    <div class="table-responsive mailbox-messages">
      <table class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>ID</th>
              <th>Parent id</th>
              <th>Grupo</th>
              <th>Grupo Label</th>
              <th>Aparecer</th>
              <th>Controller</th>
              <th>Controller_label</th>
              <th>Action</th>
              <th>Action label</th>
            </tr>
        </thead>
        <tbody>
          <?php if (!empty($areas)) :?>
            <?php foreach($areas as $area):?>
              <tr>
                <td><?= $area->id ?></td>
                <td><?= $area->parent_id ?></td>
                <td><?= $area->name_group_menu ?></td>
                <td><?= $area->label_group_name ?></td>
                <td><?= $area->appear ?></td>
                <td><?= $area->controller ?></td>
                <td><?= $area->controller_label ?></td>
                <td><?= $area->action ?></td>
                <td><?= $area->action_label ?></td>
                <td>
                  <?= $this->element('buttonsCrud', [
                        'actions' => ['view' => "/areas/view/{$area->id}", 'edit' => "/areas/edit/{$area->id}", 'delete' => $area]]
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
<?= $this->element('deleteModal');?>