<!-- Modal -->
<style type="text/css" media="screen">
.form {
  width: 250px;
  margin-top:-20px;
  height: 50px;
}

.form p {
  text-align: center;
}

.form label {
  font-size: 40px;
}

input[type="radio"] {
  display: none;
}

label {
  color: grey;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: orange;
}

input[type="radio"]:checked ~ label {
  color: orange;
}
</style>
{!! Form::open(['route'=>'edificios.createAdmCalificacion','method'=>'POST', 'enctype' => 'multipart/form-data','files' => true]) !!}
 {{ csrf_field() }}
<div class="modal fade" id="createCalificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon icon-documents3 text-blue s-18"></i> {{ __('Información de la Administración') }}</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
										<div class="form-row">
											<div class="form-group col-4 m-0" id="tipo_group">
												{!! Form::label('tipo', __('Administración'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::hidden('id_administracion',$building->administracion_id ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'id_administracion']) !!}
												{!! Form::select('administracion',$admin, $building->administracion_id ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'administracion','readonly']) !!}
												<span class="tipo_span"></span>
											</div>
											<div class="form-group col-4 m-0" id="name_group">
												{!! Form::label('name', __('periodo'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::month('periodo', null, ['class'=>'form-control r-0 light s-12', 'id'=>'adm_periodo']) !!}
												<span class="name_span"></span>
											</div>
											<div class="form-group col-4 m-0">
												{!! Form::label('tipo', __('Calificación'), ['class'=>'col-form-label s-12']) !!}
												<div class="form">
													  <p class="clasificacion">
													    <input id="adm_radio1" type="radio" name="calificacion" value="5"><label for="adm_radio1">★</label>

													    <input id="adm_radio2" type="radio" name="calificacion" value="4"><label for="adm_radio2">★</label>

													    <input id="adm_radio3" type="radio" name="calificacion" value="3"><label for="adm_radio3">★</label>

													    <input id="adm_radio4" type="radio" name="calificacion" value="2"><label for="adm_radio4">★</label>

													    <input id="adm_radio5" type="radio" name="calificacion" value="1"><label for="adm_radio5">★</label>

													    
													  </p>
												</div>
											</div>
											
										</div>
										<div class="form-row">
											
											 
						                      {!! Form::hidden('id_edificio', $building->id, ['class'=>'form-control r-0 light s-12']) !!}
										</div>
									
									
					</div>		
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Guardar Datos</button>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}


