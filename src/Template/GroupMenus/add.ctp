<?= $this->BForm->create($groupMenu) ?>
<fieldset>
    <legend><?= __('Adicionar grupo de menu') ?></legend>
    <?php
        echo $this->Form->input('name',['placeholder' => 'Nome']);

        echo $this->Form->input('icon', ['placeholder' => 'Icone']);

        echo $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS . $this->name)]]);
    ?>
</fieldset>
<?= $this->Form->end() ?>

