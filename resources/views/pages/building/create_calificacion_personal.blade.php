<!-- Modal -->
<style type="text/css" media="screen">
.form2 {
  width: 200px;
  margin-top:-20px;
  height: 50px;
}

.form2 p {
  text-align: center;
}

.form2 label {
  font-size: 30px;
}

input[type="radio"] {
  display: none;
}

label {
  color: grey;
}

.comunicacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

.respeto {
  direction: rtl;
  unicode-bidi: bidi-override;
}

.resolucion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

.actitud {
  direction: rtl;
  unicode-bidi: bidi-override;
}

.escucha {
  direction: rtl;
  unicode-bidi: bidi-override;
}

.responsabilidad {
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
{!! Form::open(['id'=>'form_calificacion']) !!}
 {{ csrf_field() }}
<div class="modal fade" id="createCalificacionPersonal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
											
											<div class="form-group col-3 m-0" id="name_group">
												{!! Form::label('name', __('periodo'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::month('periodo', null, ['class'=>'form-control r-0 light s-12', 'id'=>'adm_personal_periodo']) !!}
												<span class="name_span"></span>
											</div>
											<div class="form-group col-3 m-0 text-center">
												{!! Form::label('tipo', __('Respeto'), ['class'=>'col-form-label s-12']) !!}
												<div class="form2">
													  <p class="respeto">
													    <input id="respeto_radio1" type="radio" name="respeto" value="5"><label for="respeto_radio1">★</label>

													    <input id="respeto_radio2" type="radio" name="respeto" value="4"><label for="respeto_radio2">★</label>

													    <input id="respeto_radio3" type="radio" name="respeto" value="3"><label for="respeto_radio3">★</label>

													    <input id="respeto_radio4" type="radio" name="respeto" value="2"><label for="respeto_radio4">★</label>

													    <input id="respeto_radio5" type="radio" name="respeto" value="1"><label for="respeto_radio5">★</label>

													    
													  </p>
												</div>
											</div>
											<div class="form-group col-3 m-0 text-center">
												{!! Form::label('tipo', __('Comunicación'), ['class'=>'col-form-label s-12 text-center']) !!}
												<div class="form2">
													  <p class="comunicacion">
													    <input id="comu_radio1" type="radio" name="comunicacion" value="5"><label for="comu_radio1">★</label>

													    <input id="comu_radio2" type="radio" name="comunicacion" value="4"><label for="comu_radio2">★</label>

													    <input id="comu_radio3" type="radio" name="comunicacion" value="3"><label for="comu_radio3">★</label>

													    <input id="comu_radio4" type="radio" name="comunicacion" value="2"><label for="comu_radio4">★</label>

													    <input id="comu_radio5" type="radio" name="comunicacion" value="1"><label for="comu_radio5">★</label>

													    
													  </p>
												</div>
											</div>
											<div class="form-group col-3 m-0 text-center">
												{!! Form::label('tipo', __('Escucha'), ['class'=>'col-form-label s-12 text-center']) !!}
												<div class="form2">
													  <p class="escucha">
													    <input id="escu_radio1" type="radio" name="escucha" value="5"><label for="escu_radio1">★</label>

													    <input id="escu_radio2" type="radio" name="escucha" value="4"><label for="escu_radio2">★</label>

													    <input id="escu_radio3" type="radio" name="escucha" value="3"><label for="escu_radio3">★</label>

													    <input id="escu_radio4" type="radio" name="escucha" value="2"><label for="escu_radio4">★</label>

													    <input id="escu_radio5" type="radio" name="escucha" value="1"><label for="escu_radio5">★</label>

													    
													  </p>
												</div>
											</div>
												<div class="form-group col-4 m-0 text-center">
												{!! Form::label('tipo', __('Actitud'), ['class'=>'col-form-label s-12']) !!}
												<div class="form2">
													  <p class="actitud">
													    <input id="actitud_radio1" type="radio" name="actitud" value="5"><label for="actitud_radio1">★</label>

													    <input id="actitud_radio2" type="radio" name="actitud" value="4"><label for="actitud_radio2">★</label>

													    <input id="actitud_radio3" type="radio" name="actitud" value="3"><label for="actitud_radio3">★</label>

													    <input id="actitud_radio4" type="radio" name="actitud" value="2"><label for="actitud_radio4">★</label>

													    <input id="actitud_radio5" type="radio" name="actitud" value="1"><label for="actitud_radio5">★</label>

													    
													  </p>
												</div>
											</div>
											<div class="form-group col-4 m-0 text-center">
												{!! Form::label('tipo', __('Resolución'), ['class'=>'col-form-label s-12 text-center']) !!}
												<div class="form2">
													  <p class="resolucion">
													    <input id="resolu_radio1" type="radio" name="resolucion" value="5"><label for="resolu_radio1">★</label>

													    <input id="resolu_radio2" type="radio" name="resolucion" value="4"><label for="resolu_radio2">★</label>

													    <input id="resolu_radio3" type="radio" name="resolucion" value="3"><label for="resolu_radio3">★</label>

													    <input id="resolu_radio4" type="radio" name="resolucion" value="2"><label for="resolu_radio4">★</label>

													    <input id="resolu_radio5" type="radio" name="resolucion" value="1"><label for="resolu_radio5">★</label>

													    
													  </p>
												</div>
											</div>
											<div class="form-group col-4 m-0 text-center">
												{!! Form::label('tipo', __('Responsabilidad'), ['class'=>'col-form-label s-12 text-center']) !!}
												<div class="form2">
													  <p class="responsabilidad">
													    <input id="resp_radio1" type="radio" name="responsabilidad" value="5"><label for="resp_radio1">★</label>

													    <input id="resp_radio2" type="radio" name="responsabilidad" value="4"><label for="resp_radio2">★</label>

													    <input id="resp_radio3" type="radio" name="responsabilidad" value="3"><label for="resp_radio3">★</label>

													    <input id="resp_radio4" type="radio" name="responsabilidad" value="2"><label for="resp_radio4">★</label>

													    <input id="resp_radio5" type="radio" name="responsabilidad" value="1"><label for="resp_radio5">★</label>

													    
													  </p>
												</div>
											</div>
											
											<div class="form-group col-12 m-0" id="name_group">
												{!! Form::label('name', __('Notas'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::textarea('notas', null, ['class'=>'form-control r-0 light s-12', 'id'=>'notas','rows'=>'2']) !!}
												<span class="name_span"></span>
											</div>
										</div>
										<div class="form-row">
											
											 
						                      {!! Form::hidden('edificio_id', $building->id, ['class'=>'form-control r-0 light s-12']) !!}
										</div>
									
									
					</div>		
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<a onclick="agregarCalificacionPersonal()" class="btn btn-primary"><i class="icon-save mr-2"></i>Guardar Datos</a>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}


