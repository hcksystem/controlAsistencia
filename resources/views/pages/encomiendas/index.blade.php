@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-widgets s-18"></i><a href="{{ route('administraciones.index')}}">{{ __('Encomiendas')}}  @if(session()->has('idEdificio')) | {{ session('nameEdificio')}} @endif</a></h1>
@endsection


@section('maincontent')

{{-- modal create --}}
@include('pages.encomiendas.create')
{{-- modal edit --}}
@include('pages.encomiendas.edit')

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
                               <h6>{{ __('LISTA DE ENCOMIENDAS') }}</h6>
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
                                        <th width="20%"><b>{{ __('EDIFICIO') }}</b></th>
                                        <th width="15%"><b>{{ __('DEPARTAMENTO') }}</b></th>
                                        <th width="20%"><b>{{ __('DESCRIPCIÓN') }}</b></th>
                                        <th width="10%"><b>{{ __('DESTINATARIO') }}</b></th>
                                        <th width="15%"><b>{{ __('FECHA RECEPCIÓN') }}</b></th>
                                        <th width="5%"><b>{{ __('STATUS') }}</b></th>
                                        <th width="15%"><b></b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($encomiendas as $en)
                                    <tr @if($en->status_id != '2' && empty($en->fecha_entrega_recepcion) &&  Carbon\Carbon::parse($en->fecha_hora_recepcion)->diff(Carbon\Carbon::now())->days > 1) style="background:#ff6161" @endif>
                                        <td  width="20%"> {{$en->edificio->name ?? '' }} </td>
                                        <td  width="15%"> {{$en->departamento ?? '' }} </td>
                                        <td  width="20%"> {{$en->descripcion ?? '' }} </td>
                                        <td  width="10%"> {{$en->destinatario ?? '' }} </td>
                                        <td  width="15%"> {{$en->fecha_hora_recepcion ?? '' }} </td>
                                        <td  width="5%"> {{$en->status->nombre ?? '' }} </td>
                                        <td class="text-center"  width="15%">
                                            <div class="">
                                                {!! Form::open(['route'=>['encomiendas.destroy',$en],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                                <a onclick="updateStatus({{ $en->id}})" class="btn btn-default btn-xs" title="Entregado" style="cursor:pointer;">
                                                <i class="icon-check text-success"></i>
                                                </a>
                                                <a onclick="show({{ $en->id}})" class="btn btn-default btn-xs" title="Editar" style="cursor:pointer;">
                                                <i class="icon-pencil text-info"></i>
                                                </a>
                                                 @if(!(Auth::user()->hasRole('mayor')))
                                                 
                                                <button class="btn btn-default btn-xs" onclick="return confirm('¿Realmente deseas borrar el registro?')">
                                                    <i style="cursor:pointer;" @if($en->status_id != '2' && empty($en->fecha_entrega_recepcion) &&  Carbon\Carbon::parse($en->fecha_hora_recepcion)->diff(Carbon\Carbon::now())->days > 1) class="icon-trash-can3 text-white" @else class="icon-trash-can3 text-danger" @endif></i>
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
  
    <a href="#" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" data-toggle="modal" data-target="#create" title="Agregar Encomienda">
        <i class="icon-add"></i></a>
   
</div>
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


    var title = 'Administracion';
    var colunms = [0,1,2,3,4];
    dataTableExport(title,colunms);
    
   function show(id){
     
        $("#edit").modal("show");
            var url ="{{url('encomiendas/show')}}/"+id;
            $.ajax({
                type : 'get',
                url  : url,
                data : {'id':id},
                success:function(data){
                 
                  $('#_edificio_id').val(data.edificio_id);
                  $('#_usuario_id').val(data.usuario_id);
                  $('#_descripcion').val(data.descripcion);
                  $('#_departamento').val(data.departamento);

                  $('#_destinatario').val(data.destinatario);
                  $('#_fecha_hora_recepcion').val(data.fecha_hora_recepcion);
                  $('#_fecha_entrega_recepcion').val(data.fecha_entrega_recepcion);
                  $('#_beneficiary_name').val(data.beneficiary_name);
                  $('#_intermediary_info').val(data.intermediary_info);
                   $('#_status_id').val(data.status_id);
             
                  $('#_id').val(data.id);
                 
                  
                  console.log(data);
              
                }
            });
    }

    function updateEncomienda(){

        var formData = $('#updateEncomienda').serialize();
        var id = $('#_id').val();
        var url ="{{url('encomienda/update')}}/"+id;

         $.ajax({
                type : 'POST',
                url  : url,
                data : formData,
                success:function(data){
                  
                  console.log(data);
                  $('#edit').hide();
                 location.reload();
              
                }
            });
    }

    function updateStatus(id){

        var status_id = '2';

         var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var m = now.getMinutes();
        var minutes = (m < 10) ? '0' + m : m;

        var today = now.getFullYear()+"/"+(month)+"/"+(day)+" "+now.getHours()+":"+minutes;
        var fecha_entrega_recepcion = today;
        var url ="{{url('encomienda/updateStatus')}}/"+id;
          $.ajax({
                type : 'POST',
                url  : url,
                data : {'status_id':status_id,'fecha_entrega_recepcion':fecha_entrega_recepcion},
                success:function(data){
    
                 location.reload();
              
                }
            });   
    }
</script>
@endsection