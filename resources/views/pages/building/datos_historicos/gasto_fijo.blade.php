<!-- Modal -->

<div class="modal fade" id="modal_gastos_fijos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Editar Gasto</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<form id="formGastoFijo">
							<div class="form-row">
								
								
								<div class="form-group col-6 m-0">
									{!! Form::label('gasto', 'Agua', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('agua',null, ['class'=>'form-control r-0 light s-12', 'id'=>'gasto_agua']) !!}
									{!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_gasto_fijo']) !!}
									<span class="description"></span>
								</div>
								<div class="form-group col-6 m-0">
									{!! Form::label('luz', 'Luz', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('luz',null, ['class'=>'form-control r-0 light s-12', 'id'=>'gasto_luz']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-6 m-0">
									{!! Form::label('telefono', 'Telefono', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('telefono',null, ['class'=>'form-control r-0 light s-12', 'id'=>'telefono']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-6 m-0">
									{!! Form::label('conserjes', 'Conserjes', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('conserjes',null, ['class'=>'form-control r-0 light s-12', 'id'=>'conserjes']) !!}
									
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
				<button type="submit" class="btn btn-primary" onclick="actualizarGasto()"><i class="icon-save mr-2"></i>Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>
	function actualizarGasto(){

		 var url ="{{url('updateGastoFijo')}}";
		 var formData = $('#formGastoFijo').serialize();

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
              $("#modal_gastos_fijos").modal('hide');
              $('#table_gastos_fijos').DataTable().clear().destroy();
              gastos_fijos();
              
            }
          });

	}
</script>