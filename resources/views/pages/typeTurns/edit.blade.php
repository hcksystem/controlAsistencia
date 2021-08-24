<!-- Modal -->
{!! Form::open(['method'=>'PUT','class'=>'formlDinamic form','id'=>'DataUpdate']) !!}
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon icon-documents3 text-blue s-18"></i>Editar Tipo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-row">
							<div class="form-group col-6 m-0" id="password_group">
								<i class="icon-file-text mr-2"></i>
								{!! Form::label('name', 'Nombre', ['class'=>'col-form-label s-12']) !!}
								{!! Form::text('name', null, ['class'=>'form-control r-0 light s-12',  'id'=>'_name', 'onclick'=>'inputClear(this.id)']) !!}
								<span class="name_span"></span>
							</div>
                            <div class="form-group col-6 m-0" id="description_group">
								<i class="icon-file-text mr-2"></i>
								{!! Form::label('name', 'Descripción', ['class'=>'col-form-label s-12']) !!}
								{!! Form::text('description', null, ['class'=>'form-control r-0 light s-12',  'id'=>'_description', 'onclick'=>'inputClear(this.id)']) !!}
								<span class="description_span"></span>
							</div>
							
						</div>
						<div class="form-row">
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