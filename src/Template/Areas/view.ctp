<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Area'), ['action' => 'edit', $area->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Area'), ['action' => 'delete', $area->id], ['confirm' => __('Are you sure you want to delete # {0}?', $area->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Areas'), ['controller' => 'Areas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Area'), ['controller' => 'Areas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="areas view large-9 medium-8 columns content">
    <h3><?= h($area->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Area') ?></th>
            <td><?= $area->has('parent_area') ? $this->Html->link($area->parent_area->id, ['controller' => 'Areas', 'action' => 'view', $area->parent_area->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Controller') ?></th>
            <td><?= h($area->controller) ?></td>
        </tr>
        <tr>
            <th><?= __('Controller Label') ?></th>
            <td><?= h($area->controller_label) ?></td>
        </tr>
        <tr>
            <th><?= __('Action') ?></th>
            <td><?= h($area->action) ?></td>
        </tr>
        <tr>
            <th><?= __('Action Label') ?></th>
            <td><?= h($area->action_label) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($area->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Appear') ?></th>
            <td><?= $area->appear ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Areas') ?></h4>
        <?php if (!empty($area->child_areas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Appear') ?></th>
                <th><?= __('Controller') ?></th>
                <th><?= __('Controller Label') ?></th>
                <th><?= __('Action') ?></th>
                <th><?= __('Action Label') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($area->child_areas as $childAreas): ?>
            <tr>
                <td><?= h($childAreas->id) ?></td>
                <td><?= h($childAreas->parent_id) ?></td>
                <td><?= h($childAreas->appear) ?></td>
                <td><?= h($childAreas->controller) ?></td>
                <td><?= h($childAreas->controller_label) ?></td>
                <td><?= h($childAreas->action) ?></td>
                <td><?= h($childAreas->action_label) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Areas', 'action' => 'view', $childAreas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Areas', 'action' => 'edit', $childAreas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Areas', 'action' => 'delete', $childAreas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childAreas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Profiles') ?></h4>
        <?php if (!empty($area->profiles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($area->profiles as $profiles): ?>
            <tr>
                <td><?= h($profiles->id) ?></td>
                <td><?= h($profiles->name) ?></td>
                <td><?= h($profiles->created) ?></td>
                <td><?= h($profiles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Profiles', 'action' => 'view', $profiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Profiles', 'action' => 'edit', $profiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Profiles', 'action' => 'delete', $profiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
