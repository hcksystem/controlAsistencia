<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EdificioTipologia;

class EdificioTipologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = $request->all();   
        $dataType = EdificioTipologia::create($data);
        return response()->json(['message'=>'Tipología registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $tipo = EdificioTipologia::find($id);
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
        $tipo = EdificioTipologia::find($id);
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
        $tipo = EdificioTipologia::find($id);
        $data = $request->all();
        $tipo->update($data);
        $tipo->save();
        return response()->json(['message'=>'Tipología actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = EdificioTipologia::find($id);
        $tipo->delete();
        return response()->json(['message'=>'Tipología eliminado correctamente']);
    }
}
