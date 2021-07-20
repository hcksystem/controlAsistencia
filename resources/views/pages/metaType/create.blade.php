<!-- Modal Create-->
{!! Form::open(['route'=>'metaType.store','method'=>'POST', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon-person"></i> Agregar Nuevo MetaType</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-4">
						<div class="form-group m-0 has-feedback" id="campo_group">
							
							{!! Form::label('campo', 'Campo', ['class'=>'col-form-label s-12']) !!}
							{!! Form::text('campo', null, ['class'=>'form-control r-0 light s-12', 'id'=>'campo', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="campo_span"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group m-0" id="password_group">
							
							{!! Form::label('requerido', 'Requerido', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('requerido', [1=>'Si', 0=>'No'], null, ['class'=>'form-control r-0 light s-12', 'id'=>'requerido', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="code_span"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group m-0" id="modulo_group">
							{!! Form::label('modulo', 'Modulo', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('moduloID', $modulos, null, ['class'=>'form-control r-0 light s-12', 'id'=>'modulo', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="status_span"></span>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4">
						<div class="form-group m-0" id="dataType_group">
							{!! Form::label('dataType', 'DataType', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('dataTypeID', $dataTypes, null, ['class'=>'form-control r-0 light s-12', 'id'=>'dataType', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="dataType_span"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group m-0" id="activo_group">
							
							{!! Form::label('activo', 'Activo', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('activo', [1=>'Si', 0=>'No'], null, ['class'=>'form-control r-0 light s-12', 'id'=>'activo', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="code_span"></span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group m-0 has-feedback" id="orden_group">
							
							{!! Form::label('orden', 'Orden', ['class'=>'col-form-label s-12']) !!}
							{!! Form::text('orden', null, ['class'=>'form-control r-0 light s-12', 'id'=>'orden', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="orden_span"></span>
						</div>
					</div>
					
					
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
