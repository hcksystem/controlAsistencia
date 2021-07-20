@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"> <i class="icon icon-documents3 text-blue s-18"></i>
Tipología</h1>
@endsection
@section('maincontent')
{{-- modal create --}}
@include('pages.tipologia.create')

{{-- modal edit --}}
@include('pages.tipologia.edit')
<div class="page height-full">

    {{-- alerts --}}
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="form-group">
                    <div class="card-header white">
                        <h6> LISTA DE TIPOLOGIA </h6>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <div class="row text-right"> --}}
                        <div class="col-md-12 text-right">
                            <div class="form-group">

                            </div>
                        </div>
                    {{-- </div> --}}
                    <div id="table" class=" table-responsive">
                    <table id="mydatatable" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                            <thead>
                                <tr>
                                    <th><b>ID</b></th>
                                    <th><b>TIPOLOGIA</b></th>
                                    <th><b>OPCIONES</b></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach ($tipologia as $tipo)
                                <tr class="tbody">
                                    <td>{{ $tipo->id }}</td>
                                    <td>{{ $tipo->tipologia }}</td>
                                    
                                     <td class="text-center">
                                            {!! Form::open(['route'=>['tipologia.destroy',$tipo],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                             <a href="#" class="btn btn-default btn-sm" title="Editar" data-toggle="modal" data-target="#update" onclick="obtenerDatosGet('{{ route('tipologia.edit',$tipo->id) }}', '{{ route('tipologia.update',$tipo->id) }}')">
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
<a href="#" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" data-toggle="modal" data-target="#create" title="Add Currency">
    <i class="icon-add"></i>
</a>
@endsection
@section('js')
<script>
$(document).ready(function() {

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

</script>
@endsection
