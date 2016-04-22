<div class="profiles form large-9 medium-8 columns content">
    <?= $this->Form->create($profile) ?>
    <fieldset>
        <legend><?= __('Add Profile') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
        <?php
            echo $this->Form->input('areas._ids', ['options' => $areas, 'multiple' => 'checkbox', 'label' => false]);
        ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
