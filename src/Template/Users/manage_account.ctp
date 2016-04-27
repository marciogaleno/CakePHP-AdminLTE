<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
    	<li class="active"><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'manageAccount' ]) ?>">Meus dados</a></li>
    	<li><a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'changePassword' ]) ?>">Alterar senha</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
			<?= $this->BForm->create($user) ?>
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
			</fieldset>
	   </div>
	</div>
</div>



