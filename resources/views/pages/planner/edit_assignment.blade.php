<!-- Modal -->
{!! Form::open(['method'=>'POST','class'=>'formlDinamic form','id'=>'DataUpdate']) !!}
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
                            <div class="form-group col-6 m-0">
                                {!! Form::label('lbl_user', 'Usuario', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::select('user_id',$users, null, ['class'=>'form-control r-0 light s-12 select2 p-4','id'=>'_user_id', 'onclick'=>'inputClear(this.id)']) !!}
                            </div>
                            <div class="form-group col-6 m-0">
                                {!! Form::label('lbl_planner', 'Planificador', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::select('planner_id',$planners, null, ['class'=>'form-control r-0 light s-12 select2','id'=>'_planner_id', 'onclick'=>'inputClear(this.id)']) !!}
                            </div>
                            <div class="form-group col-6 m-0">
                                {!! Form::label('since', 'Desde', ['class'=>'col-form-label s-12']) !!}
							    {!! Form::date('since',null, ['class'=>'form-control r-0 light s-12',  'id'=>'_since', 'onchange'=>'validate_date()']) !!}
                            </div>
                            <div class="form-group col-6 m-0">
                                {!! Form::label('until', 'Hasta', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::date('until',null, ['class'=>'form-control r-0 light s-12',  'id'=>'_until', 'onchange'=>'validate_date()']) !!}
                            </div>

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
