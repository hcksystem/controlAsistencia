<?php

namespace App\Http\Controllers;

use App\MetaList;
use App\MetaType;
use Illuminate\Http\Request;
use Session;
use Redirect;

class MetaListController extends Controller
{
    private $metaType;
    private $metaList;

    public function __construct(MetaList $metaList, MetaType $metaType)
    {
       
        $this->metaType    = $metaType->get()->pluck('campo','id');
        $this->metaList     = $metaList->all();
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
     
      return view('pages.metaList.index',compact('metaType', 'metaList'));
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
        $metaList = new MetaList;
        $data = $request->all();
        $metaList = MetaList::create($data);
        Session::flash('message-success',' Lista '. $request->metaListValue.' creada correctamente.');
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


    public function showMetaList($id)
    {
        //
        $metaList = MetaList::where('metaTypeID',$id)->pluck('metaListValue','id');
        return response()->json($metaList);
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
        $meta = $this->metaList->find($id);
        $meta->update($request->all());
        $meta->save();
        Session::flash('message-success',' MetaList '. $request->name.' editada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meta = $this->metaList->find($id);
        $meta->delete();
        Session::flash('message-success',' MetaList elminada correctamente.');
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
