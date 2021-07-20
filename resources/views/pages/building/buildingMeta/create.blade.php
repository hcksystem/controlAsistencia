<!-- Modal -->
{!! Form::open(['route'=>'buildingMeta.store','method'=>'POST', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="accountMeta">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon icon-goals-1"></i> Agregar Nuevo Edificio meta</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-row">
							<div class="form-group col-4 m-0" id="value_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('building', 'Edificio', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::select('building_id', $buildings, null, ['class'=> 'form-control r-0 light s-12', 'id'=>'building_id']) !!}
							</div>
							<div class="form-group col-4 m-0" id="value_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('metaType', 'Meta Type', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::select('building_meta_type_id', $metaTypes, null, ['class'=> 'form-control r-0 light s-12', 'id'=>'building_meta_type_id']) !!}
							</div>
							<div class="form-group col-4 m-0" id="value_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('value', 'Value', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('value', null, ['class'=>'form-control r-0 light s-12', 'id'=>'value']) !!}
								<span class="value_span"></span>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Guardar datos</button>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}