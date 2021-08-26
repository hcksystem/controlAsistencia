<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Planner;
use App\Models\Type_Planner;
use App\Models\Turn;
class PlannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planners = Planner::all();
        return view('pages.planner.index',compact('planners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        switch ($id) {
            case 'seamanal':
                $type = 1;
                break;
            case 'mensual':
                $type = 2;
                break;
            case 'perosnalizado':
                $type = 3;
                break;
            default:
                $type = 1;
                break;
        }
        $turns = Turn::get()->pluck('detalles','id')->prepend('Seleccione...','');
        $types = Type_Planner::get()->pluck('nombre','id')->prepend('Seleccione...','');
        return view('pages.planner.create',compact('turns','types','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $planificacion = array();
        $planificacion = [
            'turno_dia1' => $request->turno_dia1,
            'turno_dia2' => $request->turno_dia2,
            'turno_dia3' => $request->turno_dia3,
            'turno_dia4' => $request->turno_dia4,
            'turno_dia5' => $request->turno_dia5,
            'turno_dia6' => $request->turno_dia6,
            'turno_dia7' => $request->turno_dia7
        ];
    
        $plann = implode(',',$planificacion);
        $planner = new Planner();
        $planner->descripcion = $request->detalles;
        $planner->tipo_planificador = $request->tipo_planificador;
        $planner->Estado = $request->Estado;
        $planner->planificacion = $plann;
        $planner->save();
        return redirect()->route('planificador.index');
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
