<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Envíale un mensaje</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="formEmail">
           <div class="form-group has-icon"><i class="icon-user-secret"></i>
                <input type="text" name="nombre" class="form-control form-control-lg" placeholder="Tu nombre">
            </div>
            <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                <input type="text" name="correo" class="form-control form-control-lg" placeholder="Tu correo">
            </div>
            <div class="form-group has-icon"><i class="icon-phone"></i>
                <input type="text" name="telefono" class="form-control form-control-lg" placeholder="Tu teléfono">
            </div>
            <div class="form-group has-icon"><i class="icon-building"></i>
                <input type="text" name="empresa" class="form-control form-control-lg" placeholder="Empresa">
            </div>
              <div class="form-group has-icon"><i class="icon-pencil"></i>
                <input type="text" name="mensaje" class="form-control form-control-lg" placeholder="Mensaje">
            </div>
            <div class="col-12 text-center">
              <a onclick="enviarMsj()" class="btn btn-primary btn-md">Enviar</a>
            </div>
             {!! Form::hidden('name_edificio',$building->name, ['class'=>'form-control']) !!}
             {!! Form::hidden('id_anuncio',$anuncio->id, ['class'=>'form-control']) !!}     
             {!! Form::hidden('nombre_solicitante',$anuncio->solicitado_por ?? null, ['class'=>'form-control']) !!}               
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>