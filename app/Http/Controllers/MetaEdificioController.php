<?php

namespace App\Http\Controllers;

use App\MetaEdificio;
use App\MetaType;
use Illuminate\Http\Request;
use Session;
use Redirect;

class MetaEdificioController extends Controller
{
    private $metaType;
    private $metaEdificio;

    public function __construct(MetaEdificio $metaEdificio, MetaType $metaType)
    {
       
        $this->metaType    = $metaType->get()->pluck('campo','id');
        $this->metaEdificio = $metaEdificio->all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $metaType    = $this->metaType;
      $metaList     = $this->metaList;
     
      return view('pages.metaEdificio.index',compact('metaType', 'metaList'));
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
        $metaEdificio = new MetaEdificio;
        $data = $request->all();
        $metaEdificio = MetaEdificio::create($data);
        //Session::flash('message-success',' MetaEdificio '. $request->value.' creada correctamente.');
        return Response()->json($request->all());
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
    public function edit(MetaList $metaList)
    {
        return response()->json($metaList);
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
        $meta = $this->metaEdificio->find($id);
        $meta->update($request->all());
        $meta->save();
        //Session::flash('message-success',' MetaEdificio '. $request->value.' editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meta = $this->metaEdificio->find($id);
        $meta->delete();
        //Session::flash('message-success',' MetaEdificio elminada correctamente.');
    }

    /**
     * [Edit meta asociated from building]
     * @param  [type] $meta    [description]
     * @param  [type] $building [description]
     * @return [type]          [description]
     */
    public function metaEdit($meta, $building)
    {
        $meta       = $this->meta->find($meta);
        $buildings   = $this->buildings;
        $metaTypes  = $this->metaTypes;
        $building    = $this->building->find($building);
        $topMenu    = 'pages.accountOperator.headbar';
        $title      = 'Details';
        return view('pages.accountOperator.accountMeta.edit',compact('meta','accounts','metaTypes','account','topMenu','title'));
    }

    public function allMetaEdificio()
    {
        $metaEdificio     = $this->metaEdificio;
        return response()->json($metaEdificio);
    }
}
