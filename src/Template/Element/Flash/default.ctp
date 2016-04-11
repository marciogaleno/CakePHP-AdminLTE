<?php
$class = '';
$message_defatul = '';

if (!empty($params['class'])) {
	if ($params['class'] == 'success'){
		$class .= 'alert-success' ;
		$message_defatul .= '<b>' . $controller_label . '</b>' . ' salvo com sucesso!';
	}else if ($params['class'] == 'error') {
		$class .= 'alert-danger' ;
		$message_defatul .= 'Erro ao salvar ' . '<b>' . $controller_label . '</b>';
	}else if ($params['class'] == 'deleteSuccess'){
		$class .= 'alert-success' ;
		$message_defatul .= '<b>' . $controller_label . '</b>'. ' deletado com sucesso!';
	}else if ($params['class'] == 'deleteError'){
		$class .= 'alert-danger' ;
		$message_defatul .= 'Erro ao deletar ' . '<b>' . $controller_label . '</b>';		
	}
   
}
?>

<!-- Casso não tenha passado uma mensagem como parâmetro coloca mensagem padrão -->

	<div class="alert <?= $class ?> alert-dismissable">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <?php 
	    	if (!empty($message)){
		    		echo h($message);
			    } else {
					echo $message_defatul;
			} 
		?>
	</div>
