<div class="areas form large-9 medium-8 columns content">
    <?= $this->BForm->create($area) ?>
    <fieldset>
        <legend><?= __('Edit Area') ?></legend>
        <?php
            echo $this->Form->input('appear', ['label' => 'Aparecer']);
            echo $this->Form->input('name_group_menu');
            echo $this->Form->input('label_group_name');
            echo $this->Form->input('controller');
            echo $this->Form->input('controller_label');
            echo $this->Form->input('action');
            echo $this->Form->input('action_label');
            echo $this->Form->input('parent_id', ['type' => 'select','options' => $ChildAreas, 'empty' => '(Selecione a área pai)', 'templateVars' => ['size_select' => '5']]);
        ?>
    </fieldset>
    <?= $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS. $this->name)]]); ?>
    <?= $this->Form->end() ?>
</div>
