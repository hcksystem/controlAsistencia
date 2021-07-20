<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DataType\CreateRequest;
use App\Http\Requests\DataType\updateRequest;
use App\adm_dataType;

class dataTypeController extends Controller
{
    public function index()
    {
        $dataType=adm_dataType::all();
        return view('pages.dataType.index',compact('dataType')); 
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
    public function store(CreateRequest $request)
    {
        //dd($request->all());

        $data = $request->all();         
        $dataType = adm_dataType::create($data);
        return response()->json(['message'=>'DataType registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(adm_dataType $dataType)
    {
 
        return response()->json($dataType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(adm_dataType $documentsType)
    {
        return response()->json($dataType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        $dataType = adm_dataType::find($id);
        $data = $request->all();
        $dataType->update($data);
        $dataType->save();
        return response()->json(['message'=>'Document Type actualizado correctamente']);
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
