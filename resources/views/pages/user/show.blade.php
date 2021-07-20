<!-- Modal -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="icon-eye"></i>Información del Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {!! Form::open() !!}
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group m-0 has-feedback" id="fullname_group">
                            <i class="icon-person mr-2"></i>
                            {!! Form::label('name', 'Nombre Completo', ['class'=>'col-form-label s-12']) !!}
                            {!! Form::text('fullname', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Enter User Name', 'id'=>'-fullname', 'onclick'=>'inputClear(this.id)']) !!}
                            <span class="fullname_span"></span>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 m-0" id="status_group">
                                {!! Form::label('status', 'Estado', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::select('status', $status, null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Seleccione', 'id'=>'-status', 'onclick'=>'inputClear(this.id)']) !!}
                                <span class="status_span"></span>
                            </div>
                             <div class="form-group col-6 m-0" id="status_group">
                                {!! Form::label('rol', 'Perfil', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::select('rol', $roles, null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Seleccione', 'id'=>'-rol', 'onclick'=>'inputClear(this.id)']) !!}
                                <span class="status_span"></span>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="form-row mt-1">
                            <div class="form-group col-4 m-0" id="email_group">
                                <i class="icon-envelope-o mr-2"></i>
                                {!! Form::label('email', 'Correo', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::email('email', null, ['class'=>'form-control r-0 light s-12 ', 'placeholder'=>'user@email.com', 'id'=>'-email', 'onclick'=>'inputClear(this.id)']) !!}
                                <span class="email_span"></span>
                            </div>
                            <div class="form-group col-4 m-0">
                                <i class="icon-phone mr-2"></i>
                                {!! Form::label('phone1', 'Teléfono 1', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::text('phone1', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678', 'id'=>'-phone1', 'onclick'=>'inputClear(this.id)']) !!}
                            </div>
                            <div class="form-group col-4 m-0">
                                {!! Form::label('phone2', 'Días Activos', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::text('phone2', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678', 'id'=>'-phone2', 'onclick'=>'inputClear(this.id)']) !!}
                            </div>
                        </div>
                       
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>