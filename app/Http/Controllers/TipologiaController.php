<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipologia;
use App\EdificioTipologia;
use DataTables;
use DB;

class TipologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipologia = Tipologia::all();
      return view('pages.tipologia.index',compact('tipologia'));
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
        $dataType = Tipologia::create($data);
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
         $tipo = Tipologia::find($id);
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
         $tipo = Tipologia::find($id);
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
        $tipo = Tipologia::find($id);
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
        $tipo = Tipologia::find($id);
        $tipo->delete();
        return response()->json(['message'=>'Tipología eliminado correctamente']);
    }

    public function getAllTipologia($id)
    {
        $tipologia  = DB::table('adm_edificios_tipologias as c') 
        ->leftjoin('adm_tipologias as a','c.id_tipologia','=','a.id')
        ->select('c.id','a.tipologia','c.cantidad')->where('c.id_edificio',$id)->get();
        $data = [];
        foreach ($tipologia as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'id_tipologia' => $each->tipologia,
            'cantidad' => $each->cantidad
            ];
        } 

        return datatables()->of($data)->toJson();
        
    }
}
