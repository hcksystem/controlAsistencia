<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservaEspacio;
use App\Status_Reserva;
use App\Building;
use App\EspacioComun;
use Calendar; 
use Session;
use Redirect,Response;
use DB;

class ReservaEspacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ReservaEspacio::all();
        $events = [];
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $this->obtenerEspacio($value->espacio_id).' '.date("g:i a",strtotime($value->hora_inicio)),
                    $value->hora_inicio,
                    new \DateTime($value->fecha_reserva),
                    new \DateTime($value->fecha_reserva),
                    $value->hora_inicio,
                    // Add color and link on event
                  [
                      'color' =>  $this->obtenerEspacioColor($value->id),
                      'url' => 'reservaEspacio.mostrar/'.$value->id,
                  ]
                );
            }
      }
      //dd($events);
        $calendar = Calendar::addEvents($events);
        $espacios   = EspacioComun::pluck('nombre','id')->prepend('Seleccione..','');
        return view('pages.reserva_espacio.index',compact('calendar','data','espacios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings   = Building::pluck('name','id')->prepend('Seleccione..','');
        $espacios   = EspacioComun::pluck('nombre','id')->prepend('Seleccione..','');
        return view('pages.reserva_espacio.create',compact('buildings','espacios'));
    }


    public function createEdificio($id)
    {
        $buildings   = Building::pluck('name','id')->prepend('Seleccione..','');
        $espacios   =  EspacioComun::where('edificio_id',$id)->pluck('nombre','id')->prepend('Seleccione..','');
        $edificio = Building::find($id);

        return view('pages.reserva_espacio.create_edificio',compact('buildings','espacios','edificio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $reserva = new ReservaEspacio($request->all());
       $reserva->save();

       Session::flash('message-success','Reserva '.trans('creado exitosamente'));
       return redirect::route('reservaEspacio.index'); 
    }

     public function save(Request $request)
    {
       $reserva = new ReservaEspacio($request->all());
       $reserva->save();

       Session::flash('message-success','Reserva '.trans('creado exitosamente'));
       return redirect::route('reservaEspacioPorEdificio'); 
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = ReservaEspacio::find($id);
        $buildings   = Building::pluck('name','id')->prepend('Seleccione..','');
        $espacios   = EspacioComun::pluck('nombre','id')->prepend('Seleccione..','');

        return view('pages.reserva_espacio.show',compact('reserva','buildings','espacios'));
    }

     public function mostrarReserva(Request $request,$id)
    {
        $idEdificio = $request->session()->get('idEdificio');
        $reserva = ReservaEspacio::find($id);
        $buildings   = Building::pluck('name','id')->prepend('Seleccione..','');
        $espacios   =  EspacioComun::where('edificio_id',$reserva->edificio_id)->pluck('nombre','id')->prepend('Seleccione..','');
        $status   = Status_Reserva::pluck('nombre','id')->prepend('Seleccione..','');
        $edificio = Building::find($reserva->edificio_id);

        return view('pages.reserva_espacio.edit',compact('reserva','buildings','espacios','edificio','status'));
    }


       public function showEspacio($id)
    {
        $data = ReservaEspacio::where('espacio_id',$id)->get();
        $events = [];
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $this->obtenerEspacio($value->espacio_id).' '.date("g:i a",strtotime($value->hora_inicio)),
                    $value->hora_inicio,
                    new \DateTime($value->fecha_reserva),
                    null,
                    $value->hora_inicio,
                    // Add color and link on event
                  [
                    'color' =>  $this->obtenerEspacioColor($value->id),
                    'url' => 'reservaEspacio.mostrar/'.$value->id,
                  ]
                );
            }
      }
        $calendar = Calendar::addEvents($events);
        $espacios   = EspacioComun::pluck('nombre','id')->prepend('Seleccione..','');
        return view('pages.reserva_espacio.index',compact('calendar','data','espacios'));
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
        //dd($request->all());
        $data = $request->all();
        $reserva = ReservaEspacio::find($id);
        $reserva->update($data);
        Session::flash('message-success','Reserva '.trans('actualizada exitosamente'));
         if(session()->has('idEdificio')){ 
           return redirect::route('reservaEspacioPorEdificio'); 
        }else{
              return redirect::route('reservaEspacio.index'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = ReservaEspacio::find($id);
        $reserva->delete();
        session::flash('message-success','Reserva '.trans('Eliminado exitosamente'));
        if(session()->has('idEdificio')){ 
           return redirect::route('reservaEspacioPorEdificio'); 
        }else{
              return redirect::route('reservaEspacio.index'); 
        }
        
    }

      public function getEspacio($id)
    {
        $reserva = EspacioComun::where('edificio_id',$id)->pluck('nombre','id')->prepend('Seleccione..','');

        return response()->json($reserva); 
    }

    public function getReserva(Request $request){
        $id = $request->session()->get('idEdificio');
        $data = ReservaEspacio::where('edificio_id',$id)->get();
        $events = [];
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $this->obtenerEspacio($value->espacio_id).' '.date("g:i a",strtotime($value->hora_inicio)),
                    $value->hora_inicio,
                    new \DateTime($value->fecha_reserva),
                    new \DateTime($value->fecha_reserva),
                    $value->hora_inicio,
                    // Add color and link on event
                  [
                    'color' =>  $this->obtenerEspacioColor($value->id),
                    'url' => 'reservaEspacio.mostrar/'.$value->id,
                  ]
                );
            }
      }
        $calendar = Calendar::addEvents($events);
        $espacios   = EspacioComun::where('edificio_id',$id)->pluck('nombre','id')->prepend('Seleccione..','');
        $edificio = Building::find($id);
        return view('pages.reserva_espacio.edificio',compact('calendar','data','espacios','edificio'));
    }

    public function obtenerNombreEdificio($id)
    {
        $name = Building::where('id',$id)->value('name');

        return $name; 
    }

       public function updateStatus(Request $request, $id)
    {
         $reserva = ReservaEspacio::find($id);
         $reserva->id_status = $request->id_status;
         $reserva->save();
         return response()->json($reserva);
    }

    public function obtenerEspacio($id)
    {
        $reserva = EspacioComun::where('id',$id)->value('nombre');

        return $reserva; 
    }

    public function obtenerEspacioColor($id)
    {

        $reserva = ReservaEspacio::where('id',$id)->value('id_status');
        if($reserva == 1){
            $color = '#ff0303';
        }elseif($reserva == 2){
            $color = '#02b535';
        }else{
            $color = '#0033ff';
        }
        return $color; 
    }
}
