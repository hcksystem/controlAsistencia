<!-- Modal Update-->
{!! Form::open(['method'=>'PUT','class'=>'formlDinamic form','id'=>'DataUpdate']) !!}
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="icon-person"></i>Editar Grupo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group m-0 has-feedback" id="campo_group">
                            {!! Form::label('grupo', 'Grupo', ['class'=>'col-form-label s-12']) !!}
                            {!! Form::text('group', null, ['class'=>'form-control r-0 light s-12', 'id'=>'_group', 'onclick'=>'inputClear(this.id)']) !!}
                            <span class="campo_span"></span>
                        </div>
                    </div>


                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" type="submit"><i class="icon-save mr-2"></i>Guardar Datos</button>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
