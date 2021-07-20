@extends('layouts.app')

@section('title')
 @if(isset($building))
     <h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('buildings.index')}}">{{ __('Edificios')}}</a> > <a  href="{{ route('buildings.show',$building) }}">{{$building->name}}</a> > Asambleas</h1>
@else
     <h1 class="nav-title text-white"><i class="icon icon-building s-18"></i>Asambleas</h1>
 @endif   
@endsection
@if(isset($building))
    @section('top-menu')
        {{-- header --}}
        @include('pages.building.headbar')
        {{-- end header --}}
    @endsection
@endif

@section('maincontent')
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
               @if(isset($building))
                <form action="{{ route('asambleas.storeEdificio') }}" name="form_add" id="accountForm" method="POST" role="form"enctype="multipart/form-data" autocomplete="off">
               @else 
               <form action="{{ route('asambleas.store') }}" name="form_add" id="accountForm" method="POST" role="form"enctype="multipart/form-data" autocomplete="off">

               @endif  
                       {{ csrf_field() }}
                
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-row">
                      <div class="form-group col-6 m-0" id="name_group">
                        {!! Form::label('name', __('Edificio*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                    
                        @if(isset($building))

                         {!! Form::text('name_edificio',$building->name, ['class'=>'form-control r-0 light s-12', 'id'=>'edificio_id', 'readonly'=>'true']) !!}
                        {!! Form::hidden('edificio_id',$building->id, ['class'=>'form-control r-0 light  s-12', 'id'=>'edificio_id']) !!}
                        @else
                        
                        {!! Form::select('edificio_id',$buildings, null, ['class'=>'form-control r-0 light select2 s-12', 'id'=>'edificio_id']) !!}
                        @endif
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
                        {!! Form::text('asunto', null, ['class'=>'form-control r-0 light s-12', 'id'=>'asunto']) !!}
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
                        {!! Form::text('fecha', null, ['class'=>'form-control date-time-picker  r-0 light s-12', 'id'=>'fecha']) !!}
                        <span class="latitude_span"></span>
                      </div>
                      
                      <div class="form-group col-12 m-0" id="longitude_group" >
                        {!! Form::label('ubicacion',__('Ubicación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::text('ubicacion', null, ['class'=>'form-control r-0 light s-12', 'id'=>'ubicacion']) !!}
                        <span class="longitude_span"></span>
                      </div>
                       <div class="form-group col-12 m-0" id="longitude_group" >
                        {!! Form::label('enlace_grabacion',__('Enlace Grabación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::text('enlace_grabacion', null, ['class'=>'form-control r-0 light s-12', 'id'=>'enlace_grabacion']) !!}
                        <span class="longitude_span"></span>
                      </div>
                      
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group col-12 m-0" id="administracion_id_group" >
                        {!! Form::label('descripcion',__('Descripción'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::textarea('descripcion',null, ['class'=>'form-control r-0 light s-12', 'onclick'=>'inputClear(this.id)','rows'=>'6']) !!}
                        <span class="administracion_id_span"></span>
                      </div>
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
                                                <th width='5%'><b>ID</b></th>
                                                <th><b>NOMBRE</b></th>
                                                <th><b>TIPO DE DOCUMENTOS</b></th>
                                                <th width='15%'><b>OPCIONES</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                               <a onclick="ejecutar()" class="btn-fab btn-fab-md fab-right shadow btn-primary"  title="Ajuntar documento" style="margin-left: 800px;">
                                <i class="icon-add"></i>
                              </a>
                        </div>
               
                    
                      
                    </div>
                  </div>
                  
                </div>
                <br>
                <div class="row text-right mt-4">
                  <div class="col-md-12 ">
                    <a href="{{ route('edificios.asamblea') }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
                    <button  id="editar" class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
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
         toastr.error('Debe crear la asamblea para almacenar documentos');
    }

  </script>
  @endsection

