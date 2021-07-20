<!-- Modal -->
{!! Form::open(['route'=>'buildings.store','method'=>'POST', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon icon-contacts"></i> {{ __('Campos extras') }}</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-row">
							<div class="form-group col-6 m-0" id="first_name_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('first_name', __('label *'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('first_name', null, ['class'=>'form-control r-0 light s-12', 'id'=>'first_name']) !!}
								<span class="first_name_span"></span>
							</div>
							<div class="form-group col-6 m-0" id="last_name_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('last_name', __('Valor *'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('last_name', null, ['class'=>'form-control r-0 light s-12', 'id'=>'last_name']) !!}
								<span class="last_name_span"></span>
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
				<button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Save data')}}</button>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}