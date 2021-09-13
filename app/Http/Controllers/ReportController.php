<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asistencia;
use App\Models\Assignment;
use App\Models\Turn;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencia = Asistencia::orderBy('fecha','DESC')->get();
        return view('pages.report.index',compact('asistencia'));
    }

    public function report_jornada(){

        $asistencia = Asistencia::leftjoin('users as us','asistencias.id_user','us.id')
                                ->leftjoin('asignaciones as asig','us.id','asig.user_id')
                                ->leftjoin('planificador as pl','asig.planner_id','pl.id')
                                ->leftjoin('asistencias as asis','us.id','asis.id_user')
                                ->select('pl.planificacion','pl.id as id','asig.since as since','asig.until as until','us.fullname as first_name',
                                'us.last_name as last_name','us.rut as rut','pl.planificacion as planificacion','asis.fecha as fecha')
                                ->orderBy('fecha','DESC')
                                ->get();
        $primer = Assignment::first();
        $ultimo = Assignment::orderBy('id', 'desc')->first();
        $inicio = strtotime($primer->since);
        $final = strtotime($ultimo->until);
        //dd($final);
        $turns = Turn::all();
        foreach($asistencia as $a){
            foreach(array($a->planificacion) as $pl){
                foreach($turns as $t){
                    if($t->id == $pl){
                        $a['ingreso'] = $t->ingreso;
                        $a['salida'] = $t->salida;
                    }
                }
            }
        }

        //dd($asistencia);
        return view('pages.report.jornada',compact('asistencia','inicio','final'));
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
        //
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
        //
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
