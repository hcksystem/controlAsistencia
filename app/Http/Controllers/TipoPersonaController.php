<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_Contacto;
use Session;
use Redirect,Response;
use DB;

class TipoPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo_Contacto::all();
        return view('pages.tipo_contacto.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = new Tipo_Contacto($request->all());
        $tipo->save();
        Session::flash('message-success','Tipo de Persona '.trans('creado exitosamente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = Tipo_Contacto::find($id);
        return response()->json($tipo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = Tipo_Contacto::find($id);
        return response()->json($tipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipo = Tipo_Contacto::find($id);
        $data = $request->all();
        $tipo->update($data);
        $tipo->save();
        return response()->json(['message'=>'Tipo actualizado correctamente']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = Tipo_Contacto::find($id);
        return response()->json(['message'=>'Rol eliminado correctamente']);
    }
}
