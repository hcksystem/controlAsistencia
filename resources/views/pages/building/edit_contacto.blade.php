
{!! Form::open(['method'=>'POST','class'=>'formlDinamic form','id'=>'DataUpdate']) !!}
<div class="modal fade" id="updateContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="icon icon-documents3 text-blue s-18"></i> {{ __('Información del Contacto') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
					<div class="col-md-12">
										<div class="form-row">
											<div class="form-group col-6 m-0" id="tipo_group">
												{!! Form::label('tipo', __('Tipo'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::select('tipo_contacto_id',$tipo, null, ['class'=>'form-control r-0 light s-12', 'id'=>'_tipo_contacto_id']) !!}
												<span class="tipo_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="name_group">
												{!! Form::label('name', __('Nombre*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('nombre', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_nombre']) !!}
												<span class="name_span"></span>
											</div>
											
										</div>
										<div class="form-row">
											
											<div class="form-group col-6 m-0" id="correo_group">
												<i class="icon-envelope-o mr-2"></i>
												{!! Form::label('correo', __('Correo'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::email('correo', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_correo']) !!}
												<span class="correo_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="telefono_group">
												<i class="icon-web mr-2"></i>
												{!! Form::label('telefono', __('Telefono'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('telefono', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_telefono']) !!}
												{!! Form::hidden('edificio_id', $building->id, ['class'=>'form-control r-0 light s-12', 'id'=>'_edificio_id']) !!}
												<span class="telefono_span"></span>
											</div>
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
