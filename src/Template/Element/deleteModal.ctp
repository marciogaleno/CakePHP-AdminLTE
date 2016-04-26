
<!-- modal -->
<div class="modal fade modal-danger" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= (!empty($title) ? $title : 'Exclusão')?></h4>
      </div>
      <div class="modal-body">
        <p><?= (!empty($msg) ? $msg : 'Tem certeza de que deseja excluir este registro?')?></p>
      </div>
      <div class="modal-footer">
        <button type="button" id="deleteCancel" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
        <button type="button" id="deleteConfirm" class="btn btn-outline">Excluir</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">

var deleteUrl;
var formId;

$(document).ready( function(){

	$('.btn.delete').click( function(e){
		e.preventDefault();
		formId = $(this).attr('form');
		console.log(formId);
		deleteUrl = $("#" + formId).attr('action');
		console.log(deleteUrl);
		$('#delete').modal('show').on( 'shown', function(){
			$('#deleteConfirm').focus();
		});
	});

	$('#deleteCancel').click( function(e){
		e.preventDefault();
		$('#delete').modal('hide');
	});

	$('#deleteConfirm').click( function(e){
		$( "#" + formId ).submit();
	});
});
</script>