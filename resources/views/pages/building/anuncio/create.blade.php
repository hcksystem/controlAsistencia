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

<div class="page  height-full" style="margin-top: 150px;">
    <div>
        @include('alerts.toastr')
    </div>
 <div class="container-fluid animatedParent animateOnce my-3 mt-4">
        <div class="animated fadeInUpShort">
           <form action="{{ route('anuncio.store') }}" name="form_add" id="accountForm" method="POST" role="form"enctype="multipart/form-data" autocomplete="off">


                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Solicitado Por:</label>
                                <input type="text" name="solicitado_por" class="form-control" id="validationCustom01"
                                       value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Correo Solicitante</label>
                                <input type="text" class="form-control" name="correo_contacto" id="validationCustom02" placeholder="" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="id_servicio">Servicio</label>
                                {!! Form::select('id_servicio',$conceptos, null, ['class'=>'custom-select form-control  select2 ', 'id'=>'id_servicio']) !!}
                                 {!! Form::hidden('id_edificio',$building->id, ['class'=>'form-control', 'id'=>'id_edificio']) !!}
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">Fecha</label>
                                  {!! Form::text('fecha_anuncio',$date, ['class'=>'form-control', 'id'=>'fecha_anuncio']) !!}
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="sku">Estatus</label>
                               {!! Form::select('id_status',$estatus, 1, ['class'=>'custom-select form-control  select2 ', 'id'=>'estatus']) !!}
                            </div>
                            <div class="col-md-9 m-0">
                                <label for="sku">Título *</label>
                               {!! Form::text('titulo',null, ['class'=>'form-control', 'id'=>'titulo','required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productDetails">Descripción</label>
                           <textarea class="form-control" id="descripcion" name="descripcion" rows="8"></textarea>

                           
                        </div>
                      
                    </div>
                    <div class="col-md-3">
                      
                    </div>
                </div>
                <div class="row text-right">
                        <div class="col-md-12 ">
                            <a href="{{  url()->previous() }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
                            @if(!(Auth::user()->hasRole('corredor')))
                                <button  id="editar" class="btn btn-primary"><i><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
                            @endif
                        </div>
                    </div>
            </form>
        </div>
    </div>
  
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

          $("#fecha_anuncio").datetimepicker({ timepicker:false,format:'d/m/Y',locale: 'es'});  


          $('#mydatatable thead tr').clone(true).appendTo( '#mydatatable thead' );

            $('#mydatatable thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" class="form-control" placeholder="'+title+'" />' );
                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table.column(i).search( this.value ).draw();
                    }
                } );
            } );

             var table = $('#mydatatable').DataTable( {
                dom: '<"top"i>rt<"bottom"lp><"clear">',
                orderCellsTop: true,
                fixedHeader: true,
                // dom: 'Blrtip ',
                buttons: [],
                info:true,
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
    var title = 'Accounts';
    var colunms = [0,1,2,3,4];
    dataTableExport(title,colunms);
    
   
</script>
@endsection