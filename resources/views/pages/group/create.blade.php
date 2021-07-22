{!! Form::open(['route'=>'grupo.store','method'=>'POST', 'class'=>'formlDinamic', 'id'=>'guardarRegistro']) !!}
<div class="modal fade" id="modalCreateGroup" tabindex="-1" role="dialog" aria-labelledby="modalCreateGroup" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Grupo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">  
                <div class="form-group mb-3">
                    <label for="categoryName">Grupo:</label>
                    <input type="text" class="form-control" id="group" name="group" placeholder="Ingrese grupo">
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>Guardar Datos</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}