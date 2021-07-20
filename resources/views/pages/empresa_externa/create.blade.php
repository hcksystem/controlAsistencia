
@extends('layouts.app')

@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('empresaExterna.index')}}">{{ __('Empresas Externas')}}</a></h1>
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
							<h6>{{ __('Información de la Empresa Externa') }} </h6>
						</div>
					</div>
					<div class="card-body">
						
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-home-tab">
								<form action="{{ route('empresaExterna.store') }}" name="form_add" id="administracionForm" method="POST" role="form"enctype="multipart/form-data" autocomplete="off">

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
												{!! Form::label('region', __('Región'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::select('region_id',$regions, $building->region_id ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'region_id']) !!}
												<span class="region_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="commune_group">
												<i class="icon-globe mr-2"></i>
												{!! Form::label('commune', __('Comuna'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::select('comuna_id',$communes, $building->commune ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'commune']) !!}
												<span class="region_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="trayectoria_group">
												<i class="icon-web mr-2"></i>
												{!! Form::label('trayectoria', __('Trayectoria'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('trayectoria', null, ['class'=>'form-control r-0 light s-12', 'id'=>'trayectoria']) !!}
												<span class="trayectoria_span"></span>
											</div>
											 <div class="col-6 m-0 from-group">
						                          <i class="icon-cogs mr-2"></i>
						                          {!! Form::label('categoria', 'Categorías', ['class'=>'col-form-label s-12']) !!}
						                          {!! Form::select('categoria[]', $categoria, null, ['class'=>'form-control r-0 light s-12 select2', 'id'=>'categoria','multiple'=>'multiple']) !!}
						                          <span class="documentType_span"></span>
                      						</div>
											<div class="form-group col-12 m-0" id="address_group">
												{!! Form::label('address',__('Dirección'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::textarea('direccion', null, ['class'=>'form-control r-0 light s-12', 'id'=>'direccion', 'rows'=>2]) !!}
												<span class="address_span"></span>
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
										
										
										{!! Form::hidden('route', route('empresaExterna.store'), ['id'=>'route']) !!}
									</div>
									<div class="col-md-3">
										<div class="form-group">
											{!! Form::label('logo',__('Logo'), ['class'=>'col-form-label s-12']) !!}
											<input id="file" class="file" name="logo" type="file">
											<span class="file_span"></span>
										</div>
									</div>
									
									
								</div>
								<br>
								<div class="row text-right">
									<div class="col-md-12 ">
										<a href="{{ route('empresaExterna.index') }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
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
	@endsection
	
@section('js')
<script src={{asset('assets/plugins/bootstrap-fileinput/js/fileinput.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/piexif.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/plugins/sortable.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/js/locales/es.js')}}></script>
<script src={{asset('assets/plugins/bootstrap-fileinput/themes/gly/theme.js')}}></script>
<script>

    $(".file").fileinput({
        allowedFileExtensions: ['jpg','jpge','png', 'gif'],
        showCaption: false,
        showRemove: false,
        showUpload: false,
        showBrowse: false,
        browseOnZoneClick: true,
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
</div>


</form>
