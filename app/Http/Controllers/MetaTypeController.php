<?php

namespace App\Http\Controllers;

use App\adm_dataType as DataType;
use App\MetaType;
use App\adm_modulos as Modulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MetaTypeController extends Controller
{
    private $dataType;
    private $metaType;
    private $modulos;


    public function __construct(DataType $dataType,MetaType $metaType,Modulos $modulos)
    {
        $this->dataType = $dataType;
        $this->metaType = $metaType;
        $this->modulos  = $modulos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaTypes = $this->metaType->all();
        $modulos   = $this->modulos->pluck('modulo','id');
        $dataTypes  = $this->dataType->pluck('type','id');
        return view('pages.metaType.index',compact('metaTypes','modulos','dataTypes'));
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
        $this->metaType->create($request->all());
        Session::flash('message-success',' MetaType creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MvType  $mvType
     * @return \Illuminate\Http\Response
     */
    public function show(MetaType $metaType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MvType  $mvType
     * @return \Illuminate\Http\Response
     */
    public function edit(MetaType $metaType)
    {
        return response()->json($metaType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MvType  $mvType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetaType $metaType)
    {
        $metaType->update($request->all());
        Session::flash('message-success',' MetaList actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MvType  $mvType
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetaType $metaType)
    {
        $metaType->delete();
        Session::flash('message-success',' Mv Type eliminado correctamente.');
    }
    
}
