<!--O OBJETIVO DESSE ELEMENT É PARA AUTMATIZAR A VISUALIAÇÃO OU NÃO DO BOTÃO CONFORME O ACESSO A ÁREAS DO USUÁRIO -->
<?php if (!empty($actions)):?>
	<?php 
		$class_icons_default = ['view' => 'fa-eye', 'edit' => 'fa-edit', 'delete' => 'fa-trash-o'];
		$class_buttons_default = ['view' => 'btn-default', 'edit' => 'btn-default', 'delete' => 'btn-danger'];

		if (!empty($class_icons)){
			array_merge($class_icons_default, $class_icons);		
		}

		if (!empty($class_buttons)){
			array_merge($class_buttons_default, $class_buttons);		
		}
	?>

	<?php  foreach ($actions as $action => $value):?>

		<?php if ($this->request->session()->check("Auth.User.Profile.{$this->name}.action.{$action}")):?>

			<a href="<?= $this->Url->build("{$value}")?>" class="btn <?= $class_buttons_default[$action] ?> btn-sm"><i class="fa <?= $class_icons_default[$action] ?>"></i> <?= $this->request->session()->read("Auth.User.Profile.{$this->name}.actions_labels.{$action}")?></a>
				
		<?php endif;?>

	<?php endforeach;?>

<?php endif;?>

