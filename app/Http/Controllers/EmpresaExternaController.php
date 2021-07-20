<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Empresa_Externa; 
use App\Commune; 
use App\Region; 
use App\Concepto; 
use Session;
use Redirect,Response;
use DB;

class EmpresaExternaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('super')){
           $empresas = Empresa_Externa::all();  
           $comunas = DB::table('adm_empresa_comuna as coco')
           ->leftjoin('vcomunas as vc','coco.id_comuna','=', 'vc.id_comuna')
           ->select('vc.commune','vc.id_comuna','coco.id_empresa')
           ->get();
           return view('pages.empresa_externa.index',compact('empresas','comunas'));
       }else if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('mayor')){
            $empresas = Empresa_Externa::all(); 
            $comunas = DB::table('adm_empresa_comuna as coco')
            ->leftjoin('vcomunas as vc','coco.id_comuna','=', 'vc.id_comuna')
            ->select('vc.commune','vc.id_comuna','coco.id_empresa')
            ->get();
            return view('pages.empresa_externa.index2',compact('empresas','comunas'));
       }else{
            $emp = DB::table('adm_usuarios_empresas_ext')->where('id_usuario','=',Auth::user()->id)->pluck('id_empresa');
            $empresas = Empresa_Externa::whereIn('id',$emp)->get();
            $comunas = DB::table('adm_empresa_comuna as coco')
            ->leftjoin('vcomunas as vc','coco.id_comuna','=', 'vc.id_comuna')
            ->select('vc.commune','vc.id_comuna','coco.id_empresa')
            ->get();
            return view('pages.empresa_externa.index',compact('empresas','comunas'));
       }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $regions     = Region::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
         $communes    = Commune::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
         $categoria      = Concepto::get()->pluck('nombre','id');
         $comunas = DB::table('vcomunas')->get()->sortBy('commune')->pluck('commune','id_comuna')->prepend('Seleccione...','');
         return view('pages.empresa_externa.create',compact('communes','regions','categoria','comunas'));
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
         $empresa = new Empresa_Externa;

         $empresa->nombre = $request->nombre;
         $empresa->telefono = $request->telefono;
         $empresa->contacto = $request->contacto;
         $empresa->identificacion = $request->identificacion;
         $empresa->trayectoria = $request->trayectoria;
         $empresa->direccion = $request->direccion;
         $empresa->region_id = $request->region_id;
         $empresa->comuna_id = $request->comuna_id;
         $empresa->cant_ciudades = $request->cant_ciudades;


         $data = Empresa_Externa::latest('id')->first();

         if(is_null($data)){
            $empresaId = 1;
           
        }else{
            $empresaId = $data->id+1;
        }
         
            if($request->hasfile('logo') == TRUE){
            
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                
                $filename = $empresaId. '.' . $extension;
                
                $path = public_path().'/img/AccountLogos/';
                $file->move($path, $filename);
                $empresa->logo = $filename;

            }else{

                $filename = 'default.jpg';
                $empresa->logo = $filename;
            }
           
          
            $empresa->save();   
       
        
       
         $empresa = Empresa_Externa::latest('id')->first();


         foreach($request->categoria as $cat){
             DB::insert('insert into adm_categoria_empresas_ext (id_empresa, id_concepto) values (?, ?)', [$empresa->id, $cat]);
         }


         $empresa = Empresa_Externa::find($empresa->id);
         Session::flash('message-success','empresa '. $request->nombre.' creado correctamente.');
         return redirect()->route('empresaExterna.show',$empresa->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa     = Empresa_Externa::find($id);
        $regions     = Region::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $comunas = DB::table('vcomunas')->get()->sortBy('commune')->pluck('commune','id_comuna')->prepend('Seleccione...','');
        $categoria   = Concepto::get()->pluck('nombre','id');
        $selected  = DB::table('adm_categoria_empresas_ext')->where('id_empresa','=',$id)->pluck('id_concepto');
        $cant_ciudades = DB::table('adm_empresa_comuna')->where('id_empresa', $id)->count();
         return view('pages.empresa_externa.edit',compact('empresa','comunas','regions','categoria','selected','cant_ciudades'));
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

       public function updateEmpresa(Request $request, $id)
    {
        //dd($request->all());
        $empresa = Empresa_Externa::find($id);
    
        $empresa->nombre = $request->nombre;
        $empresa->telefono = $request->telefono;
        $empresa->contacto = $request->contacto;
        $empresa->identificacion = $request->identificacion;
        $empresa->direccion = $request->direccion;
        $empresa->region_id = $request->region_id;
        $empresa->comuna_id = $request->comuna_id;
        $empresa->trayectoria = $request->trayectoria;
        $empresa->cant_ciudades = $request->cant_ciudades;
        
        $empresaId = $empresa->id;
           
        $ruta = $empresa->logo;
        $default = "default.jpg";
            //dd($ruta);
            
         if(($request->hasfile('logo') == TRUE) && ($ruta == $default)){
             
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
               
                $filename = $empresa->id. '.' . $extension;
              
                $path = public_path().'/img/AccountLogos/';
                $file->move($path, $filename);
                $empresa->logo = $filename;

                }elseif(($request->hasfile('logo') == TRUE) && ($ruta != $default)){

                     $file = $request->file('logo');
                    $extension = $file->getClientOriginalExtension();
                   
                    $filename = $empresa->id. '.' . $extension;
                   
                    $path = public_path().'/img/AccountLogos/';
                    $file->move($path, $filename);
                    $empresa->logo = $filename;
                }elseif(($request->hasfile('logo') == FALSE) && ($ruta == null)){

                     
                    $filename = 'default.jpg';
                   
                    $empresa->logo = $filename;
                }elseif(($request->hasfile('logo') == FALSE) && ($ruta != '')){
                  
                    $empresa->logo = $ruta;
                }else{
                    $empresa->logo = $ruta;
                }

          
            $empresa->save();   

         $delete = DB::table('adm_categoria_empresas_ext')->where('id_empresa', $empresa->id)->delete();
         foreach($request->categoria as $cat){
             DB::insert('insert into adm_categoria_empresas_ext (id_empresa, id_concepto) values (?, ?)', [$empresa->id, $cat]);
         }

        return response()->json($empresa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa_Externa::find($id);
        $empresa->delete();
        return response()->json(['message'=>'Empresa eliminado correctamente']);
    }

    public function empresaByComuna($id)
    {
        
        $data = DB::table('adm_empresa_comuna as coco')
            ->leftjoin('vcomunas as vc','coco.id_comuna','=', 'vc.id_comuna')
            ->leftjoin('adm_empresas_externas as corr','coco.id_empresa','=', 'corr.id')
            ->select('vc.commune','vc.id_comuna')
            ->where('corr.id',$id)
            ->get();


        return datatables()->of($data)->toJson();

    }

    public function addComunaForEmpresa(Request $request){

        $user = DB::insert('insert into adm_empresa_comuna (id_empresa, id_comuna) values (?, ?)', [$request->id_empresa, $request->id_comuna]);
    }

     public function obtenerComunaEmpresa(Request $request){
       
        $comunas = DB::table('adm_empresa_comuna')->where('id_comuna','=',$request->id_empresa)->pluck('id_comuna');
        $empresas = DB::table('vcomunas')->whereNotIn('id',$comunas)->get()->pluck('commune', 'id_comuna');
        return response()->json($empresas);  
    }

    public function eliminaComunaEmpresa(Request $request){

        $user = DB::table('adm_empresa_comuna')->where('id_empresa', $request->id_empresa)->where('id_comuna', $request->id_comuna)->delete();
    }

     public function addComunaForNewEmpresa(Request $request){

            $data = DB::table('vcomunas as vc')
            ->select('vc.commune','vc.id_comuna')
            ->whereIn('vc.id_comuna',$request->comuna)
            ->get();

        return datatables()->of($data)->toJson();
    }

    public function obtenerComunaNewEmpresa(Request $request){

        $corredores = DB::table('vcomunas')->whereNotIn('id_comuna',$request->comuna)->get()->sortBy('commune')->pluck('commune', 'id_comuna');
        return response()->json($corredores);  
    }

    public function countComunaEmpresa(Request $request){

        $empresas = DB::table('adm_empresa_comuna')->where('id_empresa', $request->id)->count();
        return response()->json($empresas);  
    }
}
