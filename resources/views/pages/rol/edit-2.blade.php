<!-- Modal Update-->
{!! Form::open(['method'=>'PUT','class'=>'formlDinamic form','id'=>'DataUpdate']) !!}
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="icon-pencil"></i> Rol Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
               <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-4 m-0" id="password_group">
                                {{-- <i class="icon icon-face mr-2"></i> --}}
                                {!! Form::label('name', 'Name', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                {!! Form::text('name', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_name']) !!}
                                <span class="name_span"></span>
                            </div>
                            <div class="form-group col-4 m-0">
                                {!! Form::label('Sulg', 'Sulg', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::text('slug', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_slug']) !!}
                                <span class="name_slug"></span>
                            </div>
                            <div class="form-group col-4 m-0">
                                {!! Form::label('special', 'Special', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::text('special', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_special']) !!}
                                <span class="name_specil"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 m-0" id="permissions">
                                {!! Form::label('permissions', 'Access Permits', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::select('permits[]', $permissions, null, ['class'=>'form-control r-0 light s-12 select2 multiple', 'id'=>'_permits','multiple'=>'multiple','onclick'=>'inputClear(this.id)']) !!}
                                <span class="permission_span"></span>
                                <span id="permission_active"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 m-0" id="description_group">
                                {!! Form::label('description', 'Description', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                {!! Form::text('description', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_description']) !!}
                                <span class="secription_span"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Save data</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}