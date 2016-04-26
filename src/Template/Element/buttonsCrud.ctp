<?php 
 /**

 O OBJETIVO DESSE ELEMENT É PARA AUTMATIZAR A VISUALIAÇÃO OU NÃO DO BOTÃO CONFORME O ACESSO A ÁREAS DO USUÁRIO

Exemplo de utlização deste elmento:

Caso não seja passado algumas chaves do array do segundo parâmetro, então será colocado algumas configurações padrões. 

$this->element('buttonsCrud', [
                'actions' => ['action' => 'url ou objeto de entidade (somente quando a action for do tipo delete)'], //Esse parâmetro é obrigatório
                'actions_labels' => ['action' => 'label_da_action'],
                'class_icons' => ['action' => 'class_do_icone'], 
                'class_buttons' => ['action' => 'class_do_botão']]

=> EXEMPLO:
$this->element('buttonsCrud', [
                'actions' => ['view' => 'users/view/1', 'add' => '/users/cadastrar', delete' => $user], 
                'actions_labels' => ['delete' => 'Remover', 'add' => 'Cadastrar'],
                'class_icons' => ['add' => 'fa-plus'], 
                'class_buttons' => ['add' => 'btn-success']]

**/

?>

<?php if (!empty($actions)):?>
	<?php 
		$class_icons_default = ['view' => 'fa-eye', 'add' => 'fa-plus', 'edit' => 'fa-edit', 'delete' => 'fa-trash-o'];
		$class_buttons_default = ['view' => 'btn-default', 'add' => 'btn-success', 'edit' => 'btn-default', 'delete' => 'btn-danger'];

		if (!empty($class_icons)){
			$class_icons_default = array_merge($class_icons_default, $class_icons);		
		}

		if (!empty($class_buttons)){
			$class_buttons_default = array_merge($class_buttons_default, $class_buttons);	
		}

	?>

	<?php  foreach ($actions as $action => $value):?>

		<?php if ($this->request->session()->check("Auth.User.Profile.{$this->name}.action.{$action}")):?>

			<?php if ($action != 'delete') {?>
			<a href="

			<?= (!empty($value) ? $this->Url->build("{$value}") : $this->Url->build(['controller' => $this->name, 'action' => $action]))?>"

			class="btn 

			<?= (!empty($class_buttons_default[$action]) ? $class_buttons_default[$action] : '')?> 

			btn-sm">

			<i class="fa <?= (!empty($class_icons_default[$action]) ? $class_icons_default[$action] : '') ?>"></i>

			<!-- Verifica se foi passado labels para a actions na chamada do elementS, se não, colocar a lebal padrão que vem do banco de dados-->
			<?= (!empty($actions_labels[$action]) ? $actions_labels[$action] : $this->request->session()->read("Auth.User.Profile.{$this->name}.actions_labels.{$action}"))?>

			</a>
			<?php } else {?>

				<?php 
					$label_action = $this->request->session()->read("Auth.User.Profile.{$this->name}.actions_labels.{$action}");
					$icon = '<i class="fa ' . (!empty($class_icons_default[$action]) ? $class_icons_default[$action] : '') . '"></i>';

					echo $this->Form->button("{$icon} {$label_action}", ['class' => 'btn btn-danger btn-sm delete', 'type' => 'submit', 'form' => "form{$value->id}"]);
					
				?>
				<form action="<?=$this->Url->build(['controller' => $this->name, 'action' => 'delete']) ?>" method="POST" id="form<?=$value->id?>">
				<input type="hidden" value="<?= $value->id ?>" name="id">
				</form>
			<?php }?>
		<?php endif;?>

	<?php endforeach;?>

				

<?php endif;?>

