<?= $this->Form->create() ?>
  <div class="form-group has-feedback">
    <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'E-mail', 'label' => false])?>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
  </div>
  <div class="form-group has-feedback">
  <?= $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Senha', 'label' => false])?>
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
  </div>
  <div class="row">
    <div class="col-xs-8">
      <div class="checkbox icheck">
        <label>
          <input type="checkbox"> Esqueci minha senha
        </label>
      </div>
    </div>
    <div class="col-xs-4">
      <?= $this->Form->submit('Entrar', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
    </div>
  </div>
  <?= $this->Form->end()?>
