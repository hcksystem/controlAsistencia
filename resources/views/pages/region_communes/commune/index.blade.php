@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-anchor s-18"></i> Comunas</h1>
@endsection
@section('top-menu')
    {{-- header --}}
    @include('pages.region_communes.headbar')
    {{-- end header --}}
@endsection
@section('maincontent')
{{-- modal create --}}
@include('pages.region_communes.commune.create')
{{-- modal edit --}}
{{-- @include('pages.rol.edit') --}}

<div class="page  height-full">
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
                               <h6>{{ __('LISTA DE COMUNAS') }}</h6>
                            </div>
                         
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="form-group">
                            <table id="example3" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th class="text-center"><b>ID</b></th>
                                        <th class="text-center"><b>NOMBRE</b></th>
                                        <th class="text-center"><b>REGIÓN</b></th>
                                        <th class="text-center"><b>OPCIONES</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($communes as $commune)
                                    <tr>
                                        <td class="text-center">
                                            {{$commune->id}}
                                        </td>
                                        <td class="text-center">
                                            {{$commune->name}}
                                        </td>
                                        <td class="text-center">
                                            {{ $commune->region->name }}
                                        </td>
                                        <td class="text-center">
                                            {!! Form::open(['route'=>['commune.destroy',$commune],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                            <a href="{{ route('commune.edit',$commune) }}" class="btn btn-default btn-sm" title="Editar">
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
        $('#ports').addClass('active');

    });
    var title = 'Ports';
    var colunms = [0,1,2];
    dataTableExport(title,colunms);

    function editPort(id){
        //alert(id);
        var url ="{{url('port/edit')}}/"+id;
        window.location.href = url;
        
    }

    function deletePort(id){
        //alert(id);
        
        var url ="{{url('port/deletePort')}}/"+id;
        confirm('¿Realmente deseas borrar el registro?');
        $.ajax({
            type : 'GET',
            url  : url,
            data : {'id':id},
            success:function(data){
              //console.log(data);
          
              $('#port').DataTable().ajax.reload();
              toastr.success('Port deleted!');
            }
          });
    }
</script>
@endsection