<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
    	<li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'manageAccount' ]) ?>">Meus dados</a></li>
    	<li class="active"><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'changePassword' ]) ?>">Alterar senha</a></li>
    </ul>
<?= $this->BForm->create($user) ?>
<fieldset>
    <legend><?= __('Alteração de senha') ?></legend>
    <?php
        echo $this->Form->input('password', ['label' => 'Senha atual','type' => 'password', 'required' => false, 'placeholder' => 'Senha atual']);

        echo $this->Form->input('newPassword', ['label' => 'Nova senha','type' => 'password', 'required' => false, 'placeholder' => 'Nova senha']);

        echo $this->Form->input('passwordConfirm', ['label' => 'Confirmar nova senha', 'type' => 'password', 'required' => false, 'placeholder' => 'Repetir nova senha']);
    ?>

<?=  $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS. $this->name)]]); ?>
<?= $this->Form->end() ?>
</fieldset>
	   </div>
	</div>
</div>

