@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><i class="icon-document-text s-18"></i>Edificio Meta</h1>
@endsection

@section('top-menu')
    {{-- header --}}
    @include('pages.building.headbar')
    {{-- end header --}}
@endsection

@section('maincontent')
{{-- modal create --}}
@include('pages.building.buildingMeta.create')
{{-- modal edit --}}
{{-- @include('pages.rol.edit') --}}

<div class="page  height-full">
    {{-- header --}}
    @include('pages.building.headbar')
    {{-- end header --}}
    <div>
        @include('alerts.toastr')
    </div>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="form-group">
                    <div class="card-header white">
                       <div class="form-group row">
                            <div class="col-sm-10" style="margin-top: 5px;">
                               <h6>{{ __('LISTA EDIFICIO META') }}</h6>
                            </div>
                            <button class="col-sm-2 btn btn-default btn-sm" ><img src="img/excel-ico.png" alt="" heigth= "" style="padding:0px !important" /> Exportar Excell</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="form-group">
                            <table id="example3" class="table table-bordered table-hover"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th><b>ID</b></th>
                                        <th><b>EDIFICIO</b></th>
                                        <th><b>EDIFICIO META TYPE</b></th>
                                        <th><b>VALOR</b></th>
                                        <th><b>OPCIONES</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($metas as $meta)
                                    <tr>
                                        <td>
                                            {{$meta->id}} 
                                        </td>
                                        <td>
                                            {{ $meta->buildings->name ?? '' }} 
                                        </td>
                                        <td>
                                            {{ $meta->buildingsMetaTypes->data_type_id ?? '' }}
                                        </td>
                                        <td>
                                            {{$meta->value}}
                                        </td>
                                        <td class="text-center">
                                            {!! Form::open(['route'=>['buildingMeta.destroy',$meta],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                            <a href="{{ route('buildingMeta.edit',$meta) }}" class="btn btn-default btn-sm" title="Editar">
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
    <a href="#" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" data-toggle="modal" data-target="#create" title="Add Account">
        <i class="icon-add"></i>
    </a>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#meta').addClass('active');
    });
    var title = 'Accounts Meta';
    var colunms = [0,1,2,3];
    dataTableExport(title,colunms);
</script>
@endsection