<?php

namespace App\Http\Controllers;

use App\MetaData;
use App\MetaType;
use App\Building;
use Illuminate\Http\Request;
use Session;
use Redirect;

class MetaDataController extends Controller
{
    private $meta;
    private $account;
    private $buildings;
    private $metaTypes;

    public function __construct(MetaData $meta, Building $building, MetaType $metaType)
    {
        $this->meta         = $meta;
        $this->building      = $building;
        $this->buildings     = $building->get()->pluck('name','id');
        $this->metaTypes    = $metaType->get()->where('active',1)->pluck('metatype','id');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $buildings    = $this->buildings;
      $metaTypes    = $this->metaTypes;
      $metas        = $this->meta->all();
      $operator     = true;
      $type         = true;
      return view('pages.building.buildingMeta.index',compact('metas', 'buildings', 'metaTypes','operator','type'));
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
        $this->meta->create($request->all());
        Session::flash('message-success',' building Meta '. $request->name.' creada correctamente.');
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
    public function edit($id)
    {
        $meta       = $this->meta->find($id);
        $buildings   = $this->buildings;
        $metaTypes  = $this->metaTypes;
        $operator   = true;
        $type       = true;
        $topMenu    = 'pages.building.headbar';
        return view('pages.building.buildingMeta.edit',compact('meta','accounts','metaTypes','operator','type','topMenu'));
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
        $meta = $this->meta->find($id);
        $meta->update($request->all());
        $meta->save();
        Session::flash('message-success',' Account Meta '. $request->name.' editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meta = $this->meta->find($id);
        $meta->delete();
        Session::flash('message-success',' Account Meta elminada correctamente.');
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
}
