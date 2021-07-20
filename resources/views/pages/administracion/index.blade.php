@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-widgets s-18"></i><a href="{{ route('administraciones.index')}}">{{ __('Administraciones')}}</a></h1>
@endsection


@section('maincontent')

<div class="page  height-full">
   
    <div>
        @include('alerts.toastr')
    </div>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card" style="margin-top: 80px;">
                <div class="form-group">
                   <div class="card-header white">
                         <div class="form-group row">
                            <div class="col-sm-10" style="margin-top: 5px;">
                               <h6>{{ __('LISTA DE ADMINISTRACIONES') }}</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="form-group">
                            <table id="mydatatable" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                <thead>
                                    <tr>
                                        
                                        <th width="30%"><b>{{ __('NOMBRE') }}</b></th>
                                        <th width="30%"><b>{{ __('REGIÓN') }}</b></th>
                                        <th width="20%"><b>{{ __('COMUNA') }}</b></th>
                                        <th width="10%"><b></b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($administracion as $admin)
                                    <tr>
                                        
                                        <td  width="30%"> {{$admin->nombre ?? '' }} </td>
                                        <td  width="30%"> {{$admin->region->name ?? '' }} </td>
                                        <td  width="20%"> {{$admin->commune->name ?? '' }} </td>
                                        
                                        <td class="text-center"  width="10%">
                                            <div class="">
                                                {!! Form::open(['route'=>['administraciones.destroy',$admin],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                                <a href="{{ route('administraciones.show',$admin->id) }}" class="btn btn-default btn-sm" title="Editar">
                                                <i class="icon-pencil text-info"></i>
                                                </a>
                                                @if(Auth::user()->hasRole('super'))
                                                <button class="btn btn-default btn-sm" onclick="return confirm('¿Realmente deseas borrar el registro?')">
                                                    <i class="icon-trash-can3 text-danger"></i>
                                                </button>
                                                @endif
                                                {!! Form::close() !!}
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
    <!--Add New Message Fab Button-->
    @if(Auth::user()->hasRole('super'))
    <a href="{{ route('administraciones.create') }}" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" title="Agregar Administracion">
        <i class="icon-add"></i>
    </a>
    @endif
</div>
@endsection
@section('js')
<script>


    $(document).ready(function() {
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


    var title = 'Administracion';
    var colunms = [0,1,2,3,4];
    dataTableExport(title,colunms);
    
   
</script>
@endsection