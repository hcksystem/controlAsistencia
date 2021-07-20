<!-- Modal -->
{!! Form::open(['route'=>'edificios.createGastoComunDia','method'=>'POST', 'enctype' => 'multipart/form-data','files' => true]) !!}
 {{ csrf_field() }}
<div class="modal fade" id="createGastoComunDia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
												{!! Form::month('periodo', null, ['class'=>'form-control r-0 light s-12', 'id'=>'periodo_comun_dia']) !!}
												<span class="name_span"></span>
											</div>
											<div class="form-group col-4 m-0" id="tipo_group">
												{!! Form::label('tipo', __('Al día'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::number('al_dia', null, ['class'=>'form-control r-0 light s-12', 'id'=>'al_dia']) !!}
												<span class="tipo_span"></span>
											</div>
											
											<div class="form-group col-4 m-0" id="tipo_group">
												{!! Form::label('tipo', __('En Mora'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::number('dia_atrasado', null, ['class'=>'form-control r-0 light s-12', 'id'=>'dia_atrasado']) !!}
												<span class="tipo_span"></span>
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