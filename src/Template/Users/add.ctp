<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Adicionar usuário') ?></legend>
    <?php
        echo $this->Form->input('name', ['templateVars' => ['size_element' => '5'], 'placeholder' => 'Nome']);

        echo $this->Form->input('email', ['templateVars' => ['size_element' => '5'], 'placeholder' => 'E-mail']);

        echo $this->Form->input('gender', 
                ['type' => 'select', 'label' => 'Gênero', 'options' => $options, 'style' => 'position: relative;left: 14px;width:430px', 'empty' => '(Escolha um gênero)']             
             );

        echo $this->Form->input('password', ['templateVars' => ['size_element' => '5'], 'placeholder' => 'Senha']);

        echo $this->Form->input('profile_id', 
                ['placeholder' => 'Digite sua senha', 'style' => 'position: relative;left: 14px;width:430px', 'empty' => '(Escolha um perfil)']
             );

        echo $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS. $this->name)]]);
    ?>
</fieldset>
<?= $this->Form->end() ?>

