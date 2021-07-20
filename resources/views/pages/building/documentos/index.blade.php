@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('buildings.index')}}">{{ __('Edificios')}}</a> > <a  href="{{ route('buildings.show',$building) }}">{{$building->name}}</a> > Documentos</h1>
@endsection
@section('top-menu')
    {{-- header --}}
    @include('pages.building.headbar')
    {{-- end header --}}
@endsection

@section('maincontent')

{{-- modal create --}}
@include('pages.building.documentos.create')
@include('pages.building.documentos.edit')

<div class="page  height-full">
    <div>
        @include('alerts.toastr')
    </div>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
              
                <div class="form-group">
                    <div class="card-header white">
                        <h6> {{__('LISTA DE DOCUMENTOS')}} </h6>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <div class="form-group">
                            <table id="example2" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                                <thead>
                                    <tr>
                                        <th width='5%'><b>ID</b></th>
                                        <th><b>NOMBRE</b></th>
                                        <th><b>TIPO DE DOCUMENTOS</b></th>
                                        @if(!(Auth::user()->hasRole('corredor')))
                                        <th width='35%'><b>OPCIONES</b></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                      <tr>
                                        <td  width="5%"> {{$document->id ?? '' }}  </td>
                                        <td  width="20%"> {{$document->nombre ?? '' }}  </td>
                                        <td  width="20%"> {{$document->documento->nombre ?? '' }} </td>
                                        @if(!(Auth::user()->hasRole('corredor')))
                                        <td class="text-center" width="23%">
                                            <div class="">
                                                {!! Form::open(['route'=>['building.destroyDocument',$document->id],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                                 <a class="btn btn-default btn-sm" title="Descargar" href="{{url('/document/download/'.$document->id.'')}}"><i class="icon-download text-info"></i></a>
                                                <a onclick="update({{ $document->id }})" class="btn btn-default btn-sm" title="Detalles">
                                                    <i class="icon-pencil text-info text-info"></i>
                                                </a> 
                                                <button class="btn btn-default btn-sm" onclick="return confirm('¿Realmente deseas borrar el registro?')">
                                                    <i class="icon-trash-can3 text-danger"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                        @endif
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
    @if(!(Auth::user()->hasRole('corredor')))
    <a href="#" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary" data-toggle="modal" data-target="#create" title="Add Rol">
        <i class="icon-add"></i>
    </a>
    @endif
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#documents').addClass('active');
    });
    var title = 'Operations';
    var colunms = [0,1,2];
    dataTableExport(title,colunms);

    function update(id){

    $("#edit").modal("show");
        
        var url ="{{url('getDocumentoEdificio')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#_name').val(data.nombre);
              $('#_documentType').val(data.documento_id);
              $('#_file').val(data.file);
              $('#_id_doc').val(data.id);
              console.log(data);
              
            }
          });
    }
</script>
@endsection
