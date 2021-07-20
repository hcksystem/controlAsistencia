@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-widgets s-18"></i>Listas</h1>
@endsection

@section('maincontent')
{{-- modal create --}}
@include('pages.metaList.create')
{{-- modal edit --}}
@include('pages.metaList.edit')

<div class="page  height-full">
    <div>
        @include('alerts.toastr')
    </div>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="form-group">
                    <div class="card-header white">
                        <h6> LISTA  DE DATOS</h6>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="form-group">
                            <table id="mydatatable" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th><b>ID</b></th>
                                        <th><b>CAMPO</b></th>
                                        <th><b>VALOR</b></th>
                                        <th><b>OPCIONES</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($metaList as $meta)
                                    <tr>
                                        <td> {{ $meta->id }} </td>
                                        <td>
                                            {{ $meta->metaType->campo ?? '' }}
                                        </td>
                                        <td> {{ $meta->metaListValue ?? '' }}</td>
                                        
                                        <td class="text-center">
                                            {!! Form::open(['route'=>['metaList.destroy',$meta],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                             <a href="#" class="btn btn-default btn-sm" title="Editar" data-toggle="modal" data-target="#update" onclick="obtenerDatosGet('{{ route('metaList.edit',$meta) }}', '{{ route('metaList.update',$meta->id) }}')">
                                            <i class="icon-pencil text-info"></i>
                                            </a>
                                            
                                            <button class="btn btn-default btn-sm" onclick="return confirm('¿Realmente deseas borrar el registro?')">
                                                <i class="icon-trash-can3 text-danger"></i>
                                            </button>
                                            {!! Form::close() !!}
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
    <a href="#" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" data-toggle="modal" data-target="#create" title="Add Rol">
        <i class="icon-add"></i>
    </a>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#account').addClass('active');

        var table = $('#mydatatable').DataTable( {
                orderCellsTop: true,
                fixedHeader: true,
                searching: true,
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
    var title = 'MetaTypes';
    var colunms = [0,1,2,3];
    dataTableExport(title,colunms);
</script>
@endsection
