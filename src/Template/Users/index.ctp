<div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Filtros</h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-controls">
              <!-- Check all button -->
              <?= $this->element('buttonsCrud', [
                            'actions' => ['delete' => '', 'add' => ''], 
                            'class_icons' => ['add' => ''], 
                            'class_buttons' => ['add' => '']]
              );?>

                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Excluir</button>
              <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Adicionar</button>
            </div>
            <div class="table-responsive mailbox-messages">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th> <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
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
                        <td><input type="checkbox"></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->email?></td>
                        <td><?= $user->profile->name?></td>
                        <td>
                          <a href="" class="btn btn-primary btn-sm"><i class="fa  fa-edit"></i> Editar</a>
                          <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Excluir</a>
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
        </div><!-- /. box -->

             