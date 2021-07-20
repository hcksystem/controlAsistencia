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
{!! Form::open(['route'=>'edificios.createGasto','method'=>'POST', 'enctype' => 'multipart/form-data','files' => true]) !!}
 {{ csrf_field() }}
<div class="modal fade" id="createGasto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon icon-documents3 text-blue s-18"></i> {{ __('Información del Gasto') }}</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
										<div class="form-row">
											<div class="form-group col-4 m-0" id="tipo_group">
												{!! Form::label('tipo', __('Concepto'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::select('concepto_id',$conceptos, null, ['class'=>'form-control r-0 light s-12', 'id'=>'concepto']) !!}
												<span class="tipo_span"></span>
											</div>
											<div class="form-group col-4 m-0" id="name_group">
												{!! Form::label('name', __('periodo'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::month('periodo', null, ['class'=>'form-control r-0 light s-12', 'id'=>'periodo']) !!}
												<span class="name_span"></span>
											</div>
											<div class="form-group col-2 m-0">
												{!! Form::label('tipo', __('Mayordomo(Sí/No)'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::select('estado_mayordomo',[''=>'Seleccione','0'=>'No','1'=>'Sí'], null, ['class'=>'form-control r-0 light s-12', 'id'=>'estado_mayordomo']) !!}
												<span class="tipo_span"></span>
											</div>
											@if(!(Auth::user()->hasRole('mayor')))	
											<div class="form-group col-2 m-0" >
												{!! Form::label('tipo', __('Copropietario(Sí/No)'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::select('estado_copropietario',[''=>'Seleccione','0'=>'No','1'=>'Sí'], null, ['class'=>'form-control r-0 light s-12', 'id'=>'estado_copropietario']) !!}
												<span class="tipo_span"></span>
											</div>
											@endif
											
										</div>
										<div class="form-row">
											<div class="form-group col-3 m-0" >
												{!! Form::label('tipo', __('Proveedor'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::text('proveedor',null, ['class'=>'form-control r-0 light s-12', 'id'=>'proveedor']) !!}
												<span class="proveedor"></span>
											</div>
											<div class="form-group col-4 m-0">
												{!! Form::label('tipo', __('Calificación'), ['class'=>'col-form-label s-12']) !!}
												<div class="form">
													  <p class="clasificacion">
													    <input id="radio1" type="radio" name="calificacion" value="5"><label for="radio1">★</label>

													    <input id="radio2" type="radio" name="calificacion" value="4"><label for="radio2">★</label>

													    <input id="radio3" type="radio" name="calificacion" value="3"><label for="radio3">★</label>

													    <input id="radio4" type="radio" name="calificacion" value="2"><label for="radio4">★</label>

													    <input id="radio5" type="radio" name="calificacion" value="1"><label for="radio5">★</label>

													    
													  </p>
												</div>
											</div>
											 <div class="col-5 m-0" id="name_group">
						                      <i class="icon icon-file mr-2"></i>
						                      {!! Form::label('file', 'Archivo', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
						                      <div class="from-group">
						                          {!! Form::file('file', null, ['class'=>'form-control r-0 light s-12', 'id'=>'file']) !!}
						                          <span class="file_span"></span>
						                      </div>
						                  </div>
						                      {!! Form::hidden('edificio_id', $building->id, ['class'=>'form-control r-0 light s-12']) !!}
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


