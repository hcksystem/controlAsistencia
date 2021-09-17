<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Asistencia;
use App\Models\Assignment;
use App\Models\Turn;
use DB;

class ReportController extends Controller
{
    public function __construct()
    {
        set_time_limit(8000000);
    }

    public function index()
    {
        $asistencia = Asistencia::orderBy('fecha','DESC')->get();
        return view('pages.report.index',compact('asistencia'));
    }

    public function report_jornada(){

        ini_set('max_execution_time', 300);
        set_time_limit(0);
        $jorn1= DB::table('jornada')->get();
        $primer = Assignment::first();
        $ultimo = Assignment::orderBy('id', 'desc')->first();
        $inicio = strtotime($primer->since);
        $final = strtotime($ultimo->until."+ 1 days");
        $jornada = array();
        $asistencia = array();
        //dd($final);

        //dd($jorn1);
        $jorn1 = json_decode($jorn1, true);
        //dd($jorn1);
        for ($i=0; $i < count($jorn1)-1; $i++) {
            //dd($jorn1[$i]['fecha']);
            if(Carbon::parse($jorn1[$i]['fecha'])->format('d-m-Y') == Carbon::parse($jorn1[$i+1]['fecha'])->format('d-m-Y') && $jorn1[$i]['rut'] == $jorn1[$i+1]['rut']
            && $jorn1[$i]['tipo'] != $jorn1[$i+1]['tipo']){
                $jornada = [
                    'id'=>$jorn1[$i]['id'],
                    'since'=>$jorn1[$i]['since'],
                    'until'=>$jorn1[$i]['until'],
                    'first_name'=>$jorn1[$i]['first_name'],
                    'last_name'=>$jorn1[$i]['last_name'],
                    'user_id'=>$jorn1[$i]['user_id'],
                    'rut'=>$jorn1[$i]['rut'],
                    'planificacion'=>$jorn1[$i]['planificacion'],
                    'fecha'=>$jorn1[$i]['fecha'],
                    'entrada'=>$jorn1[$i+1]['fecha'],
                    'salida'=>$jorn1[$i]['fecha']
                ];
                $asistencia[] = $jornada;

            }

            if(Carbon::parse($jorn1[$i]['fecha'])->format('d-m-Y') != Carbon::parse($jorn1[$i+1]['fecha'])->format('d-m-Y') && $jorn1[$i]['rut'] == $jorn1[$i+1]['rut']
            && $jorn1[$i]['tipo'] == 0){
                $jornada = [
                    'id'=>$jorn1[$i]['id'],
                    'since'=>$jorn1[$i]['since'],
                    'until'=>$jorn1[$i]['until'],
                    'first_name'=>$jorn1[$i]['first_name'],
                    'last_name'=>$jorn1[$i]['last_name'],
                    'user_id'=>$jorn1[$i]['user_id'],
                    'rut'=>$jorn1[$i]['rut'],
                    'planificacion'=>$jorn1[$i]['planificacion'],
                    'fecha'=>$jorn1[$i]['fecha'],
                    'entrada'=>$jorn1[$i]['fecha'],
                    'salida'=>''
                ];
                $asistencia[] = $jornada;

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
