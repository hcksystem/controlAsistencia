<?php

namespace App\Http\Controllers;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Requests\Region\regionRequest;
use Session;
use Redirect;

class RegionController extends Controller
{
  private $region;

  public function __construct(region $region)
  {
      $this->region = $region;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = $this->region->all();
        return view('pages.region_communes.region.index',compact('countries'));
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
    public function store(regionRequest $request)
    {
        $this->region->create($request->all());
        Session::flash('message-success',' region '. $request->name.' creado correctamente.');
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
    public function edit(region $region)
    {
      return view('pages.region_communes.region.edit',compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(regionRequest $request, $id)
    {
        $region = $this->region->find($id);
        $region->update($request->all());
        $region->save();
        Session::flash('message-success',' region '. $request->name.' editado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(region $region)
    {
      $region->delete();
      Session::flash('message-success',' region '. $region->name.' eliminado correctamente.');
    }

     public function obtenerRegion($id)
    {
     $region = Region::where('id',$id)->value('name');
      return response()->json($region);
    }
}
