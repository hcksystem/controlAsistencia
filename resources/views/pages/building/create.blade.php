@extends('layouts.app')
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
<style>
      #map {
      height: 300px; // for my situation
	  width: 100%;
	  position: relative;
	  z-index: 1;
      }
    </style>
@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('buildings.index')}}">{{ __('Edificios')}}</a></h1>
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
							<h6>{{ __('Información del Edificio') }} </h6>
						</div>
					</div>
					<div class="card-body">
						
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-home-tab">
								<form action="{{ route('buildings.store') }}" name="form_add" id="accountForm" method="POST" role="form"enctype="multipart/form-data" autocomplete="off">

            					 {{ csrf_field() }}
								
								<div class="form-row">
									<div class="col-md-8">
										<div class="form-row">
											<div class="form-group col-6 m-0" id="name_group">
												
												{!! Form::label('name', __('Nombre*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('name', $building->name ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'name']) !!}
												{!! Form::hidden('id', $building->id ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'_id']) !!}
												<span class="name_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="identification_group">
												{!! Form::label('construction', __('Año de Construcción'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::text('construction', $building->construction ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'construction']) !!}
												<span class="identification_span"></span>
											</div>
											<div class="form-group col-12 m-0" id="constructora_group">
												{!! Form::label('constructora', __('Constructora'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::text('constructora',null, ['class'=>'form-control r-0 light s-12', 'id'=>'constructora']) !!}
												<span class="constructora_span"></span>
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
												{!! Form::select('commune_id',$communes, $building->commune ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'commune']) !!}
												<span class="region_span"></span>
											</div>
									
											<div class="form-group col-6 m-0" id="latitude_group" >
												{!! Form::label('latitude',__('Latitud'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('latitude', $building->latitude ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'latitude']) !!}
												<span class="latitude_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="longitude_group" >
												{!! Form::label('longitude',__('Longitud'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('longitude', $building->longitude ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'longitude']) !!}
												<span class="longitude_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="administracion_id_group" >
												{!! Form::label('administracion',__('Administración'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::select('administracion_id',$admin, $building->administracion_id ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'administracion_id']) !!}
												<span class="administracion_id_span"></span>
											</div>
								
											<div class="form-group col-6 m-0" id="telefono_group">
												{!! Form::label('phone', __('Teléfono'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('telefono', $building->telefono ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'address','rows'=>'3']) !!}
												<span class="telefono_span"></span>
											</div>
											
											<div class="form-group col-12 m-0" id="address_group">
												{!! Form::label('address', __('Dirección'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::textarea('address', $building->address ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'address','rows'=>'3']) !!}
												<span class="address_span"></span>
											</div>
											
											
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											{!! Form::label('mapa', __('Mapa'), ['class'=>'col-form-label s-12']) !!}
											<div id="map" class="form-control r-0 light s-12"></div>
										</div>
									</div>
									<div class="col-md-8"></div>
									<div class="col-md-4">
										<a href="https://www.coordenadas-gps.com/" class="btn btn-primary col-12" style="margin-top:-50px;"  target="_blank">Ubica tus coordenadas</a>
									</div>
									<div class="col-12 mt-2">
										<hr/>
										<div class="fom-row form-group">
											<div class="form-row">
												<div class="col-md-12"><p><b>Información de la Administración</b></p></div>
												<div class="col-md-3">
													{!! Form::label('nombre',__('Nombre'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::text('admin_nombre',null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_nombre','readonly']) !!}
												</div>
												<div class="col-md-3">
													{!! Form::label('admin_contacto',__('Contacto'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::text('admin_contacto',null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_contacto','readonly']) !!}
												</div>
												<div class="col-md-3">
													{!! Form::label('admin_region',__('Región'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::select('admin_region',$regions,null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_region_id','disabled']) !!}
												</div>
												<div class="col-md-3">
													{!! Form::label('admin_comuna',__('Comuna'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::select('admin_comuna',$communes, null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_comuna_id','disabled']) !!}
												</div>
												<div class="col-md-6">
													{!! Form::label('admin_direccion',__('Dirección'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::textarea('admin_region',null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_direccion','disabled','rows'=>'2']) !!}
												</div>
												<div class="col-md-6">
													{!! Form::label('admin_presentacion',__('Presentación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::textarea('admin_presentacion',null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_presentacion','disabled','rows'=>'2']) !!}
												</div>
											</div>
											
										</div>
									</div>
									<div class="col-md-12"><p><b>Especificaciones Técnicas</b></p></div>	
									<div class="col-md-6 mt-2">
										<div class="form-row">
											
									<table class="table ">
						              
						              <tbody>
						                
						                <tr>
						                	<td>{!! Form::label('cantidad_dptos',__('Cantidad de Departamentos'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
						                  	<td>{!! Form::text('cantidad_dptos', $building->cantidad_dptos ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'cantidad_dptos']) !!}</td>
						                </tr>
						               <tr>
						                	<td>{!! Form::label('cantidad_pisos',__('Cantidad de Pisos'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::text('cantidad_pisos', $building->cantidad_pisos ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'cantidad_pisos']) !!}</td>	
						                </tr>
						                <tr>
						                	<td>{!! Form::label('cantidad_est',__('Estacionamientos'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::text('cantidad_est', $building->cantidad_est ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'cantidad_est']) !!}</td>	
						                </tr>
						                <tr>
						                	<td>{!! Form::label('cantidad_est_visitas',__('Estacionamientos de Visitas'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::text('cantidad_est_visitas', $building->cantidad_est_visitas ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'cantidad_est_visitas']) !!}</td>	
						                </tr>
						                <tr>
								            <td>{!! Form::label('revestimiento',__('Revestimiento de Murallas'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('revestimiento', $revestimiento, $building->revestimiento ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"revestimiento" ]) !!}</td>	
								         </tr>
						              	 <tr>
								            <td>{!! Form::label('cubierta_cocina',__('Cubierta de Cocina'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('cubierta_cocina', $cubierta_cocina, $building->cubierta_cocina ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"cubierta_cocina" ]) !!}</td>	
								         </tr>	
								       
						              	 <tr>
								            <td>{!! Form::label('ventanas',__('Ventanas'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('ventanas', $ventanas, $building->ventanas ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"ventanas" ]) !!}</td>	
								         </tr>	
								         <tr>
								            <td>{!! Form::label('lavaplatos',__('Lavaplatos'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('lavaplatos', $lavaplatos, $building->lavaplatos ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"lavaplatos" ]) !!}</td>	
								         </tr>	
								         <tr>
								            <td>{!! Form::label('alarma',__('Alarma'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('alarma', $alarma, $building->alarma ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"alarma" ]) !!}</td>	
								         </tr>	
						              
						               
						             		 </tbody>
					            		</table>
											
											
										</div>
									</div>
								
									<div class="col-md-6 mt-2">
										<div class="form-row">
											
									<table class="table ">
						              
						              <tbody>
						                
						              
						                <tr>
						                	<td>{!! Form::label('cantidad_sub',__('Cantidad de Subterráneos'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>
												{!! Form::text('cantidad_sub', $building->cantidad_sub ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'cantidad_sub']) !!}</td>	
						                </tr>
						               <tr>
						                	<td>{!! Form::label('gastos_comunes_m2',__('Gastos Comunes'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::text('gastos_comunes_m2', $building->gastos_comunes_m2 ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'gastos_comunes_m2']) !!}</td>	
						                </tr>
						                <tr>
						                	<td>{!! Form::label('tipo_piso',__('Tipo de Piso'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('Tipo_piso', $tipo_piso, $building->Tipo_piso ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"data1" ]) !!}</td>	
						                </tr>
						                <tr>
						                	<td>{!! Form::label('tipo_piso',__('Admiten Mascotas'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!} </td>
											<td><div class="" id="admiten_mascotas_group">
												
													<div class="material-switch ">
										                <input id="_admiten_mascotas" name="admiten_mascotas" type="checkbox" value="1" @if(isset($building))&& @if($building->admiten_mascotas == 1){{'checked'}}@endif @endif/>
										                <label for="_admiten_mascotas" class="bg-secondary"></label>
														&nbsp;
										            </div>
												</div></td>	
						                	</tr>
						                 <tr>
								            <td>{!! Form::label('cocina',__('Cocina'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('cocina', $cocina, $building->cocina ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"cocina" ]) !!}</td>	
								         </tr>
						              	 <tr>
								            <td>{!! Form::label('agua_caliente',__('Agua Caliente'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('agua_caliente', $agua_caliente, $building->agua_caliente ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"agua_caliente" ]) !!}</td>	
								         </tr>	
								         <tr>
								            <td>{!! Form::label('cubierta_vanitorio',__('Cubierta de Vanitorio'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('cubierta_vanitorio', $cubierta_vanitorio, $building->cubierta_vanitorio ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"cubierta_vanitorio" ]) !!}</td>	
								         </tr>
						              	 <tr>
								            <td>{!! Form::label('calefaccion',__('Calefacción'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::select('calefaccion', $calefaccion, $building->calefaccion ?? '', ["class"=>"form-control r-0 light select2 s-12","id"=>"calefaccion" ]) !!}</td>	
								         </tr>	
								         
						               
						             		 </tbody>
					            		</table>
											
											
										</div>
									</div>
									
								</div>
								<br>
								<div class="row text-right">
									<div class="col-md-12 ">
										<a href="{{ route('buildings.index') }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
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

	<script>
		var longitude =$("#longitude").val();
		var latitude =$("#latitude").val();

		if(longitude == ''){
			longitude =='-70.6366234';
		}
		if(latitude == ''){
			latitude =='-33.4369285';
		}

		mapboxgl.accessToken = 'pk.eyJ1IjoiYWRteWNvbSIsImEiOiJja3A0MDZtdWcxeDZ2Mm9td3VuczgxcXJwIn0.ypRbWqXZ38CV8EZhxfuLOQ';
		var map = new mapboxgl.Map({
		  container: 'map',
		  style: 'mapbox://styles/mapbox/streets-v10',
		  center: [longitude,latitude], // starting position
		  zoom: 12
		});
		// set the bounds of the map
		var bounds = [[-70.5729961,-33.6348808], [-70.6504502,-33.4377756]];
		map.setMaxBounds(bounds);

		// initialize the map canvas to interact with later
		var canvas = map.getCanvasContainer();

		// an arbitrary start will always be the same
		// only the end or destination will change
		var start = [longitude,latitude];
		
		
		//-33.4369285,-70.6366234
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

		$('#administracion_id').on('change',function(){
    			var id = this.value;
				var url ="{{url('getDetailsAdmin')}}/"+id;
			    $.ajax({
			            url: url,
			            method  : 'GET',
			            success : function(data){
			            	console.log(data);
			            	$('#result_admin_nombre').val(data.nombre);
			            	$('#result_admin_contacto').val(data.contacto);
			            	$('#result_admin_region_id').val(data.region_id);
			            	$('#result_admin_comuna_id').val(data.comuna_id);
			            	$('#result_admin_direccion').val(data.direccion);
			            	$('#result_admin_presentacion').val(data.presentacion);
			            }
			    });
    	})

	</script>
	@endsection