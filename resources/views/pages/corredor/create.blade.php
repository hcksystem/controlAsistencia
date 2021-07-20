
@extends('layouts.app')

@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('administraciones.index')}}">{{ __('Corredor')}}</a></h1>
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
							<h6>{{ __('Información del Corredor') }} </h6>
						</div>
					</div>
					<div class="card-body">
						
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-home-tab">
								<form action="{{ route('corredor.store') }}" name="form_add" id="administracionForm" method="POST" role="form"enctype="multipart/form-data" autocomplete="off">

            					 {{ csrf_field() }}
								
								<div class="form-row">
									<div class="col-md-9">
										<div class="form-row">
											<div class="form-group col-6 m-0" id="name_group">
												{!! Form::label('name', __('Nombre*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('nombre', null, ['class'=>'form-control r-0 light s-12', 'id'=>'nombre']) !!}
												<span class="name_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="identification_group">
												{!! Form::label('tax_id', __('Teléfono'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::text('telefono', null, ['class'=>'form-control r-0 light s-12', 'id'=>'telefono']) !!}
												<span class="telefono_span"></span>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-6 m-0" id="contacto_group">
												<i class="icon-envelope-o mr-2"></i>
												{!! Form::label('identificacion', __('Identificación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('identificacion', null, ['class'=>'form-control r-0 light s-12', 'id'=>'identificacion']) !!}
												<span class="contacto_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="contacto_group">
												<i class="icon-envelope-o mr-2"></i>
												{!! Form::label('contacto', __('Contacto'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('contacto', null, ['class'=>'form-control r-0 light s-12', 'id'=>'contacto']) !!}
												<span class="contacto_span"></span>
											</div>
                      
											<div class="form-group col-6 m-0" id="region_group">
                                            <i class="icon-globe mr-2"></i>
                                            {!! Form::label('region', __('Región-Comuna'), ['class'=>'col-form-label  s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                            {!! Form::select('region_id',$comunas, $corredor->region_id ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'region_id']) !!}
                                            {!! Form::hidden('comunas', null, ['class'=>'form-control r-0 light s-12', 'id'=>'comunas']) !!}
                                            <span class="region_span"></span>
                                          </div>
                                           <div class="form-group col-6 mt-2" id="commune_group">
                                             <a class="btn btn-primary btn-sm mt-4" onclick="addComuna()" style="margin-top: 10px"><i class="icon icon-plus" style="font-size: 12px;padding: .10rem .4rem;"></i></a>
                                          </div>
											
                                          <div class="form-group col-12 mt-4" id="status_group">
                                                     <table id="table_comuna" class="table table-bordered table-hover table-sm" data-order='[[ 0, "desc" ]]' data-page-length='10' style="width: 100%">
                                                         <thead>
                                                                <tr>
                                                                    <th class="text-center"><b>{{ __('Región-Comuna') }}</b></th>
                                                                    <th class="text-center">Opción</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                     </table>
                                            </div>
                                         
											<div class="form-group col-12 m-0" id="address_group">
												{!! Form::label('address',__('Dirección'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::textarea('direccion', null, ['class'=>'form-control r-0 light s-12', 'id'=>'direccion', 'rows'=>2]) !!}
												<span class="address_span"></span>
											</div>
											<div class="form-group col-12 m-0" id="address_group">
                                                {!! Form::label('descripcion',__('Descripción'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
                                                {!! Form::textarea('descripcion', null, ['class'=>'form-control r-0 light s-12', 'id'=>'descripcion', 'rows'=>4]) !!}
                                                <span class="description_span"></span>
                                            </div>
											
										</div>
										
										
										{!! Form::hidden('route', route('corredor.store'), ['id'=>'route']) !!}
									</div>
									<div class="col-md-3">
										<div class="form-group">
											{!! Form::label('logo',__('Logo'), ['class'=>'col-form-label s-12']) !!}
											<input id="file" class="file" name="logo" type="file">
											<span class="file_span"></span>
										</div>
									</div>
                  <div class="form-group col-12 m-0" id="contacto_group">
											
                        @if(Auth::user()->hasRole('super') || Auth::user()->hasRole('admin'))
												{!! Form::label('cant_ciudades', __('Cantidad de Ciudades Permitidas'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('cant_ciudades', null, ['class'=>'form-control r-0 light s-12', 'id'=>'cant_ciudades','onkeypress'=>'return soloNumeros(event)']) !!}
                        @endif
												<span class="contacto_span"></span>
									</div>
									
									
								</div>
								<br>
								<div class="row text-right">
									<div class="col-md-12 ">
										<a href="{{ route('corredor.index') }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
										<button  id="editar" class="btn btn-primary"><i class="icon-save mr-2"></i>{{__('Guardar Datos')}}</button>
									</div>
								</div>
								<br>
								</form>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Add New Message Fab Button-->
		
	</div>
</div>

</form>
@endsection
	
@section('js')
<script src={{asset('assets/plugins/bootstrap-fileinput/js/fileinput.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/piexif.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/sortable.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/locales/es.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/themes/gly/theme.js')}}></script>
<script>
	var arr = [];

    function addComuna(){
    var id_comuna = $('#region_id').val();

    arr.push(id_comuna);

     var formData = {
                "comuna" : arr
            }    
    var url ="{{url('addComunaForNewCorredor')}}";
    $('#table_comuna').DataTable().clear().destroy();
    comuna(url,formData);
    refrescarSelect(formData);

   $('#comunas').val(arr);
  }


   function comuna(url,formData){

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
                        url: url,
                        type:'POST',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': formData
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
                                      return '<a onclick=deleteComuna('+row['id_comuna']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Eliminar"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

   function refrescarSelect(formData){

         var url ="{{url('obtenerComunaNewCorredor')}}";
   

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


function deleteComuna(id){
    	
    console.log(id);
	for(var i = arr.length; i--;) {
          if(arr[i] == id) {
              arr.splice(i, 1);
          }
    }

	console.log(arr);
	var formData = {
                "comuna" : arr
            }    
    var url ="{{url('addComunaForNewCorredor')}}";
    $('#table_comuna').DataTable().clear().destroy();
    comuna(url,formData);
    refrescarSelect(formData);
     
  }

  
  function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
  }

</script>
@endsection

