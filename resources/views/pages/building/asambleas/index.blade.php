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



<div class="page  height-full">
    <div>
        @include('alerts.toastr')
    </div>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
           <div class="card">
              
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
                                            <th><b>ASUNTO</b></th>
                                            <th><b>CREADO POR</b></th>
                                            <th width='5%'><b></b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $document)
                                          <tr>
                            
                                            <td  width="20%"> {{$document->fecha ?? '' }}  </td>
                                            <td  width="20%"> {{$document->asunto ?? '' }} </td>
                                            <td  width="20%"> {{$document->usuario->fullname ?? '' }} </td>
                                           
                                            <td class="text-center" width="23%">
                                                <div class="">
                                                     @if(isset($building))
                                                     <a class="btn btn-default btn-sm" title="Descargar" href="{{url('asamblea/calendario/'.$document->id.'/'.$building->id.'')}}"><i class="icon-eye text-info"></i></a>
                                                     @else
                                                     <a class="btn btn-default btn-sm" title="Descargar" href="{{url('show/asamblea/'.$document->id.'')}}"><i class="icon-eye text-info"></i></a>
                                                     @endif
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
    @if(isset($building))
        @if(!(Auth::user()->hasRole('corredor')))
        <a href="{{ route('asambleas.createByEdificio',$building->id) }}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" title="Agregar Asamblea">
                    <i class="icon-add"></i></a>
        @endif
    @else 
    <a href="{{ route('asambleas.create') }}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" title="Agregar Asamblea">
        <i class="icon-add"></i>
    </a>
    @endif

</div>
<script>
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
</script>
@endsection

