<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Anuncio; 
use App\Concepto;
use App\Building;  
use Session;
use Redirect,Response;
use DB;
use App\MySendMail;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
         $conceptos = Concepto::get()->pluck('nombre','id')->prepend('Seleccione un servicio');
         $estatus = DB::table('adm_anuncio_status')->pluck('nombre','id')->prepend('Seleccione..','');
         $building = Building::find($id);
         $date = \Carbon\Carbon::now();
         $date = date("d/m/Y", strtotime($date));

         return view('pages.building.anuncio.create',compact('conceptos','estatus','building','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $date = str_replace('/', '-', $request->fecha_anuncio);
       $fecha_anuncio = date('Y-m-d', strtotime($date));
       $id = $request->id_edificio;
       $data = $request->all();
       $data['creado_por'] = Auth::user()->id;
       $data['fecha_anuncio'] = $fecha_anuncio;
      
       Anuncio::create($data);

       return redirect::route('anuncio.show',array('id' =>$id)); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $anuncios = Anuncio::where('id_edificio',$id)->paginate(100);
        $building = Building::find($id);
        return view('pages.building.anuncio.show',compact('building'),['anuncios' => $anuncios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $anuncio = Anuncio::find($id);
         $conceptos = Concepto::get()->pluck('nombre','id')->prepend('Seleccione un servicio');
         $estatus = DB::table('adm_anuncio_status')->pluck('nombre','id')->prepend('Seleccione..','');
         $building = Building::find($anuncio->id_edificio);
         return view('pages.building.anuncio.edit',compact('conceptos','estatus','building','anuncio'));
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
        $date = str_replace('/', '-', $request->fecha_anuncio);
        $fecha_anuncio = date('Y-m-d', strtotime($date));
        $anuncio = Anuncio::find($id);
        $data = $request->all();
        $data['fecha_anuncio'] = $fecha_anuncio;
        $anuncio->update($data);

        $id = $request->id_edificio;
        return redirect::route('anuncio.show',array('id' =>$id)); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $anuncio = Anuncio::find($id);
       $anuncio->delete();

    }

     public function sendEmail(Request $request)
    {

       $data = $request->all();

        $student_detail = [
        'nombre' => $request->nombre,
        'empresa' => $request->empresa,
        'telefono' => $request->telefono,
        'mensaje' => $request->mensaje,
        'name_edificio' => $request->name_edificio,
        'id_anuncio' => $request->id_anuncio,
        'nombre_solicitante' => $request->nombre_solicitante
        ];
        Mail::to($request->correo)->send(new MySendMail($student_detail));
          if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
          }else{
            return response()->json('Yes, You have sent email to GMAIL from LARAVEL !!');
          }
    }

    public function getAllAnuncios()
    {

    if(Auth::user()->hasRole('super') || Auth::user()->hasRole('admin')){
    
      $anuncios = Anuncio::leftjoin('adm_categoria_empresas_ext as cat','adm_edificios_anuncios.id_servicio','=','cat.id_concepto')
      ->leftjoin('adm_usuarios_empresas_ext as emp','cat.id_empresa','=','emp.id_empresa')
      ->select('adm_edificios_anuncios.*')
      ->paginate(100);
    }else{
        
      $anuncios = Anuncio::leftjoin('adm_categoria_empresas_ext as cat','adm_edificios_anuncios.id_servicio','=','cat.id_concepto')
      ->leftjoin('adm_usuarios_empresas_ext as emp','cat.id_empresa','=','emp.id_empresa')
      ->leftjoin('users','emp.id_usuario','=','users.id')
      ->select('adm_edificios_anuncios.*')
      ->where('adm_edificios_anuncios.id_status','1')
      ->where('users.id',Auth::user()->id)
      ->paginate(100);
    }
      return view('pages.building.anuncio.shows',['anuncios' => $anuncios]);
    }

    public function getAnuncio($id)
    {
        $anuncio = Anuncio::find($id);
        $conceptos = Concepto::get()->pluck('nombre','id')->prepend('Seleccione un servicio');
        $estatus = DB::table('adm_anuncio_status')->pluck('nombre','id')->prepend('Seleccione..','');
        $building = Building::find($anuncio->id_edificio);
        return view('pages.building.anuncio.single',compact('conceptos','estatus','building','anuncio'));
    }
}
