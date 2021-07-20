<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\adm_modulos;

class ModuleController extends Controller
{
    public function index()
    {
        $modules=adm_modulos::all();
        return view('pages.modules.index',compact('modules')); 
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
        //dd($request->all());

        $data = $request->all();         
        $modulo = adm_modulos::create($data);
        return response()->json(['message'=>'DataType registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(adm_modulos $modulo)
    {
 
        return response()->json($modulo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(adm_modulos $modulo)
    {
        return response()->json($modulo);
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
        $dataType = adm_modulos::find($id);
        $data = $request->all();
        $dataType->update($data);
        $dataType->save();
        return response()->json(['message'=>'Modulo actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
