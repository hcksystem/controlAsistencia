<!-- Modal -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Editar Recambio</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<form id="formRecambio">
							<div class="form-row">
								<div class="form-group col-6 m-0" id="name_group">
									{!! Form::label('periodo', 'Periódo', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
									{!! Form::text('periodo_id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'periodo','readonly'=>'true']) !!}
									{!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_recambio']) !!}
									<span class="name_span"></span>
								</div>
								
								<div class="form-group col-6 m-0">
									{!! Form::label('frecuencia', 'Frecuencia', ['class'=>'col-form-label s-12']) !!}
									{!! Form::select('frecuencia_id',$frecuencia, null, ['class'=>'form-control r-0 light s-12', 'id'=>'frecuencia']) !!}
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
				<button type="submit" class="btn btn-primary" onclick="actualizarRecambio()"><i class="icon-save mr-2"></i>Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>
	function actualizarRecambio(){

		 var url ="{{url('updateRecambio')}}";
		 var formData = $('#formRecambio').serialize();

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
              $("#edit").modal('hide');
              recrear();
              
            }
          });

	}
</script>