
<ul class="pagination pagination-sm no-margin pull-right">
  	<li>
  		<?= $this->Paginator->prev( '<i class="fa fa-chevron-left"></i>', array( 'escape' => false ), null, array( 'escape' => false) ) ?>
  	</li>

  	<?= $this->Paginator->numbers(array('before' => '&nbsp;', 'after' => '&nbsp;', 'first' => 'Início', 'last' => 'Final'));?>

  	<li>
  		<?= $this->Paginator->next( '<i class="fa fa-chevron-right"></i>', array( 'escape' => false)) ?>
  	</li>
</ul>
<br>
<div>
<?= $this->Paginator->counter( array( "format" => "<div>p&aacute;gina {{page}} de {{pages}}</div>" ) )?>
    <?= $this->Paginator->counter( "{{count}} registro(s) encontrado(s)" ) ?>
</div>
  
