<!-- Modal -->
{!! Form::open(['route'=>'asamblea.createDocumento','method'=>'POST','enctype' => 'multipart/form-data', 'files' => true]) !!}
{{ csrf_field() }}
<div class="modal fade" id="createDocument" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><i class="icon icon-balance-scale s-18"></i> {{__('Agrega Nuevo Documento')}} </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="col-md-12">
            <div class="form-row">
                  <div class="col-4 m-0" id="name_group">
                      <div class="from-group">
                          {!! Form::label('name', 'Nombre', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                          {!! Form::text('nombre', null, ['class'=>'form-control r-0 light s-12', 'id'=>'nombre']) !!}
                          <span class="name_span"></span>
                      </div>
                  </div>
                  <div class="col-8 m-0" id="name_group">
                      <div class="from-group">
                          <i class="icon-cogs mr-2"></i>
                          {!! Form::label('document_type_id', 'Tipo de Documento', ['class'=>'col-form-label s-12']) !!}
                          {!! Form::select('tipo_documento', $documentType, null, ['class'=>'form-control r-0 light s-12 select2', 'id'=>'documentType','multiple'=>'multiple']) !!}
                          <span class="documentType_span"></span>
                      </div>
                  </div>
                  <div class="col-8 m-0" id="name_group">
                      <i class="icon icon-file mr-2"></i>
                      {!! Form::label('file', 'Archivo', ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                      <div class="from-group">
                          {!! Form::file('file', null, ['class'=>'form-control r-0 light s-12', 'id'=>'file']) !!}
                          <span class="file_span"></span>
                      </div>
                  </div>
                      {!! Form::hidden('edificio_id', $asamblea->edificio_id, ['class'=>'form-control r-0 light s-12', 'id'=>'account', 'onclick'=>'inputClear(this.id)']) !!}
                     {!! Form::hidden('asamblea_id', $asamblea->id, ['class'=>'form-control r-0 light s-12', 'id'=>'account', 'onclick'=>'inputClear(this.id)']) !!}
              </div>
          </div>
        </div>
      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('Cerrar')}}</button>
        <button type="submit" class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
 