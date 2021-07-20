<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Building;
use App\Usuario_Edificio;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if((Auth::user()->hasRole('super')) || (Auth::user()->hasRole('corredor')) || (Auth::user()->hasRole('operador'))){
           return view('pages.dashboard1');
        }else{

            $user =  Auth::user()->id;
            $edificios = Building::leftJoin('adm_usuarios_edificios','buildings.id', '=', 'adm_usuarios_edificios.id_edificio')
            ->where('adm_usuarios_edificios.id_usuario',Auth::user()->id)
            ->pluck('name','id');
     
            return view('login3',compact('edificios','user'));
        }
     
       
    } 
     public function indexByUser(Request $request)
    {
        //dd($request->edificio_id."-".session()->has('idEdificio'));
        if(session()->has('idEdificio')){
            if(isset($request->edificio_id)){
                $edificio = $request->edificio_id;
                $nameEdificio = Building::where('id',$edificio)->value('name');
            }else{ 
                 $edificio = $request->session()->get('idEdificio');
                $nameEdificio = Building::where('id',$edificio)->value('name');
            }
           
        }else{
             $edificio = $request->edificio_id;
             $nameEdificio = Building::where('id',$edificio)->value('name');
        }
       
         $user = $request->user_id;
         config(['app.edificio' => $edificio]);
         session(['idEdificio' => $edificio]);
         session(['nameEdificio' => $nameEdificio]);
         return view('pages.dashboard1',compact('user','edificio'));
      
    }
} 

