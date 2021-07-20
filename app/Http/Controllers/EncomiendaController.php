<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect,Response;
use App\Building;
use App\Encomienda;
use App\Status_Encomienda;


class EncomiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $encomiendas  = Encomienda::all();
         $edificios =  Building::pluck('name','id')->prepend('Seleccione..','');
         $status =  Status_Encomienda::pluck('nombre','id')->prepend('Seleccione..','');
         return view('pages.encomiendas.index',compact('encomiendas','edificios','status'));
    }

    public function getEncomienda($id)
    {
         $encomiendas  = Encomienda::where('edificio_id',$id)->where('usuario_id',Auth::user()->id)->get();
         $edificios =  Building::pluck('name','id')->prepend('Seleccione..','');
         $status =  Status_Encomienda::pluck('nombre','id')->prepend('Seleccione..','');
         return view('pages.encomiendas.index',compact('encomiendas','edificios','status'));
    }

        public function obtenerEncomienda(Request $request)
    {
         $id = $request->session()->get('idEdificio');
         $encomiendas  = Encomienda::where('edificio_id',$id)->where('usuario_id',Auth::user()->id)->get();
         $edificios =  Building::pluck('name','id')->prepend('Seleccione..','');
         $status =  Status_Encomienda::pluck('nombre','id')->prepend('Seleccione..','');
         return view('pages.encomiendas.index',compact('encomiendas','edificios','status'));
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
    
       //$request['status_id'] = '1';
       $encomienda = new Encomienda($request->all());
       $encomienda->save();

       Session::flash('message-success','Encomienda '.trans('creado exitosamente'));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encomienda = Encomienda::find($id);
        return response()->json($encomienda);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
         $encomienda = Encomienda::find($id);
         $data = $request->all();
         $encomienda->update($data);
         return response()->json($encomienda);
    }

      public function updateStatus(Request $request, $id)
    {
         $encomienda = Encomienda::find($id);
         $encomienda->status_id = $request->status_id;
         $encomienda->fecha_entrega_recepcion = $request->fecha_entrega_recepcion;
         $encomienda->save();
         return response()->json($encomienda);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encomienda $encomienda)
    {
         $encomienda->delete();
         Session::flash('message-success','Encomienda '.trans('Eliminado exitosamente'));
    }
}
