@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"> <i class="icon icon-documents3 text-blue s-18"></i>
MARCAS</h1>
@endsection
@section('maincontent')

<div class="page height-full">

    {{-- alerts --}}
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="form-group">
                    <div class="card-header white">
                        <h6> LISTA DE MARCAS </h6>
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
                                    <th><b>NOMBRE</b></th>
                                    <th><b>APELLIDO</b></th>
                                    <th><b>IDENTIFICACIÓN</b></th>
                                    <th><b>GRUPO</b></th>
                                    <th><b>FECHA</b></th>
                                    <th><b>TIPO</b></th>
                                    <th><b>SISTEMA</b></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach ($asistencia as $a)
                                <tr class="tbody">
                                    <td>{{ $a->user->fullname ?? null }}</td>
                                    <td>{{ $a->user->last_name ?? null}}</td>
                                    <td>{{ $a->user->rut ?? null }}</td>
                                    <td>{{ $a->user->grupo->group->group ?? null}}</td> 
                                    <td>{{ $a->fecha ?? null }}</td>
                                    <td>@if(isset($a->tipo)) @if($a->tipo == 0) Entrada @else Salida @endif @endif </td>
                                    <td>{{ $a->sistema ?? null }}</td>
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
