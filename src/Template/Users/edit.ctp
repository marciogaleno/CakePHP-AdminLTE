<?= $this->BForm->create($user) ?>
<fieldset>
    <legend><?= __('Adicionar usuário') ?></legend>
    <?php
        echo $this->Form->input('name', ['templateVars' => ['size_element' => '5'], 'placeholder' => 'Nome']);

        echo $this->Form->input('email', ['templateVars' => ['size_element' => '5'], 'placeholder' => 'E-mail']);

        echo $this->Form->input('gender', 
                ['type' => 'select', 'label' => 'Gênero', 'options' => $options_genders, 'empty' => '(Escolha um gênero)', 'templateVars' => ['size_select' => '5']]             
             );

        echo $this->Form->input('profile_id', 
                ['placeholder' => 'Digite sua senha', 'empty' => '(Escolha um perfil)', 'requerid' => false,  'options' => $options_profiles, 'templateVars' => ['size_select' => '5']]
             );

        echo $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS. $this->name)]]);
    ?>
</fieldset>
<?= $this->Form->end() ?>

