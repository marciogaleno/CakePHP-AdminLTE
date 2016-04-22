<?php 
    $this->Form->templates([
        'radioFormGroup' => '<div class="radio">{{label}}{{input}}</div>'
    ]);
?>
<?= $this->Form->create($profile) ?>
<fieldset class="col-md-9">
    <legend><?= __('Add Profile') ?></legend>
        <?php
            echo $this->Form->input('name', ['teste']);
        ?>
    <div class="box box-solid">
        <?= $this->Form->input('areas._ids', ['options' => $areas, 'multiple' => 'checkbox', 'label' => false, 'hiddenField' => false]);?>
    </div>

    <?php
        echo $this->Form->submit(__('Salvar'), ['templateVars' => ['name_button_cancel' => 'Cancelar', 'url_button_cancel' => $this->Url->build(DS. $this->name)]]);
        echo $this->Form->end();

    ?>
</fieldset>
