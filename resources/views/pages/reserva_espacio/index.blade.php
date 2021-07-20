@extends('layouts.app')

@section('title')

     <h1 class="nav-title text-white"><i class="icon icon-building s-18"></i>Reserva</h1>
 
@endsection


@section('maincontent')

<div class="page  height-full">
    <div>
        @include('alerts.toastr')
    </div>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
           <div class="card">
                <div class="form-group col-12 m-0">
                    {!! Form::label('espacio', __('Espacio*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                    <div class="col-6">
                        <div class="form-inline row">
                          <div class="col-8">
                              {!! Form::select('espacio_id',$espacios, $reserva->espacio_id ?? null, ['class'=>'r-0 light select2 col-4', 'id'=>'espacio_id']) !!}
                          </div>  
                         <div class="col-4">
                              <a class="btn btn-default btn-sm col-12" title="Mostrar"  onclick="buscarEspacio()"><i class="icon-search text-info p-2"></i>Filtrar</a>
                         </div>
                        
                         </div>
                    </div>        
                   
                </div>
                <div class="form-group">
                    <div class="card-header white">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-details-1-tab" data-toggle="tab" href="#nav-details-1" role="tab" aria-controls="nav-details-1" aria-selected="true" style="padding-right:1px;padding-left: 2px;">Calendario</a>
                                <a class="nav-item nav-link" id="nav-details-2-tab" data-toggle="tab" href="#nav-details-2" role="tab" aria-controls="nav-details-2" aria-selected="false" style="padding-right:1px;padding-left: 2px;">Lista</a>
                               
                            </div>
                     </nav>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        
                         <div class="tab-pane fade show active" id="nav-details-1" role="tabpanel" aria-labelledby="nav-details-1-tab">
                            
                             {!! $calendar->calendar() !!}                     
                             {!! $calendar->script() !!}
                        </div>
                        <div class="tab-pane fade" id="nav-details-2" role="tabpanel" aria-labelledby="nav-details-2-tab">
                            <div class="table-responsive">
                            <div class="form-group">
                                <table id="example2" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                    <thead>
                                        <tr>
                                            <th><b>FECHA</b></th>
                                            <th><b>DEPARTAMENTO</b></th>
                                            <th><b>CREADO POR</b></th>
                                            <th><b>STATUS</b></th>
                                            <th width='5%'><b></b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $esp)
                                          <tr>
                            
                                            <td  width="20%"> {{$esp->fecha_reserva ?? '' }}  </td>
                                            <td  width="20%"> {{$esp->departamento ?? '' }} </td>
                                            <td  width="20%"> {{$esp->usuario->fullname ?? '' }} </td>
                                            <td  width="20%"> {{$esp->status->nombre ?? '' }} </td>
                                            <td class="text-center" width="23%">
                                                <div class="">
                                                    @if(Auth::user()->hasRole('super') || Auth::user()->hasRole('admin') || Auth::user()->hasRole('mayor'))
                                                    <a onclick="updateStatus({{ $esp->id}})" class="btn btn-default btn-sm" title="Confirmado" style="cursor:pointer;">
                                                    <i class="icon-check text-success"></i>
                                                    </a>
                                                     @endif
                                                     <a class="btn btn-default btn-sm" title="Mostrar" href="{{url('reservaEspacio.mostrar/'.$esp->id.'')}}"><i class="icon-eye text-info"></i></a>
                                                    
                                                </div>
                                            </td>
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
        </div>
    </div>
    <!--Add New Message Fab Button-->
  
    <a href="{{ route('reservaEspacio.create') }}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" title="Agregar Asamblea">
        <i class="icon-add"></i>
    </a>

</div>
<script>
      function buscarEspacio(){
        var id = $('#espacio_id').val();
        if(id === ''){
            toastr.error('Seleccione un espacio');
        }else{
           let url='{{route('reservaEspacio.buscar.espacio',":id")}} '
            url = url.replace(':id',id);
            location.href =url; 
        }
        
     }
     $(document).ready(function() {
       

             var table = $('#example2').DataTable( {
                dom: '<"top"i>rt<"bottom"lp><"clear">',
                orderCellsTop: true,
                fixedHeader: true,
                // dom: 'Blrtip ',
                buttons: [],
                info:false,
                bLengthChange: true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
                order: [[7, 'desc']],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            } );

    });

       function updateStatus(id){

        var id_status = '2';

        var url ="{{url('reserva/updateStatus')}}/"+id;
          $.ajax({
                type : 'POST',
                url  : url,
                data : {'id_status':id_status},
                success:function(data){
    
                 location.reload();
              
                }
            });   
    }
</script>
@endsection

