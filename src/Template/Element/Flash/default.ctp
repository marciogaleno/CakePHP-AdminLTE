<?php
$class = '';
$message_default = '';

if (!empty($params['class'])) {
	if ($params['class'] == 'success'){
		$class .= 'alert-success' ;
		$message_default .= '<b>' . $controller_label . '</b>' . ' salvo com sucesso!';
	} elseif ($params['class'] == 'editSuccess') {
		$class .= 'alert-success' ;
		$message_default .= '<b>' . $controller_label . '</b>' . ' alterado com sucesso!';
	} elseif ($params['class'] == 'error') {
		$class .= 'alert-danger' ;
		$message_default .= 'Erro ao salvar ' . '<b>' . $controller_label . '</b>';
	}elseif ($params['class'] == 'deleteSuccess') {
		$class .= 'alert-success' ;
		$message_default .= '<b>' . $controller_label . '</b>'. ' deletado com sucesso!';
	}elseif ($params['class'] == 'deleteError') {
		$class .= 'alert-danger' ;
		$message_default .= 'Erro ao deletar ' . '<b>' . $controller_label . '</b>';		
	}
   
}
?>

<!-- Casso não tenha passado uma mensagem como parâmetro coloca mensagem padrão -->

	<div class="alert <?= $class ?> alert-dismissable">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <?php 
	    	if (!empty($message)){
		    	echo $message;
			} else {
				echo $message_default;
			} 
		?>
	</div>
