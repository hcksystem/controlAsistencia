<?php

namespace App\Http\Controllers;
use App\Commune;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Requests\Commune\communeRequest;
use Session;
use Redirect;
use DB;
use DataTables; 

class CommuneController extends Controller
{
    private $commune;
    private $regions;

    public function __construct(Commune $commune, Region $region)
    {
      $this->commune  = $commune;
      $this->regions  = $region->get()->pluck('name','id'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $communes = Commune::get();
      $regions = region::get()->pluck('name','id');
      return view('pages.region_communes.commune.index',compact('communes','regions'));
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
    public function store(communeRequest $request)
    {
        $this->commune->create($request->all());
        Session::flash('message-success','Comuna '. $request->name.' '.trans('messages.created'));
    }

    public function createCommune(communeRequest $request)
    {
        $this->commune->create($request->all());
        $commune  = commune::get()->pluck('name','id');
        //Session::flash('message-success',' Partner Bank creada correctamente.');
        return response()->json($commune);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $commune = $this->commune->find($id);
         $regions = region::get()->pluck('name','id');
         return view('pages.region_communes.commune.edit',compact('commune','regions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Commune $commune)
    {
        $regions = $this->regions;
        return view('pages.region_communes.commune.edit',compact('commune','regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(communeRequest $request, $id)
    {
        $commune = $this->commune->find($id);
        $commune->update($request->all());
        $commune->save();
        Session::flash('message-success',' Comuna '. $request->name .' '.trans('messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commune $commune)
    {
      $commune->delete();
      Session::flash('message-success',' Comuna '. $commune->name.' ' .trans('messages.deleted'));
    }

    public function destroycommune($id)
    {
      //dd($id);
      $commune = $this->commune->find($id);
      $commune->delete();
      Session::flash('message-success',' Comuna '. $commune->name.' ' .trans('messages.deleted'));
    }

    public function buscarComunas($id)
    {
      $commune = Commune::where('region_id',$id)->orderBy('name')->pluck('name','id')->prepend('Seleccione...','');
      return response()->json($commune);
      
    }

    public function obtenerComuna($id)
    {
     $commune = Commune::where('id',$id)->value('name');
      return response()->json($commune);
    }
  
}
