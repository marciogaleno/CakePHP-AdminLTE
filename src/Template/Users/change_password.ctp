<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Alteração de senha') ?></legend>
    <?php
        echo $this->Form->input('password', ['label' => 'Senha atual','type' => 'password', 'required' => false, 'templateVars' => ['size_element' => '5'], 'placeholder' => 'Senha atual']);

        echo $this->Form->input('newPassword', ['label' => 'Nova senha','type' => 'password', 'required' => false, 'templateVars' => ['size_element' => '5'], 'placeholder' => 'Nova senha']);

        echo $this->Form->input('passwordConfirm', ['label' => 'Confirmar nova senha', 'type' => 'password', 'templateVars' => ['size_element' => '5'], 'required' => false, 'placeholder' => 'Repetir nova senha']);
    ?>
</fieldset>
<?=  $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS. $this->name)]]); ?>
<?= $this->Form->end() ?>

