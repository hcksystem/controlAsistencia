

@extends('layouts.app')

@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('administraciones.index')}}">{{ __('Administraciones')}}</a> > {{ $admin->nombre ?? "" }}</h1>
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
                            <h6>{{ __('Información de la Administración') }} </h6>
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
                                                {!! Form::text('nombre', $admin->nombre ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'nombre']) !!}
                                                <span class="name_span"></span>
                                            </div>
                                            <div class="form-group col-6 m-0" id="identification_group">
                                                {!! Form::label('tax_id', __('Teléfono'), ['class'=>'col-form-label s-12']) !!}
                                                {!! Form::text('telefono', $admin->telefono ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'telefono']) !!}
                                                <span class="telefono_span"></span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            
                                            <div class="form-group col-6 m-0" id="contacto_group">
                                                <i class="icon-envelope-o mr-2"></i>
                                                {!! Form::label('contacto', __('Contacto'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                                {!! Form::text('contacto', $admin->contacto ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'contacto']) !!}
                                                <span class="contacto_span"></span>
                                            </div>
                                           
                                        </div>
                                    
                                        <div class="row">
                                            <div class="form-group col-6 m-0" id="region_group">
                                            <i class="icon-globe mr-2"></i>
                                            {!! Form::label('region', __('Región'), ['class'=>'col-form-label  s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                            {!! Form::select('region_id',$regions, $admin->region_id ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'region_id']) !!}
                                            <span class="region_span"></span>
                                          </div>
                                          <div class="form-group col-6 m-0" id="commune_group">
                                            <i class="icon-globe mr-2"></i>
                                            {!! Form::label('commune', __('Comuna'), ['class'=>'col-form-label  s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                            {!! Form::select('comuna_id',$communes, $admin->comuna_id ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'commune']) !!}
                                            <span class="region_span"></span>
                                          </div>
                                            <div class="form-group col-12 m-0" id="address_group">
                                                {!! Form::label('address',__('Dirección'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                                {!! Form::textarea('direccion', $admin->direccion ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'direccion', 'rows'=>2]) !!}
                                                <span class="address_span"></span>
                                            </div>
                                             <div class="form-group col-12 m-0" id="trayectoria_group">
                                                <i class="icon-web mr-2"></i>
                                                {!! Form::label('trayectoria', __('Presentación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                                {!! Form::textarea('presentacion', $admin->presentacion ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'presentacion','rows'=>'2']) !!}
                                                {!! Form::hidden('id', $admin->id ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'_id']) !!}
                                                <span class="trayectoria_span"></span>
                                            </div>
                                            
                                        </div>
                                        {!! Form::hidden('route', route('administraciones.store'), ['id'=>'route']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            {!! Form::label('logo',__('Logo'), ['class'=>'col-form-label s-12']) !!}
                                            <input id="file" class="file" name="url_imagen" type="file">
                                            {!! Form::hidden('ruta',$admin->url_imagen ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'_url_imagen']) !!}
                                            <span class="file_span"></span>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <br>
                                  </form>
                                <div class="row text-right">
                                    <div class="col-md-12 ">
                                        <a href="{{ route('administraciones.index') }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
                                        <button  id="editar"  class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
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

        function actualizarAdministracion(id){ 

             var url = "{{ url('updateAdministracion') }}/"+id;
             var formdata = $('#administracionForm').serialize();

             $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    type: 'get',
                    dataType: 'json',
                    url: url,
                    data: formdata,
                    success: function (data) {
               
                      location.reload();
                      toastr.success('Edificio editado correctamente!');
                    },
                    error: function (data){
                      toastr.error('El edificio no fue editado!');
                      
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
                 url:"{{ url('updateAdministracion') }}/"+id,
                 data: formdata,
                 processData: false,
                 success: function(r){
                    
                     $('#editar').html('Save Data');
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

</script>
@endsection

