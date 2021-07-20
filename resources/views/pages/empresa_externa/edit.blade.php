

@extends('layouts.app')

@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('empresaExterna.index')}}">{{ __('Empresas Externas')}}</a> > {{ $empresa->nombre ?? "" }}</h1>
@endsection

@section('maincontent')
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
                            <h6>{{ __('Información de la Empresa') }} </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form name="form_add" id="accountForm" method="POST" role="form" files="true" enctype="multipart/form-data" autocomplete="off"> 
                               

                                 {{ csrf_field() }}
                                
                                <div class="form-row">
                                    <div class="col-md-9">
                                        <div class="form-row">
                                            <div class="form-group col-6 m-0" id="name_group">
                                                {!! Form::label('name', __('Nombre*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                                {!! Form::text('nombre', $empresa->nombre ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'nombre']) !!}
                                                <span class="name_span"></span>
                                            </div>
                                            <div class="form-group col-6 m-0" id="identification_group">
                                                {!! Form::label('tax_id', __('Teléfono'), ['class'=>'col-form-label s-12']) !!}
                                                {!! Form::text('telefono', $empresa->telefono ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'telefono']) !!}
                                                <span class="telefono_span"></span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            
                                            <div class="form-group col-6 m-0" id="contacto_group">
                                                <i class="icon-envelope-o mr-2"></i>
                                                {!! Form::label('contacto', __('Contacto'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                                {!! Form::text('contacto', $empresa->contacto ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'contacto']) !!}
                                                <span class="contacto_span"></span>
                                            </div>
                                            <div class="form-group col-6 m-0" id="trayectoria_group">
                                                <i class="icon-web mr-2"></i>
                                                {!! Form::label('identificacion', __('Identificación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                                {!! Form::text('identificacion', $empresa->identificacion ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'identificacion']) !!}
                                                {!! Form::hidden('id', $empresa->id ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'_id']) !!}
                                                <span class="trayectoria_span"></span>
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                         
                                          <div class="form-group col-6 m-0" id="trayectoria_group">
                                            <i class="icon-web mr-2"></i>
                                            {!! Form::label('trayectoria', __('Trayectoria'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                            {!! Form::text('trayectoria', $empresa->trayectoria ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'trayectoria']) !!}
                                            <span class="trayectoria_span"></span>
                                          </div>
                                           <div class="col-6 m-0 from-group">
                                              <i class="icon-cogs mr-2"></i>
                                              {!! Form::label('categoria', 'Categorías', ['class'=>'col-form-label s-12']) !!}
                                              {!! Form::select('categoria[]', $categoria, $selected, ['class'=>'form-control r-0 light s-12 select2', 'id'=>'categoria','multiple'=>'multiple']) !!}
                                              <span class="documentType_span"></span>
                                            </div>
                                            <div class="form-group col-12 m-0" id="address_group">
                                                {!! Form::label('address',__('Dirección'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                                {!! Form::textarea('direccion', $empresa->direccion ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'direccion', 'rows'=>2]) !!}
                                                <span class="address_span"></span>
                                            </div>
                                            @if(!Auth::user()->hasRole('copro'))
                                            <div class="form-group col-6 m-0" id="region_group">
                                            <i class="icon-globe mr-2"></i>
                                            {!! Form::label('region', __('Región-Comuna'), ['class'=>'col-form-label  s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                            {!! Form::select('region_id',$comunas, $empresa->region_id ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'region_id']) !!}
                                            <span class="region_span"></span>
                                          </div>
                                          <div class="form-group col-1 mt-2" id="commune_group">
                                             <a class="btn btn-primary btn-sm mt-4" onclick="addComuna()" style="margin-top: 10px"><i class="icon icon-plus" style="font-size: 12px;padding: .10rem .4rem;"></i></a>
                                          </div>
                                          <div class="form-group col-1 mt-2" id="name_group" style="margin-left:-15px;">
                                                {!! Form::text('cant_ciudades_disponible', floatval($empresa->cant_ciudades - $cant_ciudades ), ['class'=>'form-control r-0 light s-12 mt-4','style'=>'padding:0px !important','id'=>'cant_ciudades_disponible','readonly']) !!}
                                                {!! Form::hidden('cant_ciudades_disponible', $cant_ciudades ?? '', ['class'=>'form-control r-0 light s-12 mt-4', 'id'=>'cant_ciudades2','readonly']) !!}
                                                <span class="name_span"></span>
                                            </div>
                                            <div class="form-group col-2 mt-4 pt-3" style="margin-left:-20px;">
                                                <span class="name_span">Cupos disponibles</span> 
                                            </div>
                                          @endif 
                                          @if(!Auth::user()->hasRole('copro'))
                                                     <table id="table_comuna" class="table table-bordered table-hover table-sm" data-order='[[ 0, "desc" ]]' data-page-length='10' style="width: 100%">
                                                         <thead>
                                                                <tr>
                                                                    <th class="text-center"><b>{{ __('Región-Comuna') }}</b></th>
                                                                    <th class="text-center">Opción</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                     </table>
                                                @else
                                                    <table id="table_comuna2" class="table table-bordered table-hover table-sm" data-order='[[ 0, "desc" ]]' data-page-length='10' style="width: 100%">
                                                         <thead>
                                                                <tr>
                                                                    <th class="text-center"><b>{{ __('Región-Comuna') }}</b></th>
                                                                  
                                                                </tr>
                                                            </thead>
                                                            
                                                     </table>
                                                @endif
                                        </div>
                                        {!! Form::hidden('route', route('empresaExterna.store'), ['id'=>'route']) !!}
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            {!! Form::label('logo',__('Logo'), ['class'=>'col-form-label s-12']) !!}
                                            <input id="file" class="file" name="logo" type="file">
                                            {!! Form::hidden('ruta',$empresa->logo ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'_url_imagen']) !!}
                                            <span class="file_span"></span>
                                        </div>
                                    </div>
                                     <div class="form-group col-12 m-0" id="contacto_group">

                                    {!! Form::label('cant_ciudades', __('Cantidad de Ciudades Permitidas'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                    @if(Auth::user()->hasRole('super') || Auth::user()->hasRole('admin'))
                                    {!! Form::text('cant_ciudades', $empresa->cant_ciudades ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'cant_ciudades','onkeypress'=>'return soloNumeros(event)']) !!}
                                    @else
                                    {!! Form::text('cant_ciudades', $empresa->cant_ciudades ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'cant_ciudades','onkeypress'=>'return soloNumeros(event)','readonly']) !!}
                                    @endif
                                    <span class="contacto_span"></span>
                                    </div>
                                    
                                </div>
                                <br>
                                  </form>
                                <div class="row text-right">
                                    <div class="col-md-12 ">
                                        <a href="{{ route('empresaExterna.index') }}" class="btn btn-default">{{__('Atrás')}}</a>
                                        @if(!Auth::user()->hasRole('operador'))
                                        <button  id="editar"  class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
                                        @endif
                                    </div>
                                </div>
                                <br>
                              
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Add New Message Fab Button-->
        
    </div>
    @endsection
    
@section('js')
<script src={{asset('assets/plugins/bootstrap-fileinput/js/fileinput.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/piexif.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/sortable.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/locales/es.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/themes/gly/theme.js')}}></script>
<script>
        comuna();
        comuna2();

        var namefile = $('#_url_imagen').val();
        var url = '../img/AccountLogos/' +namefile;
        
        $(".file").fileinput({
            allowedFileExtensions: ['jpg','jpge','png', 'gif'],
            initialPreview: [url],
            initialPreviewAsData: true,
            showCaption: false,
            showRemove: false,
            showUpload: false,
            showCancel: false,
            showBrowse: false,
            browseOnZoneClick: true,
            overwriteInitial: true
        });

        $('#file').on('fileclear', function(event) {
            var ruta = $('#_url_imagen').val("");
        });

        $('#file').change(function () {
                $('#_url_imagen').val($(this).val());
            });

        function actualizarEmpresa(id){ 

             var url = "{{ url('updateEmpresa') }}/"+id;
             var formdata = $('#accountForm').serialize();

             $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'get',
                    dataType: 'json',
                    url: url,
                    data: formdata,
                    success: function (data) {
               
                      location.reload();
                      toastr.success('Empresa editada correctamente!');
                    },
                    error: function (data){
                      toastr.error('Empresa  no fue editada!');
                      
                    },
                });
        }

        jQuery(document).ready(function(){

            
            jQuery('#editar').click(function(e){
               e.preventDefault();
               //$(this).html('Sending..');
               var id = $('#_id').val();
               console.log(id);
               var namefile = $('#_url_imagen').val();
               console.log(namefile);

                var form = document.forms.namedItem("form_add");
                var formdata = new FormData(form);

               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
          
                 dataType: 'json',
                 async: true,
                 method: 'post',
                 type: 'POST',
                 contentType: false,
                 url:"{{ url('updateEmpresa') }}/"+id,
                 data: formdata,
                 processData: false,
                 success: function(r){
                    
                     location.reload();
                     toastr.success('Edificio editado correctamente!');

                  },
                 error :function( data ) {
                    toastr.error('El edificio no fue editado!');
                    console.log('Error:', data);
                    if( data.status === 422 ) {
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors, function (key, value) {
                          
                       
                           
                        });
                      }}
                });
               });
              });

         $(document).ready(function() {
            $("#region_id").change(function(){
               
                var id = $("#region_id").val();
                
                if(id == ''){
                  id = 0;
                }else{
                  id = id;
                }
                  var url ="{{url('buscarComunas')}}/"+id;

                $.ajax({
                  type : 'get',
                  url  : url,
                  data : {'id':id},
                  success:function(data){
                    console.log(data);
                    $("#commune").find('option').remove();
                      var options = [];
                $.each(data, function(key, value) {
                    options.push($("<option/>", {
                        value: key,
                        text: value
                    }));
                });

              
                $('#commune').append(options);
                  }
                });
                
            }); 
      });


      function comuna(){
        var id = $('#_id').val();

        $('#table_comuna').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "ajax": {
                        url: "{{ url('empresaByComuna') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                         columns: [
                                 
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:12px;">'+row['commune']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=deleteComuna('+row['id_comuna']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

  function comuna2(){
        var id = $('#_id').val();

        $('#table_comuna2').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "ajax": {
                        url: "{{ url('empresaByComuna') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                         columns: [
                                 
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:12px;">'+row['commune']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

  function checkComuna(){
    var id = $('#_id').val();
    var url ="{{url('countComunaEmpresa')}}";
    var count = 0;
    $.ajax({
            type : 'get',
            url  : url,
            data : {id:id},
            success:function(data){
            console.log(data);
            count = data;
            
            let cant_permitidas = $('#cant_ciudades').val();
            var valor = 0;
            valor = cant_permitidas - data;
            $('#cant_ciudades_disponible').val(valor);


            }
    });

    return count;

  }



  function addComuna(){
   
    var ciudades = checkComuna();
    var cant_ciudades_disponibles =  $('#cant_ciudades_disponible').val();

    if(cant_ciudades_disponibles > 0){
      var id_comuna = $('#region_id').val();
      var id_empresa = $('#_id').val();
        var formData = {
                  "id_comuna" : id_comuna,
                  "id_empresa" : id_empresa
          }
         var url ="{{url('addComunaForEmpresa')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){

             toastr.success('Registro añadido correctamente!');

              $('#table_comuna').DataTable().clear().destroy();

              comuna();
              refrescarSelect(id_corredor);
              
            }
          });
    }else{
      toastr.error('No se puede añadir mas ciudades, comunicarse con el Soporte del Sistema');
    }

  }

   function refrescarSelect(id){

        var formData = {
                "id_empresa" : id
        }

         var url ="{{url('obtenerComunaEmpresa')}}";
   

          $.ajax({
            type : 'GET',
            url  : url,
            data : formData,
            success:function(data){
             
            $("#region_id").find('option').remove();
             var options = [];
             $.each(data, function(key, value) {
                        options.push($("<option/>", {
                        value: key,
                        text: value
                        }));
            });

              
            $('#region_id').append(options);
            }
          });
  }

   function deleteComuna(id2){
     var id = $('#_id').val();


        var formData = {
                "id_corredor" : id,
                "id_comuna" : id2
        }
         var url ="{{url('eliminaComunaCorredor')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro eliminado correctamente!');
         
              $('#table_comuna').DataTable().clear().destroy();

              comuna();
              refrescarSelect(id);
              
            }
          });
  }
</script>
@endsection

