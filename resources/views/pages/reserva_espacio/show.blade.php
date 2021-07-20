@extends('layouts.app')

@section('title')
     <h1 class="nav-title text-white"><i class="icon icon-building s-18"></i>Reservas</h1>
 
@endsection


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
              <h6>{{ __('Información de la Reserva') }} </h6>
            </div>
          </div>
          <div class="card-body">
            
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-home-tab">
            
               <form action="{{ route('reservaEspacio.update',$reserva->id) }}" method="POST" autocomplete="off">

         
                       {{ csrf_field() }}
                
                <div class="form-row">
                  <div class="col-md-12">
                    <div class="form-row">
                      <div class="form-group col-6 m-0" id="name_group">
                        {!! Form::label('name', __('Edificio*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                    
                        {!! Form::select('edificio_id',$buildings, $reserva->edificio_id ?? null, ['class'=>'form-control r-0 light select2 s-12', 'id'=>'edificio_id']) !!}
              
                        <span class="name_span"></span>
                      </div>
                       <div class="form-group col-6 m-0" id="name_group">
                        {!! Form::label('espacio', __('Espacio'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                    
                        {!! Form::select('espacio_id',$espacios, $reserva->espacio_id ?? null, ['class'=>'form-control r-0 light select2 s-12', 'id'=>'espacio_id']) !!}
              
                        <span class="name_span"></span>
                      </div>
                      <div class="form-group col-6 m-0" id="identification_group">
                        {!! Form::label('creado_por', __('Creado por:'), ['class'=>'col-form-label s-12']) !!}
                        {!! Form::text('creado_name', Auth::user()->fullname , ['class'=>'form-control r-0 light s-12', 'id'=>'creado_name','readonly'=>'true']) !!}
                        {!! Form::hidden('creado_por', Auth::user()->id, ['class'=>'form-control r-0 light s-12', 'id'=>'creado_por']) !!}
                        <span class="identification_span"></span>
                      </div>
                     
                      <div class="form-group col-6 m-0" id="commune_group">
                        <i class="icon-globe mr-2"></i>
                        {!! Form::label('fecha_creacion', __('Fecha Creación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::text('fecha_creacion',$reserva->fecha_creacion ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'fecha_creacion','readonly']) !!}
                        <span class="region_span"></span>
                      </div>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-row">
                       <div class="form-group col-12 m-0" id="region_group">
                        <i class="icon-globe mr-2"></i>
                        {!! Form::label('region', __('Departamento*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::text('departamento', $reserva->departamento ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'asunto']) !!}
                        <span class="region_span"></span>
                      </div>
                      
                      <div class="form-group col-6 m-0">
                       
                        {!! Form::label('fecha',__('Fecha*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        
                         {!! Form::text('fecha_reserva', $reserva->fecha_reserva ?? null, ['class'=>'form-control date-time-picker r-0 light s-12', 'id'=>'fecha']) !!}
                        
                        <span class="latitude_span"></span>
                      </div>
                      <div class="form-group col-3 m-0">
                        {!! Form::label('fecha',__('Hora Inicio*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                    
                          {!! Form::time('hora_inicio', $reserva->hora_inicio ?? null, ['class'=>'form-control ml-1 p-0  light s-12', 'id'=>'hora_inicio']) !!}
                     
                        <span class="latitude_span"></span>
                      </div>
                      <div class="form-group col-3 m-0">
                        {!! Form::label('fecha',__('Hora Fin*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                    
                          {!! Form::time('hora_fin', $reserva->hora_fin ?? null, ['class'=>'form-control ml-1 p-0  light s-12', 'id'=>'hora_fin']) !!}
                     
                        <span class="latitude_span"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group col-12 m-0" id="administracion_id_group" >
                        {!! Form::label('dobservaciones',__('Observaciones'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                        {!! Form::textarea('observaciones',$reserva->observaciones ?? null, ['class'=>'form-control r-0 light s-12', 'onclick'=>'inputClear(this.id)','rows'=>'6']) !!}
                        <span class="administracion_id_span"></span>
                      </div>
                    </div>
                  </div>
                
                  
                </div>
                <br>
                <div class="row text-right mt-4">
                  <div class="col-md-12 ">
                    <a href="{{ route('reservaEspacio.index') }}" class="btn btn-default">{{__('Atrás')}}</a>
                    <button  type="submit" id="editar" class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Actualizar')}}</button>
                     <a href="{{ route('reservaEspacio.destroy',$reserva->id) }}" class="btn btn-danger" >{{__('Eliminar')}}</a>
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
    $(document).ready(function() {
      $("#edificio_id").change(function(){
         
          var id = $("#edificio_id").val();
          
          if(id == ''){
            id = 0;
          }else{
            id = id;
          }
            var url ="{{url('buscarEspacio')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
              console.log(data);
              $("#espacio_id").find('option').remove();
                var options = [];
          $.each(data, function(key, value) {
              options.push($("<option/>", {
                  value: key,
                  text: value
              }));
          });

        
          $('#espacio_id').append(options);
            }
          });
          
      }); 

      $("#hora_inicio,#hora_fin").change(function () {
            var h1 = $('#hora_inicio').val();
            var h2 = $('#hora_fin').val();

            var jdt1 = Date.parse('20 Aug 2000 '+h1);
            var jdt2 = Date.parse('20 Aug 2000 '+h2);

            if( jdt1 < jdt2){
              $('#editar').attr('disabled',false);
            }else{
               toastr.error('La Hora Final no puede ser mayor que la inicial');
               $('#editar').attr('disabled',true);
            }
        });

    });


  </script>
  @endsection

