<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Administracion; 
use App\Commune; 
use App\Region; 
use Session;
use Redirect,Response;
use DB;

class AdministracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->hasRole('super')){
           $administracion = Administracion::all();
       }else{
            $adm = DB::table('adm_usuarios_administraciones')->where('id_usuario','=',Auth::user()->id)->pluck('id_administracion');
            $administracion = Administracion::whereIn('id',$adm)->get();
       }
       
        return view('pages.administracion.index',compact('administracion'));
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
       return view('pages.administracion.create',compact('communes','regions'));
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


         $admin = new Administracion;

         $admin->nombre = $request->nombre;
         $admin->telefono = $request->telefono;
         $admin->contacto = $request->contacto;
         $admin->presentacion = $request->presentacion;
         $admin->direccion = $request->direccion;
         $admin->region_id = $request->region_id;
         $admin->comuna_id = $request->comuna_id;

         $data = Administracion::latest('id')->first();

         if(is_null($data)){
            $adminId = 1;
           
        }else{
            $adminId = $data->id+1;
        }
         
            if($request->hasfile('url_imagen') == TRUE){
            
                $file = $request->file('url_imagen');
                $extension = $file->getClientOriginalExtension();
                
                $filename = $adminId. '.' . $extension;
                
                $path = public_path().'/img/AccountLogos/';
                $file->move($path, $filename);
                $admin->url_imagen = $filename;

            }else{

                $filename = 'default.jpg';
                $admin->url_imagen = $filename;
            }
           
          
            $admin->save();   
       
     
       
         $administracion = Administracion::latest('id')->first();
         $admin = Administracion::find($administracion->id);
         Session::flash('message-success','Administracion '. $request->nombre.' creado correctamente.');
         return redirect()->route('administraciones.show',$admin->id);
         //return view('pages.administracion.edit',compact('admin'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Administracion::find($id);
        $regions     = Region::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $communes    = Commune::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
         return view('pages.administracion.edit',compact('admin','communes','regions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $admin = Administracion::find($id);
         $regions     = Region::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
         $communes    = Commune::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
         return view('pages.administracion.edit',compact('admin','communes','regions'));
         //return response()->json($admin);
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


        $admin = Administracion::find($id);
     
        $admin->nombre = $request->nombre;
        $admin->telefono = $request->telefono;
        $admin->contacto = $request->contacto;
        $admin->presentacion = $request->presentacion;
        $admin->direccion = $request->direccion;
        $admin->region_id = $request->region_id;
        $admin->comuna_id = $request->comuna_id;
        
        $adminId = $admin->id;
           
            if($request->hasfile('url_imagen') == TRUE){
            
                $file = $request->file('url_imagen');
                $extension = $file->getClientOriginalExtension();
                
                $filename = $adminId. '.' . $extension;
                
                $path = public_path().'/img/AccountLogos/';
                $file->move($path, $filename);
                $admin->url_imagen = $filename;

            }else{

                $filename = 'default.jpg';
                $admin->url_imagen = $filename;
            }
           
          
            $admin->save();   

        $administracion = Administracion::all();
        Session::flash('message-success','Administracion '. $request->nombre.' editado correctamente.');
        return view('pages.administracion.index',compact('administracion'));
    }

     public function updateAdministracion(Request $request, $id)
    {
        //dd($request->all());
        $admin = Administracion::find($id);
    
        $admin->nombre = $request->nombre;
        $admin->telefono = $request->telefono;
        $admin->contacto = $request->contacto;
        $admin->presentacion = $request->presentacion;
        $admin->direccion = $request->direccion;
        $admin->region_id = $request->region_id;
        $admin->comuna_id = $request->comuna_id;
        
        $adminId = $admin->id;
           
        $ruta = $admin->url_imagen;
        $default = "default.jpg";
            //dd($ruta);
            
         if(($request->hasfile('url_imagen') == TRUE) && ($ruta == $default)){
             
                $file = $request->file('url_imagen');
                $extension = $file->getClientOriginalExtension();
               
                $filename = $admin->id. '.' . $extension;
              
                $path = public_path().'/img/AccountLogos/';
                $file->move($path, $filename);
                $admin->url_imagen = $filename;

                }elseif(($request->hasfile('url_imagen') == TRUE) && ($ruta != $default)){

                     $file = $request->file('url_imagen');
                    $extension = $file->getClientOriginalExtension();
                   
                    $filename = $admin->id. '.' . $extension;
                   
                    $path = public_path().'/img/AccountLogos/';
                    $file->move($path, $filename);
                    $admin->url_imagen = $filename;
                }elseif(($request->hasfile('url_imagen') == FALSE) && ($ruta == null)){

                     
                    $filename = 'default.jpg';
                   
                    $admin->url_imagen = $filename;
                }elseif(($request->hasfile('url_imagen') == FALSE) && ($ruta != '')){
                  
                    $admin->url_imagen = $ruta;
                }else{
                    $admin->url_imagen = $ruta;
                }

          
            $admin->save();   

        return response()->json($admin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Administracion::find($id);
        $admin->delete();
        return response()->json(['message'=>'Administracion eliminado correctamente']);
    }

    public function getDetailsAdmin($id){

        $admin = Administracion::find($id);
        return response()->json($admin);
    }
}
