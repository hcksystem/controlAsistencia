<!-- Modal Update-->
{!! Form::open(['method'=>'PUT','class'=>'formlDinamic form','id'=>'DataUpdate']) !!}
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"><i class="icon-pencil"></i>Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group m-0 has-feedback" id="fullname_group">
                            <i class="icon-person mr-2"></i>
                            {!! Form::label('name', 'Nombre Completo', ['class'=>'col-form-label s-12']) !!}
                            {!! Form::text('fullname', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Enter User Name', 'id'=>'_fullname', 'onclick'=>'inputClear(this.id)']) !!}
                            <span class="fullname_span"></span>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 m-0" id="password_group">
                                <i class="icon-key3 mr-2"></i>
                                {!! Form::label('password', 'Contraseña', ['class'=>'col-form-label s-12','placeholder'=>'Password', 'onclick'=>'inputClear(this.id)']) !!}
                                {!! Form::password('password', ['class'=>'form-control r-0 light s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                <span class="password_span"></span>
                            </div>
                            <div class="form-group col-6 m-0">
                                <i class="icon-key4 mr-2"></i>
                                {!! Form::label('passwordConfirm', 'Confirma Contraseña', ['class'=>'col-form-label s-12','placeholder'=>'Password Confirm']) !!}
                                {!! Form::password('password_confirmation', ['class'=>'form-control r-0 light s-12', 'id'=>'password_confirmation', 'onclick'=>'inputClear(this.id)']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 m-0" id="_rol_group">
                                {!! Form::label('role', 'Perfil', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::select('rol', $roles, null, ['class'=>'form-control r-0 light s-12', 'id'=>'_rol', 'onclick'=>'inputClear(this.id)']) !!}
                                <span class="_rol_span"></span>
                            </div>
                            <div class="form-group col-6 m-0" id="status_group">
                                {!! Form::label('status', 'Estado', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::select('status', $status, null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Select', 'id'=>'_status', 'onclick'=>'inputClear(this.id)']) !!}
                                <span class="status_span"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-row mt-1">
                            <div class="form-group col-4 m-0" id="email_group">
                                <i class="icon-envelope-o mr-2"></i>
                                {!! Form::label('email', 'Correo', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::email('email', null, ['class'=>'form-control r-0 light s-12 ', 'placeholder'=>'user@email.com', 'id'=>'_email', 'onclick'=>'inputClear(this.id)']) !!}
                                <span class="email_span"></span>
                            </div>
                            <div class="form-group col-4 m-0">
                                <i class="icon-phone mr-2"></i>
                                {!! Form::label('phone1', 'Teléfono 1', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::text('phone1', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678', 'id'=>'_phone1', 'onclick'=>'inputClear(this.id)']) !!}
                            </div>
                            <div class="form-group col-4 m-0">
                                <i class="icon-phone mr-2"></i>
                                {!! Form::label('phone2', 'Teléfono 2', ['class'=>'col-form-label s-12']) !!}
                                {!! Form::text('phone2', null, ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678', 'id'=>'_phone2', 'onclick'=>'inputClear(this.id)']) !!}
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
<script type="text/javascript">

    var _validFileExtensions = [".jpg",".png"];   
    function ValidarTamaño(obj)
    {
        console.log(obj);
        if (obj.type == "file") {
        var sFileName = obj.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                    $('.file_span').html("");
                }

            }


             
            if (!blnValid) {
               /* alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));*/
                $('.file_span').html("");
                $('.file_span').append("<p class='alert alert-danger'>Sorry,"+ sFileName + " is invalid, allowed extensions are: jpg</p>");
                obj.value = "";
                return false;
            }

            var fileSize = $('#file')[0].files[0].size;
            var siezekiloByte = parseInt(fileSize / 1024);
            if (siezekiloByte >  $('#file').attr('size')) {
                $('.file_span').html("");
                $('.file_span').append("<p class='alert alert-danger'>Sorry,"+ sFileName + " size should not be greater than 15kb</p>");
                 $('.file').html("");
                return false;
            }
        }
    }
    return true;
    }
</script>
{!! Form::close() !!}