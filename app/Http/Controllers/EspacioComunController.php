<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\EspacioComun; 
use App\Building;
use Session;
use Redirect,Response;
use DB;

class EspacioComunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espacios = EspacioComun::all();
        $edificios =  Building::pluck('name','id')->prepend('Seleccione..','');
        return view('pages.espacio_comun.index',compact('espacios','edificios'));
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
       $espacio = new EspacioComun($request->all());
       $espacio->save();

       Session::flash('message-success','Espacio Común '.trans('creado exitosamente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $espacio = EspacioComun::find($id);
         return response()->json($espacio);
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
        $espacio = EspacioComun::find($id);
        $data = $request->all();
        $espacio->update($data);
        $espacio->save();
        return response()->json(['message'=>'Espacio Comùn actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $espacio = EspacioComun::find($id);
        $espacio->delete();
        return response()->json(['message'=>'Espacio Común eliminado correctamente']);
    }
}
