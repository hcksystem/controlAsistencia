<!-- Modal -->

<div class="modal fade" id="modal_calificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Editar Calificación</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<form id="formCalificacion">
							<div class="form-row">
								<div class="form-group col-6 m-0" id="name_group">
									{!! Form::label('periodo', 'Periódo', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
									{!! Form::text('periodo_id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'periodo_calificacion','readonly'=>'true']) !!}
									{!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_calificacion']) !!}
									<span class="name_span"></span>
								</div>
								
								<div class="form-group col-6 m-0">
									{!! Form::label('Calificación', 'Calificación', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('calificacion',null, ['class'=>'form-control r-0 light s-12', 'id'=>'nota_calificacion']) !!}
									<span class="description"></span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" onclick="actualizarCalificacion()"><i class="icon-save mr-2"></i>Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>
	function actualizarCalificacion(){

		 var url ="{{url('updateCalificacion')}}";
		 var formData = $('#formCalificacion').serialize();

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
              $("#modal_calificacion").modal('hide');
              $('#calificacion').DataTable().clear().destroy();
              calificacion();
              
            }
          });

	}
</script>