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
              <th>#</th>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
        </thead>
        <tbody>
          <?php if (!empty($profiles)) :?>
            <?php foreach($profiles as $profile):?>
              <tr>
                <td><i class="fa fa-tag"></i></td>
                <td><?= $profile->name ?></td>
                <td>
                  <?= $this->element('buttonsCrud', [
                        'actions' => ['view' => "/profiles/view/{$profile->id}", 'edit' => "/profiles/edit/{$profile->id}", 'delete' => $profile]]
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