<!-- Modal -->
{!! Form::open(['route'=>'rol.store','method'=>'POST', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="icon icon-face"></i> Add New Rol</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-row">
							<div class="form-group col-4 m-0" id="name_group">
								{{-- <i class="icon icon-face mr-2"></i> --}}
								{!! Form::label('name', 'Name', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('name', null, ['class'=>'form-control r-0 light s-12', 'id'=>'name']) !!}
								<span class="name_span"></span>
							</div>
							<div class="form-group col-4 m-0" id="slug_group">
								{!! Form::label('Sulg', 'Sulg', ['class'=>'col-form-label s-12']) !!}
								{!! Form::text('slug', null, ['class'=>'form-control r-0 light s-12', 'id'=>'slug']) !!}
								<span class="sulg_span"></span>
							</div>
							<div class="form-group col-4 m-0" id="special_group">
								{!! Form::label('special', 'Special', ['class'=>'col-form-label s-12']) !!}
								{!! Form::select('special', ['1'=>'all-access','2'=>'no-access'], null, ['class'=>'form-control r-0 light s-12', 'id'=>'special']) !!}
								<span class="special_span"></span>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-6 m-0" id="permissions">
								{!! Form::label('permissions', 'Access Permits', ['class'=>'col-form-label s-12']) !!}
								{!! Form::select('permits[]', $permissions, null, ['class'=>'form-control r-0 light s-12 select2', 'id'=>'permits','multiple'=>'multiple']) !!}
								<span class="permissions_span"></span>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-12 m-0" id="description_group">
								{!! Form::label('description', 'Description', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
								{!! Form::text('description', null, ['class'=>'form-control r-0 light s-12', 'id'=>'description']) !!}
								<span class="description_span"></span>
							</div>
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