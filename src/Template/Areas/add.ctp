<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Areas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Areas'), ['controller' => 'Areas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Area'), ['controller' => 'Areas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="areas form large-9 medium-8 columns content">
    <?= $this->Form->create($area) ?>
    <fieldset>
        <legend><?= __('Add Area') ?></legend>
        <?php
            echo $this->Form->input('parent_id', ['options' => $parentAreas, 'empty' => true]);
            echo $this->Form->input('appear');
            echo $this->Form->input('controller');
            echo $this->Form->input('controller_label');
            echo $this->Form->input('action');
            echo $this->Form->input('action_label');
            echo $this->Form->input('profiles._ids', ['options' => $profiles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
