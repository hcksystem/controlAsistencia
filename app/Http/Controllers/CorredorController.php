<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Corredor; 
use App\Commune; 
use App\Region; 
use Session;
use Redirect,Response;
use DB;

class CorredorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->hasRole('super') || Auth::user()->hasRole('copro')){
          $corredores = Corredor::all();
       }else{
            $corr = DB::table('adm_usuarios_corredores')->where('id_usuario','=',Auth::user()->id)->pluck('id_corredor');
            $corredores = Corredor::whereIn('id',$corr)->get();
       }
        
        $comunas = DB::table('adm_corredor_comuna as coco')
        ->leftjoin('vcomunas as vc','coco.id_comuna','=', 'vc.id_comuna')
        ->select('vc.commune','vc.id_comuna','coco.id_corredor')
        ->get();
        return view('pages.corredor.index',compact('corredores','comunas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $comunas = DB::table('vcomunas')->get()->sortBy('commune')->pluck('commune','id_comuna')->prepend('Seleccione...','');
         return view('pages.corredor.create',compact('comunas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $validator = Validator::make($request->all(), [ // <---
            'nombre' => 'required',
        ]);

         if ($validator->fails()) {
            return back()
                   ->withErrors($validator)
                   ->withInput();
        }

        //dd($request->all());
         $corredor = new Corredor;

         $corredor->nombre = $request->nombre;
         $corredor->telefono = $request->telefono;
         $corredor->contacto = $request->contacto;
         $corredor->identificacion = $request->identificacion;
         $corredor->direccion = $request->direccion;
         $corredor->descripcion = $request->descripcion;
         $corredor->cant_ciudades = $request->cant_ciudades;
         
         $data = Corredor::latest('id')->first();

         if(is_null($data)){
            $corredorId = 1;
           
        }else{
            $corredorId = $data->id+1;
        }
         
            if($request->hasfile('logo') == TRUE){
            
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                
                $filename = $corredorId. '.' . $extension;
                
                $path = public_path().'/img/AccountLogos/';
                $file->move($path, $filename);
                $corredor->logo = $filename;

            }else{

                $filename = 'default.jpg';
                $corredor->logo = $filename;
            }
           
          
            $corredor->save();   
       
     
       
         $corredores = Corredor::latest('id')->first();
         $corr = Corredor::find($corredores->id);

         $comunas = $request->comunas;
         $array = explode(",", $comunas);
         foreach($array as $com){
            $user = DB::insert('insert into adm_corredor_comuna (id_corredor, id_comuna) values (?, ?)', [$corredores->id, $com]);
         }

         Session::flash('message-success','Corredor '. $request->nombre.' creado correctamente.');
         return redirect()->route('corredor.show',$corr->id);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corredor = Corredor::find($id);
        $comunas = DB::table('vcomunas')->get()->sortBy('commune')->pluck('commune','id_comuna')->prepend('Seleccione...','');
        $cant_ciudades = DB::table('adm_corredor_comuna')->where('id_corredor', $id)->count();
         return view('pages.corredor.edit',compact('corredor','comunas','cant_ciudades'));
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
        
         $validator = Validator::make($request->all(), [ // <---
            'nombre' => 'required',
        ]);

         if ($validator->fails()) {
            return back()
                   ->withErrors($validator)
                   ->withInput();
        }


        $corredor = Administracion::find($id);
     
        $corredor->nombre = $request->nombre;
        $corredor->telefono = $request->telefono;
        $corredor->contacto = $request->contacto;
        $corredor->identificacion = $request->identificacion;
        $corredor->direccion = $request->direccion;
        $corredor->descripcion = $request->descripcion;
        $corredor->region_id = $request->region_id;
        $corredor->comuna_id = json_encode($request->comuna_id);
        $corredor->cant_ciudades = $request->cant_ciudades;
        
        $corredorId = $corredor->id;
           
            if($request->hasfile('logo') == TRUE){
            
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                
                $filename = $corredorId. '.' . $extension;
                
                $path = public_path().'/img/AccountLogos/';
                $file->move($path, $filename);
                $corredor->logo = $filename;

            }else{

                $filename = 'default.jpg';
                $corredor->logo = $filename;
            }
           
          
        $corredor->save();   

        $corredores = Corredor::all();
        Session::flash('message-success','Corredor '. $request->nombre.' editado correctamente.');
        return view('pages.corredor.index',compact('corredores'));
    }

     public function updateCorredor(Request $request, $id)
    {
        //dd($request->all());
        $corredor = Corredor::find($id);
    
        $corredor->nombre = $request->nombre;
        $corredor->telefono = $request->telefono;
        $corredor->contacto = $request->contacto;
        $corredor->identificacion = $request->identificacion;
        $corredor->direccion = $request->direccion;
        $corredor->descripcion = $request->descripcion;
        $corredor->region_id = $request->region_id;
        $corredor->comuna_id =  json_encode($request->comuna_id);
        $corredor->cant_ciudades = $request->cant_ciudades;

        $corredorId = $corredor->id;
           
        $ruta = $corredor->logo;
        $default = "default.jpg";
            //dd($ruta);
            
         if(($request->hasfile('logo') == TRUE) && ($ruta == $default)){
             
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
               
                $filename = $corredor->id. '.' . $extension;
              
                $path = public_path().'/img/AccountLogos/';
                $file->move($path, $filename);
                $corredor->logo = $filename;

                }elseif(($request->hasfile('logo') == TRUE) && ($ruta != $default)){

                     $file = $request->file('logo');
                    $extension = $file->getClientOriginalExtension();
                   
                    $filename = $corredor->id. '.' . $extension;
                   
                    $path = public_path().'/img/AccountLogos/';
                    $file->move($path, $filename);
                    $corredor->logo = $filename;
                }elseif(($request->hasfile('logo') == FALSE) && ($ruta == null)){

                     
                    $filename = 'default.jpg';
                   
                    $corredor->logo = $filename;
                }elseif(($request->hasfile('logo') == FALSE) && ($ruta != '')){
                  
                    $corredor->logo = $ruta;
                }else{
                    $corredor->logo = $ruta;
                }

          
            $corredor->save();   

        return response()->json($corredor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $corredor = Corredor::find($id);
        $corredor->delete();
        return response()->json(['message'=>'Corredor eliminado correctamente']);
    }

    public function corredorByComuna($id)
    {
        
        $data = DB::table('adm_corredor_comuna as coco')
            ->leftjoin('vcomunas as vc','coco.id_comuna','=', 'vc.id_comuna')
            ->leftjoin('adm_corredores as corr','coco.id_corredor','=', 'corr.id')
            ->select('vc.commune','vc.id_comuna')
            ->where('corr.id',$id)
            ->get();


        return datatables()->of($data)->toJson();

    }

    public function addComunaForCorredor(Request $request){

        $user = DB::insert('insert into adm_corredor_comuna (id_corredor, id_comuna) values (?, ?)', [$request->id_corredor, $request->id_comuna]);
    }

     public function obtenerComunaCorredor(Request $request){
       
        $comunas = DB::table('adm_corredor_comuna')->where('id_comuna','=',$request->id_corredor)->pluck('id_comuna');
        $corredores = DB::table('vcomunas')->whereNotIn('id',$comunas)->get()->pluck('commune', 'id_comuna');
        return response()->json($corredores);  
    }

    public function eliminaComunaCorredor(Request $request){

        $user = DB::table('adm_corredor_comuna')->where('id_corredor', $request->id_corredor)->where('id_comuna', $request->id_comuna)->delete();
    }

     public function addComunaForNewCorredor(Request $request){

            $data = DB::table('vcomunas as vc')
            ->select('vc.commune','vc.id_comuna')
            ->whereIn('vc.id_comuna',$request->comuna)
            ->get();

        return datatables()->of($data)->toJson();
    }

    public function obtenerComunaNewCorredor(Request $request){

        $corredores = DB::table('vcomunas')->whereNotIn('id_comuna',$request->comuna)->get()->sortBy('commune')->pluck('commune', 'id_comuna');
        return response()->json($corredores);  
    }

    public function countComunaCorredor(Request $request){

        $corredores = DB::table('adm_corredor_comuna')->where('id_corredor', $request->id)->count();
        return response()->json($corredores);  
    }
}
