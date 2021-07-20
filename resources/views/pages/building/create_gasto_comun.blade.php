<!-- Modal -->
{!! Form::open(['route'=>'edificios.createGastoComun','method'=>'POST', 'enctype' => 'multipart/form-data','files' => true]) !!}
 {{ csrf_field() }}
<div class="modal fade" id="createGastoComun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
										
											<div class="form-group col-4 m-0" id="name_group">
												{!! Form::label('name', __('periodo'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::month('periodo', null, ['class'=>'form-control r-0 light s-12', 'id'=>'periodo_comun']) !!}
												<span class="name_span"></span>
											</div>
											<div class="form-group col-4 m-0" id="tipo_group">
												{!! Form::label('tipo', __('Monto Dpto pequeño'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::text('monto_dpto_pequenno', null, ['class'=>'form-control r-0 light s-12', 'id'=>'monto_dpto_pequenno']) !!}
												<span class="tipo_span"></span>
											</div>
											
											<div class="form-group col-4 m-0" id="tipo_group">
												{!! Form::label('tipo', __('Monto Dpto Grande'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::text('monto_dpto_grande', null, ['class'=>'form-control r-0 light s-12', 'id'=>'monto_dpto_grande']) !!}
												<span class="tipo_span"></span>
											</div>
											<div class="col-5 m-0" id="name_group">
												<i class="icon icon-file mr-2"></i>
												{!! Form::label('file', 'Boleta Dpto Pequeño', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												<div class="from-group">
													{!! Form::file('file', null, ['class'=>'form-control r-0 light s-12', 'id'=>'file']) !!}
													<span class="file_span"></span>
												</div>
						                  	  </div>
												<div class="col-5 m-0" id="name_group">
												<i class="icon icon-file mr-2"></i>
												{!! Form::label('file', 'Boleta Dpto Grande', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												<div class="from-group">
													{!! Form::file('fileDpto', null, ['class'=>'form-control r-0 light s-12', 'id'=>'file2']) !!}
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


