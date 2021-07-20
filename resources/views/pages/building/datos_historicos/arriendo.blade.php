<!-- Modal -->

<div class="modal fade" id="modal_arriendo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Editar Arriendo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<form id="formArriendo">
							<div class="form-row">
								<div class="form-group col-4 m-0" id="name_group">
									{!! Form::label('periodo', 'Periódo', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
									{!! Form::text('periodo_mes', null, ['class'=>'form-control r-0 light s-12', 'id'=>'periodo_mes','readonly'=>'true']) !!}
									
									<span class="name_span"></span>
								</div>
								
								<div class="form-group col-4 m-0">
									{!! Form::label('tipologia'
									, 'Tipología', ['class'=>'col-form-label s-12']) !!}
									{!! Form::select('tipologia_id',$tipologia, null, ['class'=>'form-control r-0 light s-12', 'id'=>'tipologia_id']) !!}
									{!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_arriendo']) !!}
									<span class="description"></span>
								</div>
								
								<div class="form-group col-4 m-0">
									{!! Form::label('arriendo', 'Arriendo', ['class'=>'col-form-label s-12']) !!}
									{!! Form::text('arriendo',null, ['class'=>'form-control r-0 light s-12', 'id'=>'arriendo']) !!}
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
				<button type="submit" class="btn btn-primary" onclick="actualizarArriendo()"><i class="icon-save mr-2"></i>Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>

	
	function actualizarArriendo(){

		 var url ="{{url('updateArriendo')}}";
		 var formData = $('#formArriendo').serialize();

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
              $("#modal_arriendo").modal('hide');
              $('#table_arriendo').DataTable().clear().destroy();
              arriendo();
              
            }
          });

	}
</script>