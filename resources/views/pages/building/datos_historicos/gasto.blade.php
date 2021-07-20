<!-- Modal -->

<div class="modal fade" id="modal_gastos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Editar Gasto</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<form id="formGastoComun">
							<div class="form-row">
							
								<div class="form-group col-4 m-0">
									{!! Form::label('gasto', 'Gastos Comunes', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('gastos_comunes',null, ['class'=>'form-control r-0 light s-12', 'id'=>'gastos_comunes']) !!}
									{!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_gasto']) !!} 
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', '(1 mes) %', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('mgc_1mes',null, ['class'=>'form-control r-0 light s-12', 'id'=>'mgc_1mes']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', '(3 mes) %', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('mgc_3mes',null, ['class'=>'form-control r-0 light s-12', 'id'=>'mgc_3mes']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', '(6 mes) %', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('mgc_6mes',null, ['class'=>'form-control r-0 light s-12', 'id'=>'mgc_6mes']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', '(12 mes) %', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('mgc_12mes',null, ['class'=>'form-control r-0 light s-12', 'id'=>'mgc_12mes']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', '(+12 mes) %', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('mgc_12mes_mas',null, ['class'=>'form-control r-0 light s-12', 'id'=>'mgc_12mes_mas']) !!}
									
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
				<button type="submit" class="btn btn-primary" onclick="actualizarGastoComun()"><i class="icon-save mr-2"></i>Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>
	function actualizarGastoComun(){

		 var url ="{{url('updateGasto')}}";
		 var formData = $('#formGastoComun').serialize();

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
              $("#modal_gastos").modal('hide');
              $('#table_gastos').DataTable().clear().destroy();
              gastos_comunes();
              
            }
          });

	}
</script>