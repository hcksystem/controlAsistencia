@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-widgets s-18"></i>MetaTypes</h1>
@endsection

@section('maincontent')
{{-- modal create --}}
@include('pages.metaType.create')
{{-- modal edit --}}
@include('pages.metaType.edit')

<div class="page  height-full">
    <div>
        @include('alerts.toastr')
    </div>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="form-group">
                    <div class="card-header white">
                        <h6> LISTA  DE METATYPES</h6>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="form-group">
                            <table id="example2" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th><b>ID</b></th>
                                        <th><b>CAMPO</b></th>
                                        <th><b>REQUERIDO</b></th>
                                        <th><b>MODULO</b></th>
                                        <th><b>DATATYPE</b></th>
                                        <th><b>ACTIVO</b></th>
                                        <th><b>ORDEN</b></th>
                                        <th><b>OPCIONES</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($metaTypes as $metaType)
                                    <tr>
                                        <td> {{ $metaType->id }} </td>
                                        <td>
                                            {{ $metaType->campo ?? '' }}
                                        </td>
                                        <td>
                                          @if ($metaType->requerido == 1)
                                          <span class="icon icon-circle s-12  mr-2 text-success"></span> Si</td>
                                          @else
                                          <span class="icon icon-circle s-12  mr-2 text-danger"></span>   No</td>
                                          @endif
                                            
                                        </td>
                                        <td> {{ $metaType->modulo->modulo ?? '' }}</td>
                                        <td> {{ $metaType->dataType->type ?? '' }}</td>
                                        <td>
                                          @if ($metaType->activo == 1)
                                          <span class="icon icon-circle s-12  mr-2 text-success"></span> Si</td>
                                          @else
                                          <span class="icon icon-circle s-12  mr-2 text-danger"></span>   No</td>
                                          @endif
                                            
                                        </td>
                                         <td> {{ $metaType->orden ?? '' }} </td>
                                        <td class="text-center">
                                            {!! Form::open(['route'=>['metaType.destroy',$metaType],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                             <a href="#" class="btn btn-default btn-sm" title="Editar" data-toggle="modal" data-target="#update" onclick="obtenerDatosGet('{{ route('metaType.edit',$metaType) }}', '{{ route('metaType.update',$metaType->id) }}')">
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
    });
    var title = 'MetaTypes';
    var colunms = [0,1,2,3];
    dataTableExport(title,colunms);
</script>
@endsection
