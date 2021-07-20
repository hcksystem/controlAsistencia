@extends('layouts.app')

@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('buildings.index')}}">{{ __('Edificios')}}</a> > <a  href="{{ route('buildings.show',$building) }}">{{$building->name}}</a> > Asambleas</h1>
@endsection
@section('top-menu')
  {{-- header --}}
  @include('pages.building.headbar')
 {{-- end header --}}
@endsection

@section('maincontent')
@include('pages.building.asambleas.create_document')
@include('pages.building.asambleas.edit_document')
<div>
  @include('alerts.toastr')
</div>
<div class="page  height-full">

  <div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
      <div class="col-md-12">
        <div class="card">
          <div class="form-group">
            <div class="card-header white">
              <h6>{{ __('Información de la Asamblea') }} </h6>
            </div>
          </div>
          <div class="card-body">
            
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-home-tab">
                <form action="{{ route('asambleas.update',$asamblea->id) }}" name="form_add" id="accountForm" method="POST" role="form"enctype="multipart/form-data" autocomplete="off">

                       {{ csrf_field() }}
                
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-row">
                      <div class="form-group col-6 m-0" id="name_group">
                        
                        {!! Form::label('name', __('Edificio*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                    
                        {!! Form::text('name_edificio',$building->name, ['class'=>'form-control r-0 light s-12', 'id'=>'edificio_id', 'readonly'=>'true']) !!}
                        {!! Form::hidden('edificio_id',$asamblea->edificio_id, ['class'=>'form-control r-0 light  s-12', 'id'=>'edificio_id']) !!}
                        <span class="name_span"></span>
                      </div>
                      <div class="form-group col-6 m-0" id="identification_group">
                        {!! Form::label('creado_por', __('Creado por:'), ['class'=>'col-form-label s-12']) !!}
                        {!! Form::text('creado_name', Auth::user()->fullname , ['class'=>'form-control r-0 light s-12', 'id'=>'creado_name','readonly'=>'true']) !!}
                        {!! Form::hidden('creado_por', Auth::user()->id, ['class'=>'form-control r-0 light s-12', 'id'=>'creado_por']) !!}
                        <span class="identification_span"></span>
                      </div>
                      <div class="form-group col-6 m-0" id="region_group">
                        <i class="icon-globe mr-2"></i>
                        {!! Form::label('region', __('Asunto*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::text('asunto', $asamblea->asunto?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'asunto']) !!}
                        <span class="region_span"></span>
                      </div>
                      <div class="form-group col-6 m-0" id="commune_group">
                        <i class="icon-globe mr-2"></i>
                        {!! Form::label('fecha_creacion', __('Fecha Creación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::text('fecha_creacion',date("Y-m-d H:i:s"), ['class'=>'form-control r-0 light s-12', 'id'=>'fecha_creacion','readonly']) !!}
                        <span class="region_span"></span>
                      </div>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-row">
                      <div class="form-group col-12 m-0" id="latitude_group" >
                        {!! Form::label('fecha',__('Fecha*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::text('fecha', $asamblea->fecha ?? null, ['class'=>'form-control date-time-picker  r-0 light s-12', 'id'=>'fecha']) !!}
                        <span class="latitude_span"></span>
                      </div>
                      
                      <div class="form-group col-12 m-0" id="longitude_group" >
                        {!! Form::label('ubicacion',__('Ubicación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::text('ubicacion', $asamblea->ubicacion ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'ubicacion']) !!}
                        <span class="longitude_span"></span>
                      </div>
                       <div class="form-group col-12 m-0" id="longitude_group" >
                        {!! Form::label('enlace_grabacion',__('Enlace Grabación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::text('enlace_grabacion', $asamblea->enlace_grabacion ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'enlace_grabacion']) !!}
                        <span class="longitude_span"></span>
                      </div>
                      
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group col-12 m-0" id="administracion_id_group" >
                        {!! Form::label('descripcion',__('Descripción'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::textarea('descripcion',$asamblea->descripcion ?? null, ['class'=>'form-control r-0 light s-12', 'onclick'=>'inputClear(this.id)','rows'=>'6']) !!}
                        <span class="administracion_id_span"></span>
                      </div>
                    </div>
                  </div>
                 <div class="col-12 text-left mt-2 text-black">
                  <div class="col-7">
                    <h5><b>{{__('Documentos adjuntos')}}</b></h5>
                  </div>
                  <div class="col-5">
                  @if(!(Auth::user()->hasRole('corredor')))
                               <a onclick="ejecutar()" class="btn btn-primary col-6"  title="Ajuntar documento" style="margin-left: 750px; font-size: 12px;">Agregar Documentos</a>
                              @endif
                  </div>
                    
                     
                  </div>
                
                  <div class="col-md-12 mt-2">
                    <div class="form-row">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class="form-group">
                                    <table id="example2" class="table table-bordered table-hover table-sm"
                                        data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                        <thead>
                                            <tr>
                                              
                                                <th><b>NOMBRE</b></th>
                                                <th><b>TIPO DE DOCUMENTOS</b></th>
                                                @if(!(Auth::user()->hasRole('corredor')))
                                                <th width='15%'><b>OPCIONES</b></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                      @foreach ($documents as $document)
                                      <tr>
                                       
                                        <td  width="30%"> {{$document->nombre ?? '' }}  </td>
                                        <td  width="30%"> {{$document->documento->nombre ?? '' }} </td>
                                        @if(!(Auth::user()->hasRole('corredor')))
                                        <td class="text-center" width="10%">
                                            <div class="">
                                               
                                                <a class="btn btn-default btn-sm" title="Descargar" href="{{url('/document/download/asamblea/'.$document->id.'')}}"><i class="icon-download text-info"></i></a>
                                                <a onclick="update({{$document->id }})" class="btn btn-default btn-sm" title="Detalles">
                                                    <i class="icon-pencil text-info text-info"></i>
                                                </a> 
                                                   <a class="btn btn-default btn-sm" onclick="deleteDocument({{ $document->id }})">
                                                    <i class="icon-trash-can3 text-danger"></i>
                                                </a>

                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                             
                        </div>
               
                    
                      
                    </div>
                  </div>
                  
                </div>
                <br>
                <div class="row text-right mt-4">
                  <div class="col-md-12 ">
                    <a href="{{ url()->previous() }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
                    @if(!(Auth::user()->hasRole('corredor')))
                    <button  id="editar" class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
                    <a href="{{ route('asamblea.destroy',$asamblea->id) }}" class="btn btn-danger" data-dismiss="modal">{{__('Eliminar')}}</a>
                    @endif
                  </div>
                </div>
                <br>
                </form>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Add New Message Fab Button-->
    
  </div>
  <script>
    function ejecutar(){
       $("#createDocument").modal("show");
    }

    $( document ).ready(function() {
    $("#file").on('change',function(){
  // this.files[0].size recupera el tamaño del archivo
  // alert(this.files[0].size);
  
  var fileName = this.files[0].name;
  var fileSize = this.files[0].size;

  if(fileSize > 120000000){
    alert('El archivo no debe superar los 3MB');
    this.value = '';
    this.files[0].name = '';
  }else{
    // recuperamos la extensión del archivo
    var ext = fileName.split('.').pop();
    
    // Convertimos en minúscula porque 
    // la extensión del archivo puede estar en mayúscula
    ext = ext.toLowerCase();
    
    // console.log(ext);
    switch (ext) {
      case 'jpg':
      case 'jpeg':
      case 'png':
      case 'pdf': break;
      default:
        alert('El archivo no tiene la extensión adecuada');
        this.value = ''; // reset del valor
        this.files[0].name = '';
    }
  }
});
});    

    function update(id){

    $("#updateDocument").modal("show");
        
        var url ="{{url('getDocumentoAsamblea')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#_nombre').val(data.nombre);
              $('#_documentType').val(data.tipo_documento);
              $('#_file').val(data.file);
              $('#_id').val(data.id);
              console.log(data);
              
            }
          });
    }

       function deleteDocument(id){

        var url ="{{url('asamblea/destroyAsambleaDocument')}}/"+id;

          $.ajax({
            type : 'delete',
            url  : url,
            data : {'id':id},
            success:function(data){
            
              console.log(data);
              location.reload();
            }
          });
    }
 
  </script>
  @endsection

