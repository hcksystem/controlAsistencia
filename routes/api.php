<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('shipTotals',function(){
    return datatables()
    ->collection(App\OperationShipTotal::all()->where('operation_id',10))
    ->addColumn('btn','pages.operation.shipTotal.partials.actions')
    ->rawColumns(['btn'])
    ->toJson();
});
