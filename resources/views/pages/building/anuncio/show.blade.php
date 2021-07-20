@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('buildings.index')}}">Edificios</a> > <a href="{{ route('buildings.show',$building->id)}}">{{ $building->name ?? ''}}</a> > <a href="{{ route('anuncio.show',$building->id)}}">{{ __('Anuncios')}}</a></h1>
@endsection
@section('top-menu')
    {{-- header --}}
    @include('pages.building.headbar')
    {{-- end header --}}
@endsection
@section('maincontent')

<div class="page  height-full">
    <div>
        @include('alerts.toastr')
    </div>
  <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="row">
                <div class="col-md-12">
                    <div class="card no-b shadow">
                        <div class="card-body p-0">
                            @if($anuncios->count() < 1)
                            <div class="col-12 text-center p-4">
                                  <p>Aún no hay anuncios publicados</p>
                            </div>
                              
                            @else
                                
                            <div class="table-responsive p-2">
                                <table class="table table-hover m-2" id="example" style="font-size: 12px">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            @if(!Auth::user()->hasRole('operador'))
                                                <td></td>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($anuncios as $anun)
                                    <tr class="no-b">
                                         <td>
                                            <?php
                                                $fecha1 = \Carbon\Carbon::parse($anun->fecha_anuncio);
                                                $fecha2 = \Carbon\Carbon::now();

                                                $diasDiferencia = $fecha2->diffInDays($fecha1);

                                            ?>
                                            <span>Hace {{ $diasDiferencia }} días</span><br>
                                            <span><i class="icon icon-timer"></i>{{  htmlspecialchars_decode(date('d/m/Y', strtotime($anun->fecha_anuncio))) ?? null }}</span>
                                        </td>
                                        <td class="w-10">
                                            {{ Html::image('assets/img/basic/edificio.png', 'a picture', array('alt'=>'Logo')) }}
                                             
                                        </td>
                                        <td>
                                            <a href="{{ route('getAnuncio',$anun->id)}}" target="_blank"><span>{{ $anun->titulo ?? ''}}</span></a><br>
                                            <span>{{ $anun->servicio->nombre ?? null }}</span>
                                            
                                        </td>
                                    
                                        <td>@if($anun->id_status == 1)<span class="badge badge-success">Abierto</span>@else <span class="badge badge-danger">Cerrado</span> @endif</td>
                                        <td>
                                            <span>{{ $building->region->name ?? ''}}</span><br>
                                            <span>{{ $building->commune->name ?? ''}}</span><br>
                                            <span>{{ $building->name ?? ''}}</span><br>
                                            
                                        </td>
                                        @if(!Auth::user()->hasRole('operador'))
                                        <td>
                                            {!! Form::open(['route'=>['anuncio.destroy',$anun->id],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                           <a class="btn-fab btn-fab-sm btn-primary shadow text-white"href="{{ route('anuncio.edit',$anun->id) }}"><i class="icon-pencil" ></i></a>
                                            <button class="btn-fab btn-fab-sm btn-danger shadow text-white" onclick="return confirm('¿Realmente deseas borrar el registro?')">
                                                <i class="icon-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                            
                                            
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                   
                                   
                                    </tbody>
                                </table>
                            </div>
                             @endif
                        </div>
                    </div>
                </div>
            </div>

            <nav class="pt-3" aria-label="Page navigation">
               {{ $anuncios->links() }}
            </nav>
        </div>
    </div>
    <!--Add New Message Fab Button-->
    @if(!(Auth::user()->hasRole('corredor')))
    <a href="{{ route('anuncio.create',$building->id) }}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" title="Agregar Anuncio">
        <i class="icon-add"></i>
    </a>
    @endif
</div>
@endsection
@section('js')
<script src={{asset('assets/plugins/bootstrap-fileinput/js/fileinput.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/piexif.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/sortable.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/locales/es.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/themes/gly/theme.js')}}></script>
<script>

    $(".file").fileinput({
        // theme: 'gly',
        // uploadUrl: '#',
        allowedFileExtensions: ["jpg"],
        showCaption: false,
        showRemove: false,
        showUpload: false,
        showBrowse: false,
        browseOnZoneClick: true,
    });

   $(document).ready(function() {
        $('#example').DataTable( {
          'paging': false,
          'info': false,
          'filter': true,
          "order": [[ 3, "desc" ]],
          "language": {
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