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
	
	Route::resource('grupo','GrupoController');
	Route::resource('posicion','PositionController');

	Route::get('grupo/edit/{id}', 'GrupoController@edit')->name('grupo.edit');
	Route::get('grupo/delete/{id}', 'GrupoController@destroy')->name('grupo.delete');

});


Route::match(['get', 'post'], '/botman', 'BotManController@handle');