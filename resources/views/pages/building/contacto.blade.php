@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('buildings.index')}}">{{ __('Edificios')}}</a> > <a  href="{{ route('buildings.show',$building) }}">{{$building->name}}</a> > Contactos</h1>
@endsection
@section('top-menu')
    {{-- header --}}
    @include('pages.building.headbar')
    {{-- end header --}}
@endsection

@section('maincontent')
{{-- modal create --}}
@include('pages.building.create_contacto')
{{-- modal edit --}}
@include('pages.building.edit_contacto')

<div>
    @include('alerts.toastr')
</div>
<div class="page  height-full">

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="col-md-12">
                <div class="card">
                    <div class="form-group">
                        <div class="card-header white">
                             <h6>{{ __('LISTA DE CONTACTOS') }}</h6>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <div class="form-group">
                            <table id="example3" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='20' style=" font-size: 11px;">
                                <thead>
                                    <tr>
                                        <th><b>{{__('ID')}}</b></th>
                                        <th><b>{{__('TIPO')}}</b></th>
                                        <th><b>{{__('NOMBRE')}}</b></th>
                                        <th><b>{{__('CORREO')}}</b></th>
                                        <th><b>{{__('TELÉFONO')}}</b></th>
                                        @if(!(Auth::user()->hasRole('corredor')))
                                            <th><b>{{__('OPCIONES')}}</b></th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($contactos as $operation)
                                    <tr>
                                        <td>
                                            <div>
                                                {{$operation->id}}
                                            </div>
                                        </td>
                                        <td>{{$operation->tipo->nombre ?? ''}} </td>
                                        <td>{{$operation->nombre ?? ''}} </td>
                                         <td>{{$operation->correo ?? ''}} </td>
                                        <td>{{$operation->telefono ?? ''}} </td>
                                        @if(!(Auth::user()->hasRole('corredor')))
                                        <td class="text-center" style="width: 100px;">
                                            {!! Form::open(['route'=>['building.destroyContacto',$operation->id],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
                                               
                                                 <a href="#" class="btn btn-default btn-sm" title="Editar" data-toggle="modal" data-target="#update" onclick="obtenerDatosGet('{{ route('building.showContacto',$operation->id) }}', '{{ route('building.update_contact',$operation->id) }}')">
                                                    <i class="icon-pencil text-info"></i>
                                                </a>
                                               <button class="btn btn-default btn-sm" onclick="return confirm('¿Realmente deseas borrar el registro?')">
                                                        <i class="icon-trash-can3 text-danger"></i>
                                                </button>
                                           
                                                {!! Form::close() !!}
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
    </div>
    <!--Add New Message Fab Button-->
     @if(!(Auth::user()->hasRole('corredor')))
        <a href="#" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"  data-toggle="modal" data-target="#create"  title="Agregar Contacto">
        <i class="icon-add"></i>
        </a>
    @endif
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
                oLanguage: {
                "sUrl": "//cdn.datatables.net/plug-ins/a5734b29083/i18n/Spanish.json"
                }
            } );

    });
    var title = 'Accounts';
    var colunms = [0,1,2,3,4];
    dataTableExport(title,colunms);
    
   
</script>
@endsection