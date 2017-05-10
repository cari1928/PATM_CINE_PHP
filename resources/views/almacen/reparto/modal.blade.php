<div
	class="modal fade modal-slide-in-right"
	aria-hidden="true"
	role="dialog"
	tabindex="-1"
	id="modal-delete-{{$rep->reparto_id}}">

	{{Form::Open(array(
		'action'=>array(
			'RepartoController@destroy',
			$rep->reparto_id),
		'method'=>'delete'))}}

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Reparto</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea eliminar la Reparto</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
