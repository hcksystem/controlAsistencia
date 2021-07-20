<!-- Modal -->

<div class="modal fade" id="modal_demanda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Editar Demanda</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<form id="formDemanda">
							<div class="form-row">
								<div class="form-group col-6 m-0" id="name_group">
									{!! Form::label('periodo', 'Periódo', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
									{!! Form::text('periodo_demanda', null, ['class'=>'form-control r-0 light s-12', 'id'=>'periodo_demanda','readonly'=>'true']) !!}
									
									<span class="name_span"></span>
								</div>
								
								<div class="form-group col-6 m-0">
									{!! Form::label('Deuda', 'Deuda', ['class'=>'col-form-label s-12']) !!}
									{!! Form::select('deuda',['1'=>'Si','2'=>'No'], null, ['class'=>'form-control r-0 light s-12', 'id'=>'deuda']) !!}
									{!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_demanda']) !!}
									<span class="description"></span>
								</div>
								
								<div class="form-group col-12 m-0">
									{!! Form::label('Concepto', 'En caso de tener demanda, indique razón:', ['class'=>'col-form-label s-12']) !!}
									{!! Form::textarea('concepto',null, ['class'=>'form-control r-0 light s-12', 'id'=>'concepto','rows'=>'2']) !!}
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
				<button type="submit" class="btn btn-primary" onclick="actualizarDemanda()"><i class="icon-save mr-2"></i>Guardar</button>
			</div>
		</div>
	</div>
</div>
<script>

	$( document ).ready(function() {
    	$("#deuda").change(function(){
  		
  			var valor = this.value;
  			if(valor == 2){
  				document.getElementById("concepto").readOnly = true;
  				document.getElementById('concepto').value = '';
  			}else{

  				document.getElementById("concepto").readOnly = false;
  			}
		});

	});

	
	function actualizarDemanda(){

		 var url ="{{url('updateDemanda')}}";
		 var formData = $('#formDemanda').serialize();

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
              $("#modal_demanda").modal('hide');
              $('#demanda').DataTable().clear().destroy();
              demanda();
              
            }
          });

	}
</script>