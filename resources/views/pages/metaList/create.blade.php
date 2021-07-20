<!-- Modal Create-->
{!! Form::open(['route'=>'metaList.store','method'=>'POST', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon-person"></i> Agregar Nueva Lista</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group m-0" id="modulo_group">
							{!! Form::label('metaTypeID', 'Campo', ['class'=>'col-form-label s-12']) !!}
							{!! Form::select('metaTypeID', $metaType, null, ['class'=>'form-control r-0 light s-12', 'id'=>'metaTypeID', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="status_span"></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group m-0 has-feedback" id="campo_group">
							
							{!! Form::label('metaListValue', 'Valor', ['class'=>'col-form-label s-12']) !!}
							{!! Form::text('metaListValue', null, ['class'=>'form-control r-0 light s-12', 'id'=>'metaListValue', 'onclick'=>'inputClear(this.id)']) !!}
							<span class="campo_span"></span>
						</div>
					</div>
					
					
				</div>
				
			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Guardar Datos</button>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
