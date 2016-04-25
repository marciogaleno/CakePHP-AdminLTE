<?= $this->BForm->create($user) ?>
<fieldset>
    <legend><?= __('Adicionar usuário') ?></legend>
    <?php
        echo $this->Form->input('name',['placeholder' => 'Nome']);

        echo $this->Form->input('email', ['placeholder' => 'E-mail']);

        echo $this->Form->input('gender', 
                ['type' => 'select', 'label' => 'Gênero', 'options' => $options, 'style' => 'position: relative;left: 14px;width:430px', 'empty' => '(Escolha um gênero)']             
             );

        echo $this->Form->input('profile_id', 
                ['placeholder' => 'Digite sua senha', 'style' => 'position: relative;left: 14px;width:430px', 'empty' => '(Escolha um perfil)', 'requerid' => false]
             );

        echo $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS . $this->name)]]);
    ?>
</fieldset>
<?= $this->Form->end() ?>

