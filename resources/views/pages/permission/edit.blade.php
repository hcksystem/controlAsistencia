<!-- Modal Update-->
{!! Form::open(['method'=>'PUT','class'=>'formlDinamic form','id'=>'DataUpdate']) !!}
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="icon-pencil"></i> Permission Update</h4>
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
                                <span class="password_span"></span>
                            </div>
                            <div class="form-group col-4 m-0">
                                {!! Form::label('Sulg', 'Sulg', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::text('slug', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_slug']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 m-0" id="password_group">
                                {!! Form::label('description', 'Description', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                {!! Form::text('description', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_description']) !!}
                                <span class="password_span"></span>
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