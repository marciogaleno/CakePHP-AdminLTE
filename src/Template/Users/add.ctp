<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Adiconar usuário') ?></legend>
        <?php
            echo $this->Form->input('email', ['templateVars' => ['size_element' => '5'], 'placeholder' => 'Digite seu Email']);
            echo $this->Form->input('password', ['templateVars' => ['size_element' => '5'], 'placeholder' => 'Digite sua senha']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
