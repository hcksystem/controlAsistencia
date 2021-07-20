<!-- Modal Create-->
{!! Form::open(['route'=>'espacioComun.store','method'=>'POST', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon-person"></i> Agregar Nuevo Espacio</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group m-0" id="modulo_group">
							{!! Form::label('metaTypeID', 'Edificio', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('edificio_id', $edificios, null, ['class'=>'form-control r-0 light s-12', 'id'=>'edificio_id', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="status_span"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group m-0 has-feedback" id="campo_group">
							
						{!! Form::label('creado_por', __('Usuario'), ['class'=>'col-form-label s-12']) !!}
                        {!! Form::text('creado_name', Auth::user()->fullname , ['class'=>'form-control r-0 light s-12', 'id'=>'creado_name','readonly'=>'true']) !!}
                        {!! Form::hidden('creado_por_id', Auth::user()->id, ['class'=>'form-control r-0 light s-12', 'id'=>'creado_por']) !!}
							<span class="campo_span"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group m-0" id="nombre_group">
							{!! Form::label('Nombre', 'Nombre', ['class'=>'col-form-label s-12']) !!}
							{!! Form::text('nombre', null, ['class'=>'form-control r-0 light s-12', 'id'=>'nombre']) !!}
							<span class="status_span"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group m-0" id="descripcion">
							{!! Form::label('descripcion', 'Descripción', ['class'=>'col-form-label s-12']) !!}
							{!! Form::textarea('descripcion', null, ['class'=>'form-control r-0 light s-12', 'id'=>'descripcion', 'rows'=>'3']) !!}
							<span class="dataType_span"></span>
						</div>
					</div>
				</div>
				<div class="form-row">
					
					
				</div>
			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Save data</button>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
