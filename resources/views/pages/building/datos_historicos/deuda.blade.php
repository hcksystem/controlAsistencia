<!-- Modal -->

<div class="modal fade" id="modal_deuda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Editar Deuda</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<form id="formDeuda">
							<div class="form-row">
								<!--<div class="form-group col-6 m-0" id="name_group">
									{!! Form::label('periodo', 'Periódo', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
									{!! Form::text('periodo', null, ['class'=>'form-control r-0 light s-12', 'id'=>'periodo_deuda']) !!}
									{!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_deuda']) !!}
									<span class="name_span"></span>
								</div> -->
								
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', 'Tiene deuda de Agua', ['class'=>'col-form-label s-12']) !!}
									{!! Form::select('agua',['1'=>'Si','2'=>'No'], null, ['class'=>'form-control r-0 light s-12', 'id'=>'agua']) !!}
									{!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_deuda']) !!}
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', 'Tiene deuda de Luz', ['class'=>'col-form-label s-12']) !!}
									{!! Form::select('luz',['1'=>'Si','2'=>'No'], null, ['class'=>'form-control r-0 light s-12', 'id'=>'luz']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', 'Tiene deuda de Gas', ['class'=>'col-form-label s-12']) !!}
									{!! Form::select('gas',['1'=>'Si','2'=>'No'], null, ['class'=>'form-control r-0 light s-12', 'id'=>'gas']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', 'Monto', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('agua_monto',null, ['class'=>'form-control r-0 light s-12', 'id'=>'agua_monto']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', 'Monto', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('luz_monto',null, ['class'=>'form-control r-0 light s-12', 'id'=>'luz_monto']) !!}
									
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
									{!! Form::label('Deuda', 'Monto', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('gas_monto',null, ['class'=>'form-control r-0 light s-12', 'id'=>'gas_monto']) !!}
									
									<span class="description"></span>
								</div>
								
								<div class="form-group col-4 m-0">
							
									{!! Form::label('Concepto', 'Resolución', ['class'=>'col-form-label s-12']) !!}
									{!! Form::textarea('agua_resolucion',null, ['class'=>'form-control r-0 light s-12', 'id'=>'agua_resolucion','rows'=>'2']) !!}
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
							
									{!! Form::label('Concepto', 'Resolución', ['class'=>'col-form-label s-12']) !!}
									{!! Form::textarea('luz_resolucion',null, ['class'=>'form-control r-0 light s-12', 'id'=>'luz_resolucion','rows'=>'2']) !!}
									<span class="description"></span>
								</div>
								<div class="form-group col-4 m-0">
							
									{!! Form::label('Concepto', 'Resolución', ['class'=>'col-form-label s-12']) !!}
									{!! Form::textarea('gas_resolucion',null, ['class'=>'form-control r-0 light s-12', 'id'=>'gas_resolucion','rows'=>'2']) !!}
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
				<button type="submit" class="btn btn-primary" onclick="actualizarDeuda()"><i class="icon-save mr-2"></i>Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>
	function actualizarDeuda(){

		 var url ="{{url('updateDeuda')}}";
		 var formData = $('#formDeuda').serialize();

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
              $("#modal_deuda").modal('hide');
              $('#table_deuda').DataTable().clear().destroy();
              deuda();
              
            }
          });

	}
</script>