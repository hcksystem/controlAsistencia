<!-- Modal -->
{!! Form::open(['id'=>'updateTipologia']) !!}
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="icon-eye"></i> Editar Data Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-row">
                             <div class="form-group col-6 m-0" id="password_group">
                                <i class="icon-file-text mr-2"></i>
                                {!! Form::label('type', 'Tipologia', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::select('id_tipologia',$tipologia, null, ['class'=>'form-control r-0 light s-12',  'id'=>'_id_tipologia', 'onclick'=>'inputClear(this.id)']) !!}
                                <span class="name_span"></span>
                            </div>
                            
                            <div class="form-group col-6 m-0" id="password_group">
                                <i class="icon-file-text mr-2"></i>
                                {!! Form::label('type', 'Cantidad', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::text('cantidad', null, ['class'=>'form-control r-0 light s-12',  'id'=>'_cantidad', 'onclick'=>'inputClear(this.id)']) !!}
                                {!! Form::hidden('id_edificio', $building->id, ['class'=>'form-control r-0 light s-12', 'id'=>'_id_edificio']) !!}
                                {!! Form::hidden('id', null, ['class'=>'form-control r-0 light s-12', 'id'=>'id_edificio_tipologia']) !!}
                                <span class="name_span"></span>
                            </div>
                        </div>
                           
                        </div>
                       
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a onclick="updateTipologia()" class="btn btn-primary"><i class="icon-save mr-2"></i>Guardar Datos</a>
            </div>
            </div>
            
        </div>
    </div>
</div>
{!! Form::close() !!}