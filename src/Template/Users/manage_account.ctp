<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Meus dados') ?></legend>
    <?php
        echo $this->Form->input('name',['placeholder' => 'Nome']);

        echo $this->Form->input('email',['placeholder' => 'E-mail', 'label' => 'E-mail', 'disabled' => true]);

        echo $this->Form->input('gender', 
                ['type' => 'select', 'label' => 'Gênero', 'options' => $options, 'empty' => '(Escolha um gênero)', 'templateVars' => ['size_select' => '5']]             
             );

    ?>
<?=  $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS. $this->name)]]); ?>
<?= $this->Form->end() ?>

