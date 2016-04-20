<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Meus dados') ?></legend>
    <?php
        echo $this->Form->input('name', ['templateVars' => ['size_element' => '5'], 'placeholder' => 'Nome']);

        echo $this->Form->input('email', ['templateVars' => ['size_element' => '5'], 'placeholder' => 'E-mail']);

        echo $this->Form->input('gender', 
                ['type' => 'select', 'label' => 'Gênero', 'options' => $options, 'style' => 'position: relative;left: 14px;width:430px', 'empty' => '(Escolha um gênero)']             
             );
        echo $this->Form->input('password', 
                ['label' => 'Senha Atual','placeholder' => 'Senha atual','templateVars' => ['size_element' => '5']]             
             );

    ?>
</fieldset>
    <legend><?= __('Meus dados') ?></legend>
    <?php
        echo $this->Form->input('newPassword', ['label' => 'Nova senha','type' => 'password', 'required' => false, 'templateVars' => ['size_element' => '5'], 'placeholder' => 'Nova senha']);

        echo $this->Form->input('passwordConfirm', ['label' => 'Confirmar nova senha', 'type' => 'password', 'templateVars' => ['size_element' => '5'], 'required' => false, 'placeholder' => 'Repetir nova senha']);
    ?>
</fieldset>
<?=  $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS. $this->name)]]); ?>
<?= $this->Form->end() ?>

