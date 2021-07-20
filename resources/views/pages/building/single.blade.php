@extends('layouts.app')
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" href=  {{asset('assets/css/jquery.dataTables.css')}}>
<style>
      #map {
     height: 300px; // for my situation
	  width: 100%;
	  position: relative;
	  z-index: 1;
      }
</style>
@section('title')
	@include('pages.building.partials.title')
@endsection
@section('top-menu')
    {{-- header --}}
    @include('pages.building.headbar')
    {{-- end header --}}
@endsection

@section('maincontent')

@include('pages.building.tipologia.create')
@include('pages.building.tipologia.edit')
{{-- modal create --}}
@include('pages.building.create_calificacion')
@include('pages.building.create_contacto')
@include('pages.building.create_gasto')
@include('pages.building.create_gasto_comun')
@include('pages.building.create_gasto_comun_dia')
@include('pages.building.create_frecuencia_recambio')
{{-- modal edit --}}
@include('pages.building.edit_calificacion')
@include('pages.building.edit_contacto')
@include('pages.building.edit_gasto')
@include('pages.building.edit_gasto_comun')
@include('pages.building.edit_gasto_comun_dia')
@include('pages.building.edit_frecuencia_recambio')
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
								<form id="form_edificio" autocomplete="off">
								{!! Form::model($building,['route'=>["buildings.update",$building->id],'method'=>'PUT','autocomplete'=>'off']) !!}

            					 {{ csrf_field() }}
								
								<div class="form-row">
									<div class="col-md-8">
										<div class="form-row">
											<div class="form-group col-6 m-0" id="name_group">
												{{-- <i class="icon icon-face mr-2"></i> --}}
												{!! Form::label('name', __('Nombre*'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('name', $building->name ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'name','readonly']) !!}
												{!! Form::hidden('id', $building->id ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'_id']) !!}
												<span class="name_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="identification_group">
												{!! Form::label('construction', __('Año de Construcción'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::text('construction', $building->construction ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'construction','readonly']) !!}
												<span class="identification_span"></span>
											</div>
											<div class="form-group col-12 m-0" id="constructora_group">
												{!! Form::label('constructora', __('Constructora'), ['class'=>'col-form-label s-12']) !!}
												{!! Form::text('constructora', $building->constructora ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'constructora','readonly']) !!}
												<span class="constructora_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="region_group">
												<i class="icon-globe mr-2"></i>
												{!! Form::label('region', __('Región'), ['class'=>'col-form-label  s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::select('region_id',$regions, $building->region_id ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'region_id','disabled']) !!}
												<span class="region_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="commune_group">
												<i class="icon-globe mr-2"></i>
												{!! Form::label('commune', __('Comuna'), ['class'=>'col-form-label  s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::select('commune_id',$communes, $building->commune_id ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'commune','disabled']) !!}
												<span class="region_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="latitude_group" >
												{!! Form::label('latitude',__('Latitud'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('latitude', $building->latitude ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'latitude','disabled']) !!}
												<span class="latitude_span"></span>
											</div>
											<div class="form-group col-6 m-0" id="longitude_group" >
												{!! Form::label('longitude',__('Longitud'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('longitude', $building->longitude ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'longitude','disabled']) !!}
												<span class="longitude_span"></span>
											</div>
										
											<div class="form-group col-6 m-0" id="telefono_group">
												{!! Form::label('phone', __('Teléfono'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::text('telefono', $building->telefono ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'phone','disabled']) !!}
												<span class="telefono_span"></span>
											</div>
								
											<div class="form-group col-12 m-0" id="address_group">
												{!! Form::label('address', __('Dirección'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::textarea('address', $building->address ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'address','rows'=>'3','disabled']) !!}
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
										
									</div>
									</form>

									<div class="col-12 mt-2">
										<hr/>
										<div class="fom-row form-group">
											<div class="form-row">
												<div class="col-md-12"><p><b>Información de la Administración</b></p></div>
												<div class="form-group col-6 m-0" id="administracion_id_group" >
												{!! Form::label('administracion',__('Administración'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
												{!! Form::select('administracion_id',$admin, $building->administracion_id ?? '', ['class'=>'form-control r-0 light select2 s-12', 'id'=>'administracion_id','readonly']) !!}
												<span class="administracion_id_span"></span>
												</div>
												<div class="col-6"></div>
												<div class="col-md-3">
													{!! Form::label('nombre',__('Nombre'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::text('admin_nombre',$administracion->nombre ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_nombre','readonly']) !!}
												</div>
												<div class="col-md-3">
													{!! Form::label('admin_contacto',__('Contacto'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::text('admin_contacto',$administracion->contacto ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_contacto','readonly']) !!}

												</div>
												<div class="col-md-3">
													{!! Form::label('admin_region',__('Región'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::text('region',null, ['class'=>'form-control r-0 light s-12', 'id'=>'region','readonly']) !!}
													{!! Form::select('admin_region',$regions,$administracion->region_id ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_region_id','disabled','style'=>'display:none;']) !!}
												</div>
												<div class="col-md-3">
													{!! Form::label('admin_comuna',__('Comuna'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::text('comuna',$administracion->commune->name ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'comuna2','readonly']) !!}
													{!! Form::select('admin_comuna',$comunas, $administracion->comuna_id ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_comuna_id','disabled','style'=>'display:none;']) !!}
												</div>
												<div class="col-md-6">
													{!! Form::label('admin_direccion',__('Dirección'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::textarea('admin_region',$administracion->direccion ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_direccion','disabled','rows'=>'2']) !!}
												</div>
												<div class="col-md-6">
													{!! Form::label('admin_presentacion',__('Presentación'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}
													{!! Form::textarea('admin_presentacion',$administracion->presentacion ?? null, ['class'=>'form-control r-0 light s-12', 'id'=>'result_admin_presentacion','disabled','rows'=>'2']) !!}
												</div>
											</div>
											
										</div>
									</div>
									 <div class="col-12 mt-2">
								 	<div class="form-row">
									
											<div class="col-md-7"><p><b>Calificación de Administración</b></p></div>
												<div class="col-md-5 text-right mb-2">
													<a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createCalificacion" title="Crear Calificación">
													<i class="icon-add"></i>Agregar Calificación
													</a> 
												</div>
									</div>
								
                                  <table class="table table-bordered" data-page-length="12" id="table_calificacion_administracion" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 20px">Periódo</th>
                                              <th style="width: 20px">Administración</th>	
                                              <th style="width: 20px">Calificación</th>	
                                              <th></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                                  
                              </div>
									<div class="col-12 mt-2">
										<hr/>
										<div class="fom-row form-group">
											<div class="form-row">
												<div class="col-md-12"><p><b>Deudas de últimos 12 meses</b></p></div>
												<div class="col-md-1">
													<p><b>Luz</b></p>
													
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-1">
													<div class="form-inline">
														<p><b>Sí</b></p>
														<input type="checkbox" id="deuda_luz_yes" name="deuda_luz" value="1" @if($building->deuda_luz == 1){{'checked'}} @endif class="mb-3 ml-2">
													</div>
												</div>
												<div class="col-md-1">
													<div class="form-inline">
														<p><b>No</b></p>
														<input type="checkbox" id="deuda_luz_no" name="deuda_luz" value="0" @if($building->deuda_luz == 0){{'checked'}}@endif class="mb-3 ml-2">
													</div>
													
												</div>
												
												<div class="col-md-8">
													<div class="form-inline col-12">
														<p><b>Resolución</b></p>
														{!! Form::text('resolucion_luz',$building->resolucion_luz ?? null, ['class'=>'form-control r-0 light s-12 ml-2', 'id'=>'resolucion_luz','style'=>'width:450px;']) !!}
													</div>
												</div>

												<div class="col-md-1">
													<p><b>Agua</b></p>
													
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-1">
													<div class="form-inline">
														<p><b>Sí</b></p>
														<input type="checkbox" id="deuda_agua_yes" @if($building->deuda_agua == 1){{'checked'}}@endif name="deuda_agua" value="1" class="mb-3 ml-2">
													</div>
												</div>
												<div class="col-md-1">
													<div class="form-inline">
														<p><b>No</b></p>
														<input type="checkbox" id="deuda_agua_no" @if($building->deuda_agua == 0){{'checked'}}@endif name="deuda_agua" value="0" class="mb-3 ml-2">
													</div>
													
												</div>
												
												<div class="col-md-8">
													<div class="form-inline col-12">
														<p><b>Resolución</b></p>
														{!! Form::text('resolucion_agua',$building->resolucion_agua ?? null, ['class'=>'form-control r-0 light s-12 ml-2', 'id'=>'resolucion_agua','style'=>'width:450px;']) !!}
													</div>
												</div>

												<div class="col-md-1">
													<p><b>Gas</b></p>
													
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-1">
													<div class="form-inline">
														<p><b>Sí</b></p>
														<input type="checkbox" id="deuda_gas_yes" name="deuda_gas" @if($building->deuda_gas == 1){{'checked'}}@endif  value="1" class="mb-3 ml-2">
													</div>
												</div>
												<div class="col-md-1">
													<div class="form-inline">
														<p><b>No</b></p>
														<input type="checkbox" id="deuda_gas_no" name="deuda_gas" @if($building->deuda_gas == 0){{'checked'}}@endif  value="0" class="mb-3 ml-2">
													</div>
													
												</div>
												
												<div class="col-md-8">
													<div class="form-inline col-12">
														<p><b>Resolución</b></p>
														{!! Form::text('resolucion_gas',$building->resolucion_gas ?? null, ['class'=>'form-control r-0 light s-12 ml-2', 'id'=>'resolucion_gas','style'=>'width:450px;']) !!}
													</div>
												</div>
												
											</div>
											
										</div>
									</div>
									<div class="col-12 mt-2">
										<hr/>
										<div class="fom-row form-group">
											<div class="form-row">
												<div class="col-md-12"><p><b>Demanda últimos 12 meses</b></p></div>
												
												<div class="col-md-1">
													<div class="form-inline">
														<p><b>Sí</b></p>
														<input type="checkbox" id="demanda_yes" name="demanda" value="1" @if($building->demanda == 1){{'checked'}} @endif class="mb-3 ml-2">
													</div>
												</div>
												<div class="col-md-1">
													<div class="form-inline">
														<p><b>No</b></p>
														<input type="checkbox" id="demanda_no" name="demanda" value="0" @if($building->demanda == 0){{'checked'}}@endif class="mb-3 ml-2">
													</div>
													
												</div>
												
												<div class="col-md-10">
													<div class="form-inline col-12">
														<p><b>Concepto</b></p>
														{!! Form::text('concepto_demanda',$building->resolucion_luz ?? null, ['class'=>'form-control r-0 light s-12 ml-2', 'id'=>'concepto_demanda','style'=>'width:600px;']) !!}
													</div>
												</div>
												
											</div>
											
										</div>
									</div>
									<hr>
									<div class="col-md-12"><p><b>Especificaciones Técnicas</b></p></div>	
									<div class="col-md-6 mt-2">
										<div class="form-row">
										
									<table class="table ">
						              
						              <tbody>
						                
						                <tr>
						                	<td>{!! Form::label('cantidad_dptos',__('Cantidad de Dptos'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
						                  	<td>{!! Form::text('cantidad_dptos', $building->cantidad_dptos ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'cantidad_dptos']) !!}</td>
						                </tr>
						               <tr>
						                	<td>{!! Form::label('cantidad_pisos',__('Cantidad de Pisos'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::text('cantidad_pisos', $building->cantidad_pisos ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'cantidad_pisos']) !!}</td>	
						                </tr>
						                <tr>
						                	<td>{!! Form::label('cantidad_est',__('Cantidad de Est.'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
											<td>{!! Form::text('cantidad_est', $building->cantidad_est ?? '', ['class'=>'form-control r-0 light s-12', 'id'=>'cantidad_est']) !!}</td>	
						                </tr>
						                <tr>
						                	<td>{!! Form::label('cantidad_est_visitas',__('Cantidad Est Visitas'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
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
								                	<td>{!! Form::label('cantidad_sub',__('Cantidad Sub'), ['class'=>'col-form-label s-12', 'onclick'=>'inputClear(this.id)']) !!}</td>
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
										<br>
										<div class="row text-right">
											<div class="col-md-12 ">
												<a href="{{ route('buildings.index') }}" class="btn btn-default" data-dismiss="modal">{{__('Atrás')}}</a>
												
											</div>
										</div>
										{!! Form::hidden('route', route('buildings.index'), ['id'=>'route']) !!}
										<br>
									</div>
								</div>
									<div class="col-12 mt-2">
										<hr/>
										<div class="fom-row form-group">
											<div class="form-row">
									
													<div class="col-md-7"><p><b>Personas y Contactos</b></p></div>
													<div class="col-md-5 text-right mb-2">
														<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createContacto" title="Add Currency">
													  <i class="icon-add"></i> Agregar Personas
														</a> 
													</div>
												</div>
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
                                               
                                                 <a href="#" class="btn btn-default btn-sm" title="Editar" data-toggle="modal" data-target="#updateContact" onclick="obtenerDatosGet('{{ route('building.showContacto',$operation->id) }}', '{{ route('building.update_contact',$operation->id) }}')">
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
									<hr>
									<div class="col-md-12 mt-2">
										<div class="form-row">
											@if(!(Auth::user()->hasRole('corredor')))
											<div class="col-12 text-right">
												<a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#create" title="Add Currency">
												    <i class="icon-add"></i>Agregar Tipología
												</a> 
											</div>
											@endif
											 <table id="example3" class="table table-bordered table-hover table-sm" data-order='[[ 0, "desc" ]]' data-page-length='20' style=" font-size: 12px;">
								              <thead>
					                                <tr>
					                                    <th><b>TIPOLOGÍA</b></th>
					                                    <th><b>CANTIDAD</b></th>
					                                    @if(!(Auth::user()->hasRole('corredor')))
					                                    <th><b>OPCIONES</b></th>
					                                    @endif
					                                </tr>
					                           </thead>
								              <tbody>
								                 @foreach ($edificio_tipologia as $tipo)
					                                <tr class="tbody">
					                                    <td>{{ $tipo->edificio_tipologia->tipologia ?? '' }}</td>
					                                    <td>{{ $tipo->cantidad ?? '' }}</td>
					                                     @if(!(Auth::user()->hasRole('corredor')))
					                                     <td class="text-center">
					                                            {!! Form::open(['route'=>['edificioTipologia.destroy',$tipo],'method'=>'DELETE', 'class'=>'formlDinamic','id'=>'eliminarRegistro']) !!}
					                                             <a href="#" class="btn btn-default btn-sm" title="Editar" data-toggle="modal" data-target="#update" onclick="obtenerDatosGet('{{ route('edificioTipologia.edit',$tipo->id) }}', '{{ route('edificioTipologia.update',$tipo->id) }}')">
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
								 <div class="box-body">
								 	<div class="form-row">
									
											<div class="col-md-7"><p><b>Gastos</b></p></div>
												<div class="col-md-5 text-right mb-2">
													<a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createGasto" title="Crear Gasto">
													<i class="icon-add"></i>Agregar Gasto
													</a> 
												</div>
									</div>
								 @if((Auth::user()->hasRole('super')))	
                                  <table class="table table-bordered" data-page-length="12" id="table_gastos" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                          	  <th></th>
                                              <th style="width: 20px">Periódo</th>
                                              <th style="width: 20px">Mayordomo(Si/No)</th>	
                                              <th style="width: 20px">Copropietario(Si/No)</th>	
                                              <th style="width: 20px">Calificación</th>	
                                              <th style="width: 20px">Boleta</th>	
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                                  @elseif((Auth::user()->hasRole('mayor')))	
                                   <table class="table table-bordered" data-page-length="12" id="table_gastos_mayor" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                          	  <th></th>
                                              <th style="width: 20px">Periódo</th>
                                              <th style="width: 20px">Mayordomo(Si/No)</th>	
                                              <th style="width: 20px">Calificación</th>	
                                              <th style="width: 20px">Boleta</th>	
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                                  @elseif((Auth::user()->hasRole('copro')))	
                                   <table class="table table-bordered" data-page-length="12" id="table_gastos_copropie" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                          	  <th></th>
                                              <th style="width: 20px">Periódo</th>
                                              <th style="width: 20px">Copropietario(Si/No)</th>
                                              <th style="width: 20px">Calificación</th>		
                                              <th style="width: 20px">Boleta</th>	
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                                  @endif
                              </div>
                              	 <div class="box-body mt-2">
								 	<div class="form-row">
									
											<div class="col-md-7"><p><b>Gastos Comunes</b></p></div>
												<div class="col-md-5 text-right mb-2">
													<a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createGastoComun" title="Crear Gasto Comun">
													<i class="icon-add"></i>Agregar Gasto Común
													</a> 
												</div>
									</div>
							
                                  <table class="table table-bordered" data-page-length="12" id="table_gastos_comun" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 100px">Periódo</th>
                                              <th style="width: 150px">Monto (Dpto Pequeño)</th>	
                                              <th style="width: 150px">Monto (Dpto Grande)</th>
                                              <th></th>	
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                                
                              </div>
                                <div class="card no-b p-3 my-3 mb-4">
				                    <p> Gráfica de Gastos Comunes. </p>
				                    <div style="height: 600px;">
				                    	<canvas id="myChart2" width="600" height="300"></canvas>
				                    </div>
				                    
			                   
                				</div>
								<br>
								<div class="box-body mt-2">
								 	<div class="form-row">
									
											<div class="col-md-7"><p><b>Gastos Comunes por día</b></p></div>
												<div class="col-md-5 text-right mb-2">
													<a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createGastoComunDia" title="Crear Gasto Comun">
													<i class="icon-add"></i>Agregar Días por Gastos Común
													</a> 
												</div>
									</div>
							
                                  <table class="table table-bordered" data-page-length="12" id="table_gastos_comun_dias" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 100px">Periódo</th>
                                              <th style="width: 150px">Al Día</th>	
                                              <th style="width: 150px">En Mora</th>
                                              <th></th>	
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                                
                              </div>
                                <div class="card no-b p-3 my-3">
				                    <p> Gráfica de Gastos Comunes por Días. </p>
				                    <div style="height: 450px">
				                    	<canvas id="myChart3" width="600" height="300"></canvas></div>
                				</div>
                				<div class="box-body mt-2">
								 	<div class="form-row">
									
											<div class="col-md-7"><p><b>Frecuencia de Recambio</b></p></div>
												<div class="col-md-5 text-right mb-2">
													<a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createFrecuenciaRecambio" title="Crear Gasto Comun">
													<i class="icon-add"></i>Agregar Frecuencia de Recambio
													</a> 
												</div>
									</div>
							
                                  <table class="table table-bordered" data-page-length="12" id="table_frecuencia_recambio" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 100px">Periódo</th>
                                              <th style="width: 150px">Recambio</th>	
                                              <th></th>	
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                                
                              </div>
                               <div class="card no-b p-3 my-3">
				                    <p> Gráfica de Frecuencia de Recambio. </p>
				                    <div style="height: 450px">
				                    	<canvas id="myChart" width="600" height="300"></canvas>
				                    </div>
                				</div>
                				

							</div>
							
						</div>
						
			          
					</div>
				</div>
			</div>

		</div>

	</div> 
	@endsection
	@section('js')
	<script src={{asset('assets/js/jquery.dataTables.js')}}></script>
	<script src={{asset('assets/js/bootstrap-datatables.js')}}></script>
	<script src={{asset('assets/js/table-edit.js')}}></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/chart.min.js" async defer></script>
	<script>

		validarConcepto();
		calificacion();
		gastos();
		gastos_comunes();
		gastos_comunes_dias();
		gastos_mayordomo();
		gastos_copropietario();
		frecuencia_recambio();

		function validarConcepto(){

			var luz = document.getElementById('deuda_luz_yes').checked;
			var agua = document.getElementById('deuda_agua_yes').checked;
			var gas = document.getElementById('deuda_gas_yes').checked;
			var demanda = document.getElementById('demanda_yes').checked;


			var combo = document.getElementById("result_admin_region_id");
			var selected = combo.options[combo.selectedIndex].text;
			$('#region').val(selected);

			$('#comuna2').val("");
			var combo2 = document.getElementById("result_admin_comuna_id");
			var selected2 = combo2.options[combo.selectedIndex].text;
			$('#comuna2').val(selected2);

			if(luz){
				$('#resolucion_luz').prop('readonly', false);
			}

			if(agua){
				$('#resolucion_agua').prop('readonly', false);
			}

			if(gas){
				$('#resolucion_gas').prop('readonly', false);
			}

			if(demanda){
				$('#concepto_demanda').prop('readonly', false);
			}
		}


		function actualizarEdificio(id){

			 var url = "{{ url('updateEdificio') }}/"+id;
			 var formdata = $('#form_edificio').serialize();

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


		$('#tableMeta').dataTable({searching: false, paging: true, info: false, lengthChange:false});

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
		  zoom: 15
		});

		var marker = new mapboxgl.Marker()
		.setLngLat([longitude, latitude])
		.addTo(map);
		// set the bounds of the map
		//var bounds = [[-70.6286045,-33.4936126], [-70.6659556,-33.4144728]];
		//map.setMaxBounds(bounds);
		
		map.on('load', function () {
		// Add an image to use as a custom marker
		map.loadImage(
		'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
		function (error, image) {
		if (error) throw error;
		map.addImage('custom-marker', image);
		// Add a GeoJSON source with 2 points
		map.addSource('points', {
		'type': 'geojson',
		'data': {
		'type': 'FeatureCollection',
		'features': [
		{
		// feature for Mapbox DC
		'type': 'Feature',
		'geometry': {
		'type': 'Point',
		'coordinates': [longitude,latitude]
		}
		},
		{
		// feature for Mapbox SF
		'type': 'Feature',
		'geometry': {
		'type': 'Point',
		'coordinates': [longitude,latitude]
		},
		'properties': {
		'title': 'Mapbox SF'
		}
		}
		]
		}
		});
		 
		// Add a symbol layer
		map.addLayer({
		'id': 'points',
		'type': 'symbol',
		'source': 'points',
		'layout': {
		'icon-image': 'custom-marker',
		// get the title name from the source's "title" property
		'text-field': ['get', 'title'],
		'text-font': [
		'Open Sans Semibold',
		'Arial Unicode MS Bold'
		],
		'text-offset': [0, 1.25],
		'text-anchor': 'top'
		}
		});
		}
		);
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

			 'use strict';

			  var nEditing = null,
			    oTable;

			  function restoreRow(oTable, nRow) {
			    var aData = oTable.fnGetData(nRow);
			    var jqTds = $('>td', nRow);
			    for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
			      oTable.fnUpdate(aData[i], nRow, i, false);
			    }
			    oTable.fnDraw();
			  }

			 

			  function saveRow(oTable, nRow) {
			    var jqInputs = $('input', nRow);
			    oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
			    oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
			    oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
			    oTable.fnUpdate('<a class=\'edit\' href=\'\'>Editar</a>', nRow, 5, false);
			    oTable.fnDraw();
			  }

			  oTable = $('.datatable').dataTable();

			 // $('.toolbar').append('<a id=\'new\' href=\'javascript:;\' class=\'btn btn-info m-l\'>Agregar</a>');

			 
			  $('.datatable').on('click', 'a.delete', function (e) {
			    e.preventDefault();
			    var nRow = $(this).parents('tr')[0];
			    var id = $(this).attr("id");
			    deleteMeta(id);
			    oTable.fnDeleteRow(nRow);
			  });

			  $('.datatable').on('click', 'a.edit', function (e) {
			    e.preventDefault();
			    var id = $(this).attr("id");
			    
			    var nRow = $(this).parents('tr')[0];
			    if (nEditing !== null && nEditing !== nRow) {
			      restoreRow(oTable, nEditing);
			      editRow2(oTable, nRow, id);
			      nEditing = nRow;
			    } else if (nEditing === nRow && this.innerHTML === 'Save') {
			      saveRow(oTable, nEditing);
			      nEditing = null;
			    } else {
			      editRow2(oTable, nRow, id);
			      nEditing = nRow;
			    }
			    return false;
			  });
			
			 $('#new').on('click', function (e) {
			 	
				    e.preventDefault();
				    var aiNew = oTable.fnAddData(['', '', '', '', '', '<a class=\'edit\' href=\'\'>Editar</a>', '<a class=\'delete\' href=\'\'>Delete</a>']);
				    var nRow = oTable.fnGetNodes(aiNew[0]);
				    editRow(oTable, nRow);
				    nEditing = nRow;
				    
 			 });

 			 function editRow(oTable, nRow) {
			    var aData = oTable.fnGetData(nRow);
			    var jqTds = $('>td', nRow);


			    jqTds[0].innerHTML = '{!! Form::select("metaTypeID[]", $metaType, null, ["class"=>"form-control r-0 light select2 s-12","id"=>"data1","onclick"=>"test(this.value)" ]) !!}';
			    jqTds[1].innerHTML = '<div id="content"></>';
			    jqTds[2].innerHTML = '<a class=\'edit\' href=\'\' onclick="recargar()"><i class="mr-2 icon-save text-success"></i></a> <a class=\'delete\' href=\'\'> <i class="mr-2 icon-trash-can3 text-danger"></i></a>';
			  }

			 function editRow2(oTable, nRow, id) {
			    var aData = oTable.fnGetData(nRow);
			    var jqTds = $('>td', nRow);
			    
			    jqTds[0].innerHTML = '{!! Form::select("metaTypeID[]", $metaType, null, ["class"=>"form-control r-0 light select2 s-12","id"=>"data1","onclick"=>"test(this.value)" ]) !!}';
			    jqTds[1].innerHTML = '<div id="content"><input type=\'text\' id ="data2" class=\'form-control\' value=\'' + aData[1] + '\'></>';
			    jqTds[2].innerHTML = '<a class=\'edit\' href=\'\' onclick="recargar2('+id+')"><i class="mr-2 icon-save text-success"></i></a><a class=\'delete\' href=\'\'> <i class="mr-2 icon-close text-danger"></i></a>';
			  }


		});

		function recargar(){
			
			var meta = $('#data1').val();
			var valor = $('#data2').val();
			var edificioID = $('#_id').val();
			
			if (meta != '' && valor !='') {

				 var url ="{{url('metaEdificio.store')}}";

			      $.ajax({
			        type : 'post',
			        url  : url,
			        data : { "_token": "{{ csrf_token() }}",'edificioID':edificioID,'edificioMetaTypeID':meta,'value':valor},
			        success:function(data){
			          toastr.success('MetaEdificio creado exitosamente!');
			           cargarTabla();
			          
			        }
			      });

			}else{
				toastr.error('Ambos campos son requeridos!');
			}
		}
		
		function recargar2(id){
		
			var meta = $('#data1').val();
			var valor = $('#data2').val();
			var edificioID = $('#_id').val();
			
			if (meta != '' && valor !='') {

				 var url ="{{url('metaEdificio.update')}}/"+id;

			      $.ajax({
			        type : 'post',
			        url  : url,
			        data : { "_token": "{{ csrf_token() }}",'edificioID':edificioID,'edificioMetaTypeID':meta,'value':valor},
			        success:function(data){
			          toastr.success('MetaEdificio editado exitosamente!');
			           //window.location.reload();
			           cargarTabla();
			          
			        }
			      });

			}else{
				toastr.error('Ambos campos son requeridos!');
			}
		}

		function deleteMeta(id){
		
			var url ="{{url('metaEdificio.delete')}}/"+id;

			$.ajax({
			    type : 'post',
			    url  : url,
			    data : { 'id':id },
			    success:function(data){
			         toastr.success('MetaEdificio eliminado exitosamente!');
			           //window.location.reload();
			          
			        }
			 });

		}

		function test(id){
			console.log(id);
			if(id == '2'){

				var url ="{{url('showMetaList')}}/"+id;
				$.ajax({
			    type : 'get',
			    url  : url,
			    data : { 'id':id },
			    success:function(data){
			         	
			         	console.log(data);
			         	document.getElementById('content').innerHTML = '';
			         	bloque = document.getElementById('content');
						var selectList = document.createElement("select");
						selectList.id = "data2";
						selectList.setAttribute("class", "form-control r-0 light select2 s-12");
						bloque.appendChild(selectList);

						
						var options = [];
						$.each(data, function(key, value) {
						    options.push($("<option/>", {
						        value: key,
						        text: value
						    }));
						}); 

				
						$('#data2').append(options);	 

			        }
			 	});

			}else{
				
			    document.getElementById('content').innerHTML = '';
				$('<input/>').attr({type:'text',name:'text',id:'data2'}).appendTo('#content');
			}
		}

		function cargarTabla(){
			var id = $('#_id').val();
			var url ="{{url('getMetaEdificio')}}/"+id;
		    $.ajax({
		            url: url,
		            method  : 'GET',
		            success : function(r){
		            	console.log(r);
		                let lista = r;
		                let htmlCode = ``;
		                $.each(lista, function(index, item){
		                    htmlCode+=`<tr>
		                                <td>${item.edificioMetaTypeID}</td>
		                                <td>${item.value}</td>
		                                <td class="text-center"><a href="javascript:;" class="edit" id=${item.id}><i class="icon-pencil text-info text-info"></i></a>
				                  	  		<a href="javascript:;" id=${item.id} class="delete"><i class="icon-trash-can3 text-danger"></i></a></td>
		                            </tr>`;
		                });
		                $('#tableMeta tbody').html(htmlCode);
		            }
		    });
    	}

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


							var combo = document.getElementById("result_admin_region_id");
							var selected = combo.options[combo.selectedIndex].text;
							$('#region').val(selected);

							var combo2 = document.getElementById("result_admin_comuna_id");
							var selected2 = combo2.options[combo.selectedIndex].text;
							$('#comuna').val(selected2);
			            }
			    });
    	})

    	$("input:checkbox").on('click', function() {

		  var $box = $(this);
		  if ($box.is(":checked")) {

		    var group = "input:checkbox[name='" + $box.attr("name") + "']";
		    
		    $(group).prop("checked", false);
		    $box.prop("checked", true);
		  } else {
		    $box.prop("checked", false);
		  }

		});


    	$("#deuda_agua_yes").on('change', function() {

		  var $box = $(this);
		  if (this.checked) {
		  	$('#resolucion_agua').prop('readonly', false);
		  } else {
		  	$('#resolucion_agua').prop('readonly',true);
		  }
		  
		});

    	$("#deuda_agua_no").on('change', function() {

		  var $box = $(this);
		  if (this.checked) {
		  	$('#resolucion_agua').prop('readonly', true);
		  } else {
		  	$('#resolucion_agua').prop('readonly', false);
		  }
		  
		});

		$("#deuda_luz_yes").on('change', function() {

		  var $box = $(this);
		  if (this.checked) {
		  	$('#resolucion_luz').prop('readonly', false);
		  } else {
		  	$('#resolucion_luz').prop('readonly', true);
		  }
		  
		});

    	$("#deuda_luz_no").on('change', function() {

		  var $box = $(this);
		  if (this.checked) {
		  	$('#resolucion_luz').prop('readonly',true);
		  } else {
		  	$('#resolucion_luz').prop('readonly',false);
		  }
		  
		});

		$("#deuda_gas_yes").on('change', function() {

		  var $box = $(this);
		  if (this.checked) {
		  	$('#resolucion_gas').prop('readonly', false);
		  } else {
		  	$('#resolucion_gas').prop('readonly', true);
		  }
		  
		});

    	$("#deuda_gas_no").on('change', function() {

		  var $box = $(this);
		  if (this.checked) {
		  	$('#resolucion_gas').prop('readonly', true);
		  } else {
		  	$('#resolucion_gas').prop('readonly', false);
		  }
		  
		});


		$("#demanda_yes").on('change', function() {

		  var $box = $(this);
		  if (this.checked) {
		  	$('#concepto_demanda').prop('readonly', false);
		  } else {
		  	$('#concepto_demanda').prop('readonly', true);
		  }
		  
		});

    	$("#demanda_no").on('change', function() {

		  var $box = $(this);
		  if (this.checked) {
		  	$('#concepto_demanda').prop('readonly', true);
		  } else {
		  	$('#concepto_demanda').prop('readonly', false);
		  }
		  
		});

	 function calificacion(){
        var id = $('#_id').val();
        $('#table_calificacion_administracion').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "ajax": {
                        url: "{{ url('calificacionAdministracion') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        
                                        }
                         },
                         columns: [
                                    {
                                    data:'nombre',
                                    className: 'text-center',
                                    },
                                   {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<p style="font-size:15px; color:#ffbb00;">'+row['calificacion']+'</p>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editCalificacion('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a><a class="btn btn-default btn-sm" title="Eliminar" onclick=deleteCalificacion('+row['id']+') style="padding: .10rem .4rem;"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }	

	 function gastos(){
        var id = $('#_id').val();
        $('#table_gastos').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "ajax": {
                        url: "{{ url('gastos_mayordomo_edificio') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        
                                        }
                         },
                         columns: [
                                    {
                                    data:'concepto',
                                    className: 'text-center',
                                    },
                                   {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                    {
                                    data:'mayordomo',
                                    className: 'text-center',
                                    },
                                     {
                                    data:'copropietario',
                                    className: 'text-center',
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<p style="font-size:15px; color:#ffbb00;">'+row['calificacion']+'</p>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editGasto('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a> <a class="btn btn-default btn-sm" title="Descargar" onclick=descargarBoleta('+row['id']+') style="padding: .10rem .4rem;'+row['validacion']+'"><i class="icon-download text-info"></i></a><a class="btn btn-default btn-sm" title="Eliminar" onclick=deleteGasto('+row['id']+') style="padding: .10rem .4rem;"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

  	 function gastos_comunes(){
        var id = $('#_id').val();
        $('#table_gastos_comun').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "ajax": {
                        url: "{{ url('gastos_comunes_edificio') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        
                                        }
                         },
                         columns: [
                                   {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                    {
                                    data:'monto_dpto_pequenno',
                                    className: 'text-center',
                                    },
                                     {
                                    data:'monto_dpto_grande',
                                    className: 'text-center',
                                    },
                                   
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editGastoComun('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a><a class="btn btn-default btn-sm" title="Eliminar" onclick=deleteGastoComun('+row['id']+') style="padding: .10rem .4rem;"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

  function gastos_comunes_dias(){
        var id = $('#_id').val();
        $('#table_gastos_comun_dias').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "ajax": {
                        url: "{{ url('gastos_comunes_dias_edificio') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        
                                        }
                         },
                         columns: [
                                   {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                    {
                                    data:'al_dia',
                                    className: 'text-center',
                                    },
                                     {
                                    data:'dia_atrasado',
                                    className: 'text-center',
                                    },
                                   
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editGastoComunDia('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a><a class="btn btn-default btn-sm" title="Eliminar" onclick=deleteGastoComunDia('+row['id']+') style="padding: .10rem .4rem;"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

   function frecuencia_recambio(){
        var id = $('#_id').val();
        $('#table_frecuencia_recambio').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "ajax": {
                        url: "{{ url('frecuencia_recambio') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        
                                        }
                         },
                         columns: [
                                   {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                    {
                                    data:'recambio',
                                    className: 'text-center',
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editFrecuenciaRecambio('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a><a class="btn btn-default btn-sm" title="Eliminar" onclick=deleteFrecuenciaRecambio('+row['id']+') style="padding: .10rem .4rem;"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

  function gastos_mayordomo(){
        var id = $('#_id').val();
        $('#table_gastos_mayor').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "ajax": {
                        url: "{{ url('gastos_mayordomo_edificio') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        
                                        }
                         },
                         columns: [
                                    {
                                    data:'concepto',
                                    className: 'text-center',
                                    },
                                   {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                    {
                                    data:'mayordomo',
                                    className: 'text-center',
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<p style="font-size:12px; color:yellow;">'+row['calificacion']+'</p>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editGasto('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a> <a class="btn btn-default btn-sm" title="Descargar" onclick=descargarBoleta('+row['id']+') style="padding: .10rem .4rem;'+row['validacion']+'"><i class="icon-download text-info"></i></a><a class="btn btn-default btn-sm" title="Eliminar" onclick=deleteGasto('+row['id']+') style="padding: .10rem .4rem;"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

  function gastos_copropietario(){
        var id = $('#_id').val();
        $('#table_gastos_copropie').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "ajax": {
                        url: "{{ url('gastos_mayordomo_edificio') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        
                                        }
                         },
                         columns: [
                                    {
                                    data:'concepto',
                                    className: 'text-center',
                                    },
                                   {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                     {
                                    data:'copropietario',
                                    className: 'text-center',
                                    },
                                   ,
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<p style="font-size:12px; color:yellow;">'+row['calificacion']+'</p>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editGasto('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a> <a class="btn btn-default btn-sm" title="Descargar" onclick=descargarBoleta('+row['id']+') style="padding: .10rem .4rem;'+row['validacion']+'"><i class="icon-download text-info"></i></a><a class="btn btn-default btn-sm" title="Eliminar" onclick=deleteGasto('+row['id']+') style="padding: .10rem .4rem;"><i class="icon-trash text-danger"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }



  function descargarBoleta(id){
  		let url='{{route('downloadBoleta', ":id")}}'
        url = url.replace(':id',id); 
       
        window.location.href = `${url}`;
       
  }

   function deleteGasto(id){
  		let url='{{route('deleteGasto', ":id")}}'
        url = url.replace(':id',id); 
       
        window.location.href = `${url}`;
       
  }

    function deleteCalificacion(id){
  		let url='{{route('deleteAdmCalificacion', ":id")}}'
        url = url.replace(':id',id); 
       
        window.location.href = `${url}`;
       
  }

    function deleteGastoComun(id){
  		let url='{{route('deleteGastoComun', ":id")}}'
        url = url.replace(':id',id); 
       
        window.location.href = `${url}`;
       
  }

      function deleteFrecuenciaRecambio(id){
  		let url='{{route('deleteFrecuenciaRecambio', ":id")}}'
        url = url.replace(':id',id); 
       
        window.location.href = `${url}`;
       
  }


    function deleteGastoComunDia(id){
  		let url='{{route('deleteGastoComunDia', ":id")}}'
        url = url.replace(':id',id); 
       
        window.location.href = `${url}`;
       
  }

  function editCalificacion(id){
  		
  		$("#update_calificacion").modal("show");
        
        var url ="{{url('getAdmCalificacion')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){

             var date = data[0].periodo;
             date = date.slice(0,7)
           
              $('#_id_administracion').val(data[0].id_administracion);
              $('#_adm_periodo').val(date);
      
              switch (data[0].calificacion) {
				  case '1':
				    $('#_adm_radio5').prop('checked', true);
				    break;
				  case '2':
				     $('#_adm_radio4').prop('checked', true);
				    break;
				  case '3':
				     $('#_adm_radio3').prop('checked', true);
				    break;
				  case '4':
				     $('#_adm_radio2').prop('checked', true);
				    break;
				  case '5':
				      $('#_adm_radio1').prop('checked', true);
				    break;
				  default:
				    console.log('Lo lamentamos');
			}


              $('#id_calificacion').val(data[0].id);
             //console.log(data);
              
            }
          });
       
  }

  function editGasto(id){
  		
  		$("#editar_gasto").modal("show");
        
        var url ="{{url('getGasto')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             var date = data.periodo;
             date = date.slice(0,7)
            
              $('#_concepto_id').val(data.concepto_id);
              $('#_periodo').val(date);
              $('#_estado_mayordomo').val(data.estado_mayordomo);
              $('#_estado_copropietario').val(data.estado_copropietario);


              switch (data.calificacion) {
				  case '1':
				    $('#_radio5').prop('checked', true);
				    break;
				  case '2':
				     $('#_radio4').prop('checked', true);
				    break;
				  case '3':
				     $('#_radio3').prop('checked', true);
				    break;
				  case '4':
				     $('#_radio2').prop('checked', true);
				    break;
				  case '5':
				      $('#_radio1').prop('checked', true);
				    break;
				  default:
				    console.log('Lo lamentamos');
			}


              $('#id_gasto').val(data.id);
             //console.log(data);
              
            }
          });
       
  }

   function editGastoComun(id){
  		
  		$("#updateGastoComun").modal("show");
        
        var url ="{{url('getGastoComun')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
           
             var date = data[0].periodo;
             date = date.slice(0,7)
            
              $('#_periodo_comun').val(date);
              $('#_monto_dpto_pequenno').val(data[0].monto_dpto_pequenno);
              $('#_monto_dpto_grande').val(data[0].monto_dpto_grande);
              $('#id_gasto_comun').val(data[0].id);
              
            }
          });
       
  }

  function editGastoComunDia(id){
  		
  		$("#updateGastoComunDia").modal("show");
        
        var url ="{{url('getGastoComunDia')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
           
             var date = data[0].periodo;
             date = date.slice(0,7)
            
              $('#_periodo_comun_dia').val(date);
              $('#_al_dia').val(data[0].al_dia);
              $('#_dia_atrasado').val(data[0].dia_atrasado);
              $('#id_gasto_comun_dia').val(data[0].id);
              
            }
          });
       
  }

  function editFrecuenciaRecambio(id){
  		
  		$("#updateFrecuenciaRecambio").modal("show");
        
        var url ="{{url('getFrecuenciaRecambio')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
           
             var date = data[0].periodo;
             date = date.slice(0,7)
            
              $('#_periodo_recambio').val(date);
              $('#_recambio').val(data[0].recambio);
              $('#id_frecuencia').val(data[0].id);
              
            }
          });
       
  }


      function getGastoPromedio() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $('#_id').val();
                var dataResponse = $.ajax({
                    type: 'GET',
                    url: "{{url('GastoPromedio')}}/"+id,
                });
                return dataResponse;
            }

    var getGastoPromedio = getGastoPromedio().done(function (response) {
                 'use strict';
			      
			        var Labels = new Array();
			        var Prices = new Array();

			        response.forEach(function(data){
		                
		                Labels.push(data.periodo);
		                Prices.push(data.promedio);
            		});
			      var ctx2 = document.getElementById('myChart2').getContext('2d');
					var myChart2 = new Chart(ctx2, {
				    type: 'bar',
				    data: {
				        labels: Labels,
				        datasets: [{
				            label: 'Promedio',
				            data: Prices,
				           	borderColor:  '#0e19b3', 
				           	backgroundColor: '#0e19b3'
				        }]
				    },
				    options: {
				    	maintainAspectRatio: false,
                        legend: {
                           display: true
                        },
				        scales: {
                                 xAxes: [{
                                    display: true,
                                    gridLines: {
                                    zeroLineColor: '#eee',
                                    color: '#eee',
									borderDash: [5, 5],
                                    }
                                    }],
                                    yAxes: [{
                                        display: true,
                                        gridLines: {
                                                    zeroLineColor: '#eee',
                                                    color: '#eee',
                                                    borderDash: [5, 5],
                                                    }
                                        }]

                                    },
                                    elements: {
                                               line: {
													    tension: 0.4,
                                                        borderWidth: 1
                                                    },
                            point: {
                                radius: 2,
                                hitRadius: 10,
                                hoverRadius: 6,
                                borderWidth: 4
                            }
                        }
				    }
				});

    })   



      function getGastoComun() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $('#_id').val();
                var dataResponse = $.ajax({
                    type: 'GET',
                    url: "{{url('GastoDiasEdificio')}}/"+id,
                });
                return dataResponse;
            }
	
      var getGastoComun = getGastoComun().done(function (response) {
                 'use strict';
			      
			        var Labels = new Array();
			        var Dias = new Array();
			        var Atrasados = new Array();

			        response.forEach(function(data){
		                
		                Labels.push(data.periodo);
		                Dias.push(data.al_dia);
		                Atrasados.push(data.dia_atrasado);
            		});
			      var ctx3 = document.getElementById('myChart3').getContext('2d');
					var myChart3 = new Chart(ctx3, {
				    type: 'bar',
				    data: {
				        labels: Labels,
				        datasets: [{ label:'Al Día', borderColor:  '#0e19b3', backgroundColor: '#0e19b3',data: Dias},{ label:'En Mora', borderColor:  '#0eb32a', backgroundColor: '#0eb32a',data: Atrasados}]
				    },
				    options: {
				    	maintainAspectRatio: false,
                        legend: {
                           display: true
                        },
				        scales: {
                                 xAxes: [{
                                    display: true,
                                    gridLines: {
                                    zeroLineColor: '#eee',
                                    color: '#eee',
									borderDash: [5, 5],
                                    }
                                    }],
                                    yAxes: [{
                                        display: true,
                                        gridLines: {
                                                    zeroLineColor: '#eee',
                                                    color: '#eee',
                                                    borderDash: [5, 5],
                                                    }
                                        }]

                                    },
                                    elements: {
                                               line: {
													    tension: 0.4,
                                                        borderWidth: 1
                                                    },
                            point: {
                                radius: 2,
                                hitRadius: 10,
                                hoverRadius: 6,
                                borderWidth: 4
                            }
                        }
				    }
				});

    })          



        function getFrecuenciaRecambioEdificio() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $('#_id').val();
                var dataResponse = $.ajax({
                    type: 'GET',
                    url: "{{url('getFrecuenciaRecambioEdificio')}}/"+id,
                });
                return dataResponse;
            }

    var getFrecuenciaRecambioEdificio = getFrecuenciaRecambioEdificio().done(function (response) {
                 'use strict';
			      
			        var Labels = new Array();
			        var Recambio = new Array();

			        response.forEach(function(data){
		                
		                Labels.push(data.periodo);
		                Recambio.push(data.recambio);
            		});
			      var ctx = document.getElementById('myChart').getContext('2d');
					var myChart = new Chart(ctx, {
				    type: 'bar',
				    data: {
				        labels: Labels,
				        datasets: [{
				            label: 'Promedio',
				            data: Recambio,
				           	borderColor:  '#0eb32a', 
				           	backgroundColor: '#0eb32a'
				        }]
				    },
				    options: {
				    	maintainAspectRatio: false,
                        legend: {
                           display: true
                        },
				        scales: {
                                 xAxes: [{
                                    display: true,
                                    gridLines: {
                                    zeroLineColor: '#eee',
                                    color: '#eee',
									borderDash: [5, 5],
                                    }
                                    }],
                                    yAxes: [{
                                        display: true,
                                        gridLines: {
                                                    zeroLineColor: '#eee',
                                                    color: '#eee',
                                                    borderDash: [5, 5],
                                                    }
                                        }]

                                    },
                                    elements: {
                                               line: {
													    tension: 0.4,
                                                        borderWidth: 1
                                                    },
                            point: {
                                radius: 2,
                                hitRadius: 10,
                                hoverRadius: 6,
                                borderWidth: 4
                            }
                        }
				    }
				});

    })     


	</script>
	
	@endsection