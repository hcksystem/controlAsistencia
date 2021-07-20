<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('auth.login');
});

Route::get('pdf/{name}', function ($name) {
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('pages.operation.pdf.'.$name);
    return $pdf->stream();
})->name('pdf');

Route::get('pdf1', function () {
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadView('pages.operation.pdf.factura6');
    return $pdf->stream();
})->name('pdf1');

Route::get('factura', function () {
	return view('pages.operation.pdf.factura6');
});
Route::get('factura1', function () {
 	return view('pages.operation.pdf.factura1');
});


Route::get('login', function () {
	return view('auth.login');
}); 

Route::get("lang/{locale}", function ($locale) {
	Session::put("locale", $locale);
	return redirect()->back();
})->name("lang");

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	// password reset
	Route::get('reset', 'UserController@formPasswordReset')->name('passwordReset');
	Route::put('passwordUpdate', 'UserController@passwordUpdate')->name('passwordUpdate');
	// users, roles, presmissions
	Route::resource('user', 'UserController');
	Route::resource('rol', 'RolController');
	Route::resource('permission', 'PermissionController');
	// home
	Route::get('/home', 'HomeController@index')->name('home');

	Route::post('loginUser', 'HomeController@indexByUser')->name('loginUser');
	// modules
	Route::resource('dataType', 'dataTypeController');
	Route::resource('module', 'ModuleController');
	Route::resource('regions', 'RegionController');
	Route::resource('commune', 'CommuneController');
	Route::resource('metaData', 'MetaDataController');
	Route::resource('metaType', 'MetaTypeController');
	Route::resource('metaList', 'MetaListController');
	Route::resource('tipologia', 'TipologiaController');
	Route::resource('metaEdificio', 'MetaEdificioController');
	Route::resource('administraciones', 'AdministracionController');
	Route::resource('mvTypes', 'MvTypeController');
	Route::resource('buildings', 'BuildingController');
	Route::resource('edificioTipologia', 'EdificioTipologiaController');
	Route::resource('encomiendas', 'EncomiendaController');
	Route::resource('empresaExterna', 'EmpresaExternaController');
	Route::resource('corredor', 'CorredorController');
	Route::resource('reservaEspacio', 'ReservaEspacioController');
	Route::resource('espacioComun', 'EspacioComunController');
	Route::resource('anuncio', 'AnuncioController');
	Route::resource('tipoDocumento','TipoDocumentoController');
	Route::resource('tipoPersona','TipoPersonaController');

	Route::get("administraciones/contacto/{id}", "BuildingController@showContacts")->name("administraciones.contacto");
	Route::get("building/contacto/{id}", "BuildingController@createContact")->name("building.create_contact");
	Route::get("show/contacto/{id}", "BuildingController@showContact")->name("building.showContacto");
	Route::delete("destroy/contacto/{id}", "BuildingController@destroyContact")->name("building.destroyContacto");
	Route::post("buildings/contacto/store", "BuildingController@storeContact")->name("building.store_contact");
	Route::post("buildings/contacto/update/{id}", "BuildingController@updateContact")->name("building.update_contact");
	Route::get("showMetaList/{id}", "MetaListController@showMetalist");
	Route::get("edificios/datos-historicos/{id}", "BuildingController@showHistory")->name("edificios.history");
	Route::get("edificios/datos-historicos-corredor/{id}", "BuildingController@showHistoryCorredor")->name("edificios.historyCorredor");
	Route::get("edificios/documentos/{id}", "BuildingController@showDocument")->name("edificios.document");
	Route::get("getDocumentoEdificio/{id}", "BuildingController@getDocumentoEdificio");
	Route::post("edificios/crear/documentos", "BuildingController@storeDocument")->name("edificios.createDocument");
	Route::post("edificios/update/documentos", "BuildingController@updateDocument")->name("edificios.updateDocument");
	Route::delete("destroy/documento/{id}", "BuildingController@destroyDocument")->name("building.destroyDocument");
	Route::get("recambio/{id}", "BuildingController@showRecambio");
	Route::get("getRecambio/{id}", "BuildingController@getRecambio");
 	Route::post("updateRecambio", "BuildingController@updateRecambio"); 
 	Route::get("demanda/{id}", "BuildingController@showDemanda");
 	Route::get("getDemanda/{id}", "BuildingController@getDemanda");
 	Route::post("updateDemanda", "BuildingController@updateDemanda"); 
 	Route::get("deuda/{id}", "BuildingController@showDeuda");
 	Route::get("getDeuda/{id}", "BuildingController@getDeuda");
 	Route::post("updateDeuda", "BuildingController@updateDeuda"); 
 	Route::get("calificacion/{id}", "BuildingController@showCalificacion");
 	Route::get("mantencion/{id}", "BuildingController@showManuntencion");
 	Route::get("getMantencion/{id}", "BuildingController@getMantencion");
 	Route::get("getMantencionCo/{id}", "BuildingController@getMantencionCo");
 	Route::post("updateMantencion", "BuildingController@updateMantencion");
 	Route::get("mantencionCo/{id}", "BuildingController@showManuntencionCo");
 	Route::post("updateMantencionCo", "BuildingController@updateMantencionCo"); 

 	Route::get("gastos_comunes/{id}", "BuildingController@showGastosComunes");
 	Route::get("getGastoComunes/{id}", "BuildingController@getGastoComunes");
 	Route::post("updateGasto", "BuildingController@updateGasto");

 	Route::get("gastos_fijos/{id}", "BuildingController@showGastosFijos");
 	Route::get("getGastoFijo/{id}", "BuildingController@getGastoFijo");
 	Route::post("updateGastoFijo", "BuildingController@updateGastoFijo");

 	Route::get("getCalificacion/{id}", "BuildingController@getCalificacion");
 	Route::post("updateCalificacion", "BuildingController@updateCalificacion");
 	Route::get("asambleas/", "BuildingController@showAsamblea")->name("edificios.asamblea");
 	Route::get("asamblea/{id}", "BuildingController@showAsambleaByEdificio")->name("edificio.asamblea");
 	Route::get("asambleas/crear", "BuildingController@createAsamblea")->name("asambleas.create");
 	Route::get("asambleas/crear/{id}", "BuildingController@createAsambleaEdificio")->name("asambleas.createByEdificio");
 	Route::post("asambleas/guardarDatos", "BuildingController@storeAsamblea")->name("guardarAsamblea");
 	Route::post("asambleas/guardar", "BuildingController@storeAsambleaEdificio")->name("asambleas.storeEdificio");
 	Route::post("asambleas/actualizar/{id}", "BuildingController@updateAsamblea")->name("asambleas.update");
 	Route::get("show/asamblea/{id}", "BuildingController@mostrarAsamblea")->name("show.asamblea");
 	Route::get("asamblea/calendario/{id}/{id2}", "BuildingController@mostrarAsambleaByEdificio");
 	Route::get("asamblea/eliminar/{id}", "BuildingController@destroyAsamblea")->name("asamblea.destroy");
 	Route::post("asamblea/crear/documento", "BuildingController@createDocumentAsamblea")->name("asamblea.createDocumento");
 	Route::post("asamblea/actualizar/documento", "BuildingController@updateDocumentAsamblea")->name("asamblea.updateDocumento");
 	Route::get("getDocumentoAsamblea/{id}", "BuildingController@getDocumentoAsamblea");
 	Route::delete("asamblea/destroyAsambleaDocument/{id}", "BuildingController@destroyDocumentAsamblea")->name("asamblea.destroyDocument");

 	Route::get("arriendo/{id}", "BuildingController@showArriendo");
 	Route::get("getArriendo/{id}", "BuildingController@getArriendo");
	/* Laguage */
	Route::get("language/{id?}", "LangController@index")->name("language");
	Route::post("language", "LangController@update")->name("language.update");
	Route::post("updateArriendo", "BuildingController@updateArriendo");
	// export excel
	

	Route::get("search/operation", "OperationController@searchOperation")->name("search/operation");
	
	Route::get("resultOperations", "OperationController@resultOperations")->name("resultOperations");


	Route::get("buscarComunas/{id}", "CommuneController@buscarComunas")->name("buscarComunas");
	Route::get("getMetaEdificio/{id}", "BuildingController@getMetaEdificio")->name("getMetaEdificio");
	Route::get("getAllMeta/{id}", "BuildingController@getAllMeta")->name("getAllMeta");
	Route::post('updateEdificio/{id}','BuildingController@updateEdificio')->name("updateEdificio");
	Route::post('updateAdministracion/{id}','AdministracionController@updateAdministracion');
	Route::post('updateCorredor/{id}','CorredorController@updateCorredor');
	Route::post('updateEmpresa/{id}','EmpresaExternaController@updateEmpresa');

	Route::get('edificioByUser/{id}','UserController@getEdificio');
	Route::post('agregaEdificioUser','UserController@agregaEdificioUser');
	Route::post('eliminaEdificioUser','UserController@eliminaEdificioUser');

	Route::get('empresaByUser/{id}','UserController@getEmpresa');
	Route::post('agregaEmpresaUser','UserController@agregaEmpresaUser');
	Route::post('eliminaEmpresaUser','UserController@eliminaEmpresaUser');
	Route::get("obtenerEmpresaUser", "UserController@obtenerEmpresaUser")->name("obtenerEmpresaUser");

	Route::get('administracionByUser/{id}','UserController@getAdministracion');
	Route::post('agregaAdministracionUser','UserController@agregaAdministracionUser');
	Route::post('eliminaAdministracionUser','UserController@eliminaAdministracionUser');
	Route::get("obtenerAdministracionUser", "UserController@obtenerAdministracionUser")->name("obtenerAdministracionUser");

	Route::get('corredorByUser/{id}','UserController@getCorredor');
	Route::post('agregaCorredorUser','UserController@agregaCorredorUser');
	Route::post('eliminaCorredorUser','UserController@eliminaCorredorUser');
	Route::get("obtenerCorredorUser", "UserController@obtenerCorredorUser")->name("obtenerCorredorUser");

	Route::get("encomiendas/show/{id}", "EncomiendaController@show");
	Route::get("encomienda/mostrar/{id}", "EncomiendaController@getEncomienda")->name('encomienda');
	Route::get("encomienda/mostrar", "EncomiendaController@obtenerEncomienda")->name('encomienda.mostrar');
	Route::get("edificio/mostrar", "BuildingController@obtenerEdificio")->name('edificio.mostrar');
	Route::post("encomienda/update/{id}", "EncomiendaController@update");
	Route::post("encomienda/updateStatus/{id}", "EncomiendaController@updateStatus");


	Route::get("fullcalender", "BuildingController@fullCalendar")->name("fullcalendar");
	Route::get('/document/download/{id}', 'BuildingController@download')->middleware('auth');
	Route::get('/document/download/asamblea/{id}', 'BuildingController@downloadAsamblea')->middleware('auth');

	Route::get("usuario/update/{id}", "UserController@update")->name("usuario.update");
	Route::get("obtenerEdificioUser", "UserController@obtenerEdificioUser")->name("obtenerEdificioUser");

	Route::get("reservaEspacio.buscar.espacio/reservaEspacio.show/{id}", "ReservaEspacioController@show");
	Route::get("reservaEspacio.mostrar/{id}", "ReservaEspacioController@mostrarReserva")->name("reservaEspacio.mostrar");
	Route::post("reservaEspacio.update/{id}", "ReservaEspacioController@update")->name("reservaEspacio.update");
	Route::get("reservaEspacio.destroy/{id}", "ReservaEspacioController@destroy")->name("reservaEspacio.destroy");
	Route::get("reservaEspacio.buscar.espacio/{id}", "ReservaEspacioController@showEspacio")->name("reservaEspacio.buscar.espacio");
	Route::get("buscarEspacio/{id}", "ReservaEspacioController@getEspacio")->name("buscarEspacio");
	Route::get("reservaEspacio.createEdificio/{id}", "ReservaEspacioController@createEdificio")->name("reservaEspacio.createEdificio");
	Route::post("reservaEspacio.save", "ReservaEspacioController@save")->name("reservaEspacio.save");
	Route::get("reservaEspacioPorEdificio", "ReservaEspacioController@getReserva")->name("reservaEspacioPorEdificio");
	Route::post("reserva/updateStatus/{id}", "ReservaEspacioController@updateStatus");


	Route::get("getDetailsAdmin/{id}", "AdministracionController@getDetailsAdmin");

	Route::get("gastos_mayordomo_edificio/{id}", "BuildingController@gastosMayordomoEdificio");
	Route::post("edificios.createGasto", "BuildingController@createGasto")->name("edificios.createGasto");
	Route::get("downloadBoleta/{id}", "BuildingController@downloadBoleta")->name("downloadBoleta");
	Route::get("downloadBoleta2/{id}", "BuildingController@downloadBoleta2")->name("downloadBoleta2");
	Route::get("downloadBoletaDpto/{id}", "BuildingController@downloadBoletaGrande")->name("downloadBoletaDpto");
	Route::get("deleteGasto/{id}", "BuildingController@deleteGasto")->name("deleteGasto");
	Route::post("edificios.updateGasto", "BuildingController@updateGastoEdificio")->name("edificios.updateGasto");
	Route::get("getGasto/{id}", "BuildingController@getGasto")->name("getGasto");

	Route::get("gastos_comunes_edificio/{id}", "BuildingController@gastoComunEdificio");
	Route::post("edificios.createGastoComun", "BuildingController@createGastoComun")->name("edificios.createGastoComun");
	Route::get("getGastoComun/{id}", "BuildingController@getGastoComun")->name("getGastoComun");
	Route::post("edificios.updateGastoComun", "BuildingController@updateGastoComun")->name("edificios.updateGastoComun");
	Route::get("deleteGastoComun/{id}", "BuildingController@deleteGastoComun")->name("deleteGastoComun");

	//GRAFICOS
	Route::get("GastoPromedio/{id}", "BuildingController@GastoPromedio")->name("GastoPromedio");
	Route::get("GastoDiasEdificio/{id}", "BuildingController@GastoDiasEdificio")->name("GastoDiasEdificio");
	Route::get("getFrecuenciaRecambioEdificio/{id}", "BuildingController@FrecuenciaRecambioEdificio")->name("getFrecuenciaRecambioEdificio");

	Route::get("gastos_comunes_dias_edificio/{id}", "BuildingController@gastoComunEdificioDia");
	Route::post("edificios.createGastoComunDia", "BuildingController@createGastoComunDia")->name("edificios.createGastoComunDia");
	Route::post("edificios.createGastoComunDia", "BuildingController@createGastoComunDia")->name("edificios.createGastoComunDia");
	Route::get("getGastoComunDia/{id}", "BuildingController@getGastoComunDia")->name("getGastoComunDia");
	Route::post("edificios.updateGastoComunDia", "BuildingController@updateGastoComunDia")->name("edificios.updateGastoComunDia");
	Route::get("deleteGastoComunDia/{id}", "BuildingController@deleteGastoComunDia")->name("deleteGastoComunDia");
	//FRECUENCIA 
	Route::get("frecuencia_recambio/{id}", "BuildingController@frecuenciaRecambio");
	Route::post("edificios.createFrecuenciaRecambio", "BuildingController@createFrecuenciaRecambio")->name("edificios.createFrecuenciaRecambio");
	Route::get("getFrecuenciaRecambio/{id}", "BuildingController@getFrecuenciaRecambio")->name("getFrecuenciaRecambio");
	Route::post("edificios.updateFrecuenciaRecambio", "BuildingController@updateFrecuenciaRecambio")->name("edificios.updateFrecuenciaRecambio");
	Route::get("deleteFrecuenciaRecambio/{id}", "BuildingController@deleteFrecuenciaRecambio")->name("deleteFrecuenciaRecambio");

	//calificacion
	 Route::get("calificacionAdministracion/{id}", "BuildingController@calificacionAdministracion");
	 Route::post("edificios.createAdmCalificacion", "BuildingController@createAdmCalificacion")->name("edificios.createAdmCalificacion");
	Route::get("getAdmCalificacion/{id}", "BuildingController@getAdmCalificacion")->name("getAdmCalificacion");
	Route::post("edificios.updateAdmCalificacion", "BuildingController@updateAdmCalificacion")->name("edificios.updateAdmCalificacion");
	Route::get("deleteAdmCalificacion/{id}", "BuildingController@deleteAdmCalificacion")->name("deleteAdmCalificacion");

	//calificacion personal
	 Route::get("calificacionPersonal/{id}", "BuildingController@calificacionPersonal");
	 Route::post("edificios.createPersonalCalificacion", "BuildingController@createPersonalCalificacion")->name("edificios.createPersonalCalificacion");
	Route::get("getPersonalCalificacion/{id}", "BuildingController@getPersonalCalificacion")->name("getPersonalCalificacion");
	Route::post("edificios.updatePersonalCalificacion", "BuildingController@updatePersonalCalificacion")->name("edificios.updatePersonalCalificacion");
	Route::get("deletePersonalCalificacion/{id}", "BuildingController@deletePersonalCalificacion")->name("deletePersonalCalificacion");

	Route::get("anuncio/create/{id}", "AnuncioController@create")->name("anuncio.create");
	Route::get("getAnuncio/{id}", "AnuncioController@getAnuncio")->name("getAnuncio");
	Route::post("anuncio/update/{id}", "AnuncioController@update")->name("anuncio/update");
	Route::post("sendEmail", "AnuncioController@sendEmail")->name("sendEmail");
	Route::get("anuncio/delete/{id}", "AnuncioController@destroy")->name("anuncio.delete");

	Route::get("getEdificio/{id}", "BuildingController@getEdificio")->name("getEdificio");
	Route::get("getAllAnuncios", "AnuncioController@getAllAnuncios")->name("getAllAnuncios");

	Route::get("corredorByComuna/{id}", "CorredorController@corredorByComuna")->name("corredorByComuna");
	Route::post("addComunaForCorredor", "CorredorController@addComunaForCorredor")->name("addComunaForCorredor");
	Route::get("obtenerComunaCorredor", "CorredorController@obtenerComunaCorredor")->name("obtenerComunaCorredor");
	Route::post("eliminaComunaCorredor", "CorredorController@eliminaComunaCorredor")->name("eliminaComunaCorredor");

	Route::post("addComunaForNewCorredor", "CorredorController@addComunaForNewCorredor")->name("addComunaForNewCorredor");
	Route::get("obtenerComunaNewCorredor", "CorredorController@obtenerComunaNewCorredor")->name("obtenerComunaNewCorredor");

	Route::get("obtenerAdminRegion/{id}", "RegionController@obtenerRegion")->name("obtenerAdminRegion");
	Route::get("obtenerAdminComuna/{id}", "CommuneController@obtenerComuna")->name("obtenerAdminComuna");
	Route::get("countComunaCorredor", "CorredorController@countComunaCorredor")->name("countComunaCorredor");

	Route::get("empresaByComuna/{id}", "EmpresaExternaController@empresaByComuna")->name("empresaByComuna");
	Route::post("addComunaForEmpresa", "EmpresaExternaController@addComunaForEmpresa")->name("addComunaForEmpresa");
	Route::get("obtenerComunaEmpresa", "EmpresaExternaController@obtenerComunaEmpresa")->name("obtenerComunaEmpresa");
	Route::post("eliminaComunaEmpresa", "EmpresaExternaController@eliminaComunaEmpresa")->name("eliminaComunaEmpresa");
	Route::get("countComunaEmpresa", "EmpresaExternaController@countComunaEmpresa")->name("countComunaEmpresa");

	Route::get("getAllTipologia/{id}", "TipologiaController@getAlltipologia")->name("getAllTipologia");
	Route::get("edificioTipologia.edit/{id}", "EdificioTipologiaController@edit")->name("edificioTipologia.edit");
	Route::post("edificioTipologiaUpdate/{id}", "EdificioTipologiaController@update")->name("edificioTipologiaUpdate");
	Route::post("edificioCrearTipologia", "EdificioTipologiaController@store")->name("edificioCrearTipologia");

});


Route::match(['get', 'post'], '/botman', 'BotManController@handle');