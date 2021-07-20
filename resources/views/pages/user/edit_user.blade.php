@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"><a  href="{{ route('user.index') }}" role="tab" aria-controls="v-pills-all" id="users"><i class="icon icon-home2"></i>{{ __('Usuarios') }}</a> > {{ $user->fullname ?? '' }}</h1>
@endsection

@section('maincontent')

<div class="page  height-full">
    {{-- alerts --}}
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
                                <h6> {{ __('EDITAR USUARIO') }} </h6>
                            </div>
                          
                        </div> 
                    </div>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-home-tab">
                                
                                <div class="form-row">
                                  
                                    <div class="modal-body">
                                      <nav>
                                          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                              <a class="nav-item nav-link active" id="nav-tdetails-1-tab" data-toggle="tab" href="#nav-tdetails-1" role="tab" aria-controls="nav-tdetails-1" aria-selected="true" style="padding-right:1px;padding-left: 2px;font-size: 15px;">Información</a>

                                              <a class="nav-item nav-link" id="nav-tdetails-2-tab" data-toggle="tab" href="#nav-tdetails-2" role="tab" aria-controls="nav-tdetails-2" aria-selected="false" style="padding-right:1px;padding-left: 2px;font-size: 15px;">Accesos</a>
                                                                              
                                                                               
                                         </div>
                                    </nav>  
                                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-tdetails-1" role="tabpanel" aria-labelledby="nav-tdetails-1-tab">
                                        <form action="{{ route('usuario.update',$user->id) }}" method="GET" autocomplete="off">

                                
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-row">
                                                        <div class="form-group m-0 col-6 has-feedback" id="fullname_group">
                                                        <i class="icon-person mr-2"></i>
                                                        {!! Form::label('name', 'Nombre Completo', ['class'=>'col-form-label s-12']) !!}
                                                        {!! Form::text('fullname', $user->fullname ?? '', ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Enter User Name', 'id'=>'_fullname', 'onclick'=>'inputClear(this.id)']) !!}
                                                         {!! Form::hidden('id', $user->id ?? '', ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Enter User Name', 'id'=>'_id', 'onclick'=>'inputClear(this.id)']) !!}
                                                         
                                                        <span class="fullname_span"></span>
                                                    </div>
                                                    <div class="form-group m-0 col-6 has-feedback" id="fullname_group"> 
                                                        <i class="icon-envelope-o mr-2"></i>
                                                            {!! Form::label('email', 'Correo', ['class'=>'col-form-label s-12']) !!}
                                                            {!! Form::email('email', $user->email ?? '', ['class'=>'form-control r-0 light s-12 ', 'placeholder'=>'user@email.com', 'id'=>'_email', 'onclick'=>'inputClear(this.id)']) !!}
                                                         
                                                        <span class="fullname_span"></span>
                                                    </div>   
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-6 m-0" id="password_group">
                                                            <i class="icon-key3 mr-2"></i>
                                                            {!! Form::label('password', 'Contraseña', ['class'=>'col-form-label s-12','placeholder'=>'Password', 'onclick'=>'inputClear(this.id)']) !!}
                                                            {!! Form::password('password', ['class'=>'form-control r-0 light s-12','id'=>'password', 'onclick'=>'inputClear(this.id)']) !!}
                                                            <span class="password_span"></span>
                                                        </div>
                                                        <div class="form-group col-6 m-0">
                                                            <i class="icon-key4 mr-2"></i>
                                                            {!! Form::label('passwordConfirm', 'Confirma Contraseña', ['class'=>'col-form-label s-12','placeholder'=>'Password Confirm']) !!}
                                                            {!! Form::password('password_confirmation', ['class'=>'form-control r-0 light s-12', 'id'=>'password_confirmation', 'onclick'=>'inputClear(this.id)']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-6 m-0" id="_rol_group">
                                                            {!! Form::label('role', 'Perfil', ['class'=>'col-form-label s-12']) !!}
                                                            {!! Form::select('rol', $roles, $user->rol_user->rol->slug ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'_rol', 'onclick'=>'inputClear(this.id)']) !!}
                                                            <span class="_rol_span"></span>
                                                        </div>
                                                        <div class="form-group col-6 m-0" id="status_group">
                                                            {!! Form::label('status', 'Estado', ['class'=>'col-form-label s-12']) !!}
                                                            {!! Form::select('status', $status, $user->status ?? '', ['class'=>'form-control r-0 light s-12', 'placeholder'=>'Select', 'id'=>'_status', 'onclick'=>'inputClear(this.id)']) !!}
                                                            <span class="status_span"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="col-md-12">
                                                    <div class="form-row mt-1">
                                                       
                                                        <div class="form-group col-6 m-0">
                                                            <i class="icon-phone mr-2"></i>
                                                            {!! Form::label('phone1', 'Teléfono 1', ['class'=>'col-form-label s-12']) !!}
                                                            {!! Form::text('phone1', $user->phone1 ?? '', ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678', 'id'=>'_phone1', 'onclick'=>'inputClear(this.id)']) !!}
                                                        </div>
                                                       
                                                        <div class="form-group col-6 m-0" id="div_dias">
                                                            {!! Form::label('phone2', 'Días Activos', ['class'=>'col-form-label s-12']) !!}
                                                            {!! Form::number('phone2', $user->phone2 ?? '', ['class'=>'form-control r-0 light s-12', 'placeholder'=>'05112345678', 'id'=>'_phone2','min'=>'0','onkeypress'=>'return soloNumeros(event)' ]) !!}
                                                        </div>
                                                      
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                             <div class="row text-right">
                                                <div class="col-md-12 mt-4">
                                                    <a href="{{ route('user.index') }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
                                                    <button  type="submit" id="editar" class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
                                                </div>
                                            </div>

                                            </form>
                                        </div>
                                        <div class="tab-pane fade show" id="nav-tdetails-2" role="tabpanel" aria-labelledby="nav-tdetails-2-tab">
                                            <div class="form-row">

                                                 <div class="form-inline col-8 m-0" id="status_group">
                                                    <div class="col-4">
                                                         {!! Form::label('edificios', 'Edificios', ['class'=>'col-form-label s-12']) !!}
                                                            {!! Form::select('id_edificio', $building, null, ['class'=>'form-control r-0 light s-12 select2', 'placeholder'=>'Seleccione', 'id'=>'id_edificio', 'onclick'=>'inputClear(this.id)']) !!}
                                                            <span class="status_span"></span>
                                                    </div>
                                                     <div class="col-2">
                                                         {!! Form::label('', '', ['class'=>'col-form-label s-12']) !!}
                                                          <a class="btn btn-primary btn-sm mt-3" onclick="addEdificio()"><i class="icon icon-plus" style="font-size: 12px;padding: .10rem .4rem;"></i></a>
                                                            <span class="status_span"></span>
                                                     </div>      
                                                 </div>
                                                  <div class="form-group col-12 mt-4" id="status_group">
                                                     <table id="table_edificio" class="table table-bordered table-hover table-sm" data-order='[[ 0, "desc" ]]' data-page-length='10' style="width: 100%">
                                                         <thead>
                                                                <tr>
                                                                    <th class="text-center"><b>{{ __('Edificio') }}</b></th>
                                                                    <th>Opción</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                     </table>
                                                 </div>
                                             </div> 
                                             <div class="form-row">

                                                 <div class="form-inline col-8 m-0" id="status_group">
                                                    <div class="col-4">
                                                         {!! Form::label('edificios', 'Empresas Externas', ['class'=>'col-form-label s-12']) !!}
                                                            {!! Form::select('id_empresa', $empresas, null, ['class'=>'form-control r-0 light s-12 select2', 'placeholder'=>'Seleccione', 'id'=>'id_empresa', 'onclick'=>'inputClear(this.id)']) !!}
                                                            <span class="status_span"></span>
                                                    </div>
                                                     <div class="col-2">
                                                         {!! Form::label('', '', ['class'=>'col-form-label s-12']) !!}
                                                          <a class="btn btn-primary btn-sm mt-3" onclick="addEmpresa()"><i class="icon icon-plus" style="font-size: 12px;padding: .10rem .4rem;"></i></a>
                                                            <span class="status_span"></span>
                                                     </div>      
                                                 </div>
                                                  <div class="form-group col-12 mt-4" id="status_group">
                                                     <table id="table_empresa" class="table table-bordered table-hover table-sm" data-order='[[ 0, "desc" ]]' data-page-length='10' style="width: 100%">
                                                         <thead>
                                                                <tr>
                                                                    <th class="text-center"><b>{{ __('Empresa') }}</b></th>
                                                                    <th>Opción</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                     </table>
                                                 </div>
                                             </div> 
                                              <div class="form-row">

                                                 <div class="form-inline col-8 m-0" id="status_group">
                                                    <div class="col-4">
                                                         {!! Form::label('administraciones', 'Administraciones', ['class'=>'col-form-label s-12']) !!}
                                                            {!! Form::select('id_administracion', $administraciones, null, ['class'=>'form-control r-0 light s-12 select2', 'placeholder'=>'Seleccione', 'id'=>'id_administracion', 'onclick'=>'inputClear(this.id)']) !!}
                                                            <span class="status_span"></span>
                                                    </div>
                                                     <div class="col-2">
                                                         {!! Form::label('', '', ['class'=>'col-form-label s-12']) !!}
                                                          <a class="btn btn-primary btn-sm mt-3" onclick="addAdministracion()"><i class="icon icon-plus" style="font-size: 12px;padding: .10rem .4rem;"></i></a>
                                                            <span class="status_span"></span>
                                                     </div>      
                                                 </div>
                                                  <div class="form-group col-12 mt-4" id="status_group">
                                                     <table id="table_administracion" class="table table-bordered table-hover table-sm" data-order='[[ 0, "desc" ]]' data-page-length='10' style="width: 100%">
                                                         <thead>
                                                                <tr>
                                                                    <th class="text-center"><b>{{ __('Administración') }}</b></th>
                                                                    <th>Opción</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                     </table>
                                                 </div>
                                             </div>
                                             <div class="form-row">

                                                 <div class="form-inline col-8 m-0" id="status_group">
                                                    <div class="col-4">
                                                         {!! Form::label('corredores', 'Corredores', ['class'=>'col-form-label s-12']) !!}
                                                            {!! Form::select('id_corredor', $corredores, null, ['class'=>'form-control r-0 light s-12 select2', 'placeholder'=>'Seleccione', 'id'=>'id_corredor', 'onclick'=>'inputClear(this.id)']) !!}
                                                            <span class="status_span"></span>
                                                    </div>
                                                     <div class="col-2">
                                                         {!! Form::label('', '', ['class'=>'col-form-label s-12']) !!}
                                                          <a class="btn btn-primary btn-sm mt-3" onclick="addCorredor()"><i class="icon icon-plus" style="font-size: 12px;padding: .10rem .4rem;"></i></a>
                                                            <span class="status_span"></span>
                                                     </div>      
                                                 </div>
                                                  <div class="form-group col-12 mt-4" id="status_group">
                                                     <table id="table_corredor" class="table table-bordered table-hover table-sm" data-order='[[ 0, "desc" ]]' data-page-length='10' style="width: 100%">
                                                         <thead>
                                                                <tr>
                                                                    <th class="text-center"><b>{{ __('Corredor') }}</b></th>
                                                                    <th>Opción</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                     </table>
                                                 </div>
                                             </div>  
                                        </div> 
                                    </div>
                                   
                                </div>
                                            
                                 </div>
                                           
                                        
                                <br>
                               
                        </div>  




                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src={{asset('assets/plugins/bootstrap-fileinput/js/fileinput.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/piexif.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/sortable.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/locales/es.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/themes/gly/theme.js')}}></script>
<script>
    var title = 'Users';
    var colunms = [0,1,2,3,4];

    edificios();
    empresas();
    administraciones();
    corredores();

    $(".file").fileinput({
        // theme: 'gly',
        // uploadUrl: '#',
        showCaption: false,
        showRemove: false,
        showUpload: false,
        showBrowse: false,
        browseOnZoneClick: true,
    });

    dataTableExport(title,colunms);

    $(document).ready(function() {
        $('#users').addClass('active');

        $("#password_confirmation").on("change", function( event ) {
         var password = $("#password").val();
         var confirmation = $("#password_confirmation").val();
         console.log(password +"-"+confirmation);
         if( password != confirmation){
            toastr.error('No coinciden con la contraseña ingresada');
            $("#editar").attr('disabled',true);
         }else{
            $("#editar").attr('disabled',false);
         }
        });

        $('#status').on('change',function(e){
          let select = this.value;

          if(select == 4){
            $('#div_dias').show();
          }else{
            $('#div_dias').hide();
          }
	    });

    });




  function edificios(){


        var id = $('#_id').val();

        $('#table_edificio').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "ajax": {
                        url: "{{ url('edificioByUser') }}/"+id,
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
                                      return '<div><p style="font-size:12px;">'+row['edificio']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=deleteEdificio('+row['id_edificio']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

  function addEdificio(){
     var id = $('#_id').val();
     var id2 = $('#id_edificio').val();
     //alert(id2);
     //
        var formData = {
                "id_usuario" : id,
                "id_edificio" : id2
        }
         var url ="{{url('agregaEdificioUser')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro añadido correctamente!');
         
              $('#table_edificio').DataTable().clear().destroy();

              edificios();
              refrescarSelect(id);
              
            }
          });
  }

  function deleteEdificio(id2){
     var id = $('#_id').val();


        var formData = {
                "id_usuario" : id,
                "id_edificio" : id2
        }
         var url ="{{url('eliminaEdificioUser')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro eliminado correctamente!');
         
              $('#table_edificio').DataTable().clear().destroy();
              edificios();
              refrescarSelect(id);
              
            }
          });
  }

    function refrescarSelect(id){

        var formData = {
                "id_usuario" : id
        }

         var url ="{{url('obtenerEdificioUser')}}";
   

          $.ajax({
            type : 'GET',
            url  : url,
            data : formData,
            success:function(data){
             
            $("#id_edificio").find('option').remove();
             var options = [];
             $.each(data, function(key, value) {
                        options.push($("<option/>", {
                        value: key,
                        text: value
                        }));
            });

              
            $('#id_edificio').append(options);
            }
          });
  }

   function addEmpresa(){
     var id = $('#_id').val();
     var id2 = $('#id_empresa').val();

        var formData = {
                "id_usuario" : id,
                "id_empresa" : id2
        }
         var url ="{{url('agregaEmpresaUser')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro añadido correctamente!');
         
              $('#table_empresa').DataTable().clear().destroy();

              empresas();
              refrescarSelect2(id);
              
            }
          });
  }

   function empresas(){


        var id = $('#_id').val();

        $('#table_empresa').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "ajax": {
                        url: "{{ url('empresaByUser') }}/"+id,
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
                                      return '<div><p style="font-size:12px;">'+row['empresa']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=deleteEmpresa('+row['id_empresa']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

     function refrescarSelect2(id){

        var formData = {
                "id_empresa" : id
        }

         var url ="{{url('obtenerEmpresaUser')}}";
   

          $.ajax({
            type : 'GET',
            url  : url,
            data : formData,
            success:function(data){
             
            $("#id_empresa").find('option').remove();
             var options = [];
             $.each(data, function(key, value) {
                        options.push($("<option/>", {
                        value: key,
                        text: value
                        }));
            });

              
            $('#id_empresa').append(options);
            }
          });
  }

    function deleteEmpresa(id2){
     var id = $('#_id').val();


        var formData = {
                "id_usuario" : id,
                "id_empresa" : id2
        }
         var url ="{{url('eliminaEmpresaUser')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro eliminado correctamente!');
         
              $('#table_empresa').DataTable().clear().destroy();
              empresas();
              refrescarSelect2(id);
              
            }
          });
  }

   function addAdministracion(){
     var id = $('#_id').val();
     var id2 = $('#id_administracion').val();

        var formData = {
                "id_usuario" : id,
                "id_administracion" : id2
        }
         var url ="{{url('agregaAdministracionUser')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro añadido correctamente!');
         
              $('#table_administracion').DataTable().clear().destroy();

              administraciones();
              refrescarSelect3(id);
              
            }
          });
  }

  function administraciones(){


        var id = $('#_id').val();

        $('#table_administracion').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "ajax": {
                        url: "{{ url('administracionByUser') }}/"+id,
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
                                      return '<div><p style="font-size:12px;">'+row['administracion']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=deleteAdministracion('+row['id_administracion']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

   function refrescarSelect3(id){

        var formData = {
                "id_administracion" : id
        }

         var url ="{{url('obtenerAdministracionUser')}}";
   

          $.ajax({
            type : 'GET',
            url  : url,
            data : formData,
            success:function(data){
             
            $("#id_administracion").find('option').remove();
             var options = [];
             $.each(data, function(key, value) {
                        options.push($("<option/>", {
                        value: key,
                        text: value
                        }));
            });

              
            $('#id_administracion').append(options);
            }
          });
  }

    function deleteAdministracion(id2){
     var id = $('#_id').val();


        var formData = {
                "id_usuario" : id,
                "id_administracion" : id2
        }
         var url ="{{url('eliminaAdministracionUser')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro eliminado correctamente!');
         
              $('#table_administracion').DataTable().clear().destroy();
              administraciones();
              refrescarSelect3(id);
              
            }
          });
  }

  function corredores(){


        var id = $('#_id').val();

        $('#table_corredor').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "ajax": {
                        url: "{{ url('corredorByUser') }}/"+id,
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
                                      return '<div><p style="font-size:12px;">'+row['corredor']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=deleteCorredor('+row['id_corredor']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

    function addCorredor(){
     var id = $('#_id').val();
     var id2 = $('#id_corredor').val();
     //alert(id2);
     //
        var formData = {
                "id_usuario" : id,
                "id_corredor" : id2
        }
         var url ="{{url('agregaCorredorUser')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro añadido correctamente!');
         
              $('#table_corredor').DataTable().clear().destroy();

              corredores();
              refrescarSelectCorredor(id2);
              
            }
          });
  }

     function refrescarSelectCorredor(id){

        var formData = {
                "id_corredor" : id
        }

         var url ="{{url('obtenerCorredorUser')}}";
   

          $.ajax({
            type : 'GET',
            url  : url,
            data : formData,
            success:function(data){
             
            $("#id_corredor").find('option').remove();
             var options = [];
             $.each(data, function(key, value) {
                        options.push($("<option/>", {
                        value: key,
                        text: value
                        }));
            });

              
            $('#id_corredor').append(options);
            }
          });
  }

   function deleteCorredor(id2){
     var id = $('#_id').val();


        var formData = {
                "id_usuario" : id,
                "id_corredor" : id2
        }
         var url ="{{url('eliminaCorredorUser')}}";
   

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro eliminado correctamente!');
         
              $('#table_corredor').DataTable().clear().destroy();
              corredores();
              refrescarSelectCorredor(id2);
              
            }
          });
  }

  function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
  }

</script>
@endsection