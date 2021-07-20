<?php

namespace App\Http\Controllers;

use App\Http\Requests\Buildings\BuildingRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\adm_dataType;
use App\Arriendo;
use App\Administracion;
use App\MetaType;
use App\MetaEdificio as MetaEdificio;
use App\EdificioTipologia;
use App\MetaList as MetaList;
use App\Asamblea_Documento; 
use App\Edificio_Documento;
use App\Frecuencia_Recambio; 
use App\Building;
use App\Commune; 
use App\Concepto;
use App\Contacto;
use App\Region; 
use App\Recambio;
use App\Demanda;
use App\Deuda;
use App\Calificacion;
use App\Calificacion_Administracion;
use App\Calificacion_Personal;
use App\Gastos;
use App\Gasto_Comun;
use App\Gastos_Dias;
use App\Gastos_Comunes;
use App\Gastos_Fijos;
use App\Tipologia; 
use App\Mantencion; 
use App\Mantencion_Co; 
use App\Tipo_Contacto; 
use App\Asamblea; 
use Session;
use Redirect,Response;
use Illuminate\Http\Request;
use DB;
use DataTables; 
use Calendar;
use App\Http\Requests\Asamblea\asambleaRequest;

class BuildingController extends Controller
{
 
    private $meta;
    private $metaEdificio;
    private $metaType;
    private $regions;
    private $building;
    private $commune;
    public $promedio1 = 0;

    public function __construct(adm_dataType $meta, MetaType $metaType,Region $regions,Building $building, Commune $commune, MetaEdificio $metaEdificio, $promedio1=0)
    {
     
        $this->meta         = $meta;
        $this->metaType     = $metaType->get()->pluck('campo','id');
        $this->metaEdificio = $metaEdificio->all();
        $this->regions      = $regions::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $this->commune      = $commune::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $this->building     = $building->all();
        $this->promedio1    = $promedio1;
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings   = $this->building->all();
        $regions     = $this->regions;
        return view('pages.building.index',compact('buildings','regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings   = $this->building->all();
        $regions     = Region::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $communes    = Commune::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $tipo_piso       = DB::table('adm_tipo_piso')->get()->pluck('nombre','id');
        $admin          = Administracion::get()->pluck('nombre','id')->prepend('Seleccione..','');

        $revestimiento       = DB::table('adm_metalist')->where('metaTypeID','6')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $cubierta_cocina       = DB::table('adm_metalist')->where('metaTypeID','7')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $ventanas     = DB::table('adm_metalist')->where('metaTypeID','8')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $alarma     = DB::table('adm_metalist')->where('metaTypeID','14')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $lavaplatos      = DB::table('adm_metalist')->where('metaTypeID','13')->pluck('metaListValue','id')->prepend('Seleccione..','');

        $cocina      = DB::table('adm_metalist')->where('metaTypeID','9')->pluck('metaListValue','id')->prepend('Seleccione..','');

        $agua_caliente = DB::table('adm_metalist')->where('metaTypeID','10')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $cubierta_vanitorio     = DB::table('adm_metalist')->where('metaTypeID','11')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $calefaccion    = DB::table('adm_metalist')->where('metaTypeID','12')->pluck('metaListValue','id')->prepend('Seleccione..','');


        return view('pages.building.create',compact('buildings','regions','communes','tipo_piso','admin','revestimiento','ventanas','cubierta_cocina','ventanas','lavaplatos','alarma','agua_caliente','cubierta_vanitorio','calefaccion','cocina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuildingRequest $request)
    {   

    $building = new Building($request->all());
    $building->save();

    $buildings   = $this->building->all();
    $regions     = $this->regions;
    $communes    = Commune::where('region_id',$request->region_id)->orderBy('name')->pluck('name','id')->prepend('Seleccione...','');
    
    $building = Building::latest('id')->first();
    Session::flash('message-success',' Edificio '. $building->name.' '.trans('creado exitosamente'));
    return redirect::route('buildings.show',array('id' =>$building->id)); 


    }

    public function storeDocument(Request $request)
    {   
        $file = $request->file('file');
        $request = $request->all();
        if($file != null){
            $name = $file->getClientOriginalName();
            \Storage::disk('local')->put($name,  \File::get($file));
            $request['file'] = $name;
           
        }
        Session::flash('message-success',' Documento '. $request['nombre'].' Creado exitosamente.');
        $document = Edificio_Documento::create($request);
        return redirect::route('edificios.document',array('id' =>$request['edificio_id'])); 
    }

    public function updateDocument(Request $request)
    {   
        $file = $request->file('file');
        $request = $request->all();
        if($file != null){
            $name = $file->getClientOriginalName();
            \Storage::disk('local')->put($name,  \File::get($file));
            $request['file'] = $name;
        }
        Session::flash('message-success',' Documento '. $request['nombre'].' Actualizado exitosamente');
        $document = Edificio_Documento::find($request['id']);
        $document->update($request);

        return redirect::route('edificios.document',array('id' =>$request['edificio_id'])); 
    }

    public function updateDocumentAsamblea(Request $request)
    {   
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        \Storage::disk('local')->put($name,  \File::get($file));
        $request = $request->all();
        $request['file'] = $name;
        $document = Asamblea_Documento::find($request['id']);
        $document->update($request);

        Session::flash('message-success',' Documento '. $name.' '.trans('messages.created'));
        return redirect()->back(); 
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $building       = $this->building->find($id);
        $regions        = $this->regions;
        $metaType       = $this->metaType;
        $metaEdificio   = $this->metaEdificio->where('edificioID',$id);
        $title          = "Detalles";
        $communes       = Commune::where('region_id',$building->region_id)->orderBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $admin          = Administracion::get()->pluck('nombre','id')->prepend('Seleccione..','');
        $tipo_piso       = DB::table('adm_tipo_piso')->get()->pluck('nombre','id')->prepend('Seleccione..','');
        $revestimiento       = DB::table('adm_metalist')->where('metaTypeID','6')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $cubierta_cocina       = DB::table('adm_metalist')->where('metaTypeID','7')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $ventanas     = DB::table('adm_metalist')->where('metaTypeID','8')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $alarma     = DB::table('adm_metalist')->where('metaTypeID','14')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $lavaplatos      = DB::table('adm_metalist')->where('metaTypeID','13')->pluck('metaListValue','id')->prepend('Seleccione..','');

        $cocina      = DB::table('adm_metalist')->where('metaTypeID','9')->pluck('metaListValue','id')->prepend('Seleccione..','');

        $agua_caliente = DB::table('adm_metalist')->where('metaTypeID','10')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $cubierta_vanitorio     = DB::table('adm_metalist')->where('metaTypeID','11')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $calefaccion    = DB::table('adm_metalist')->where('metaTypeID','12')->pluck('metaListValue','id')->prepend('Seleccione..','');
        
        $edificio_tipologia = EdificioTipologia::where('id_edificio',$id)->get();
        $tipologia      = Tipologia::get()->pluck('tipologia','id');

        $administracion = Administracion::find($building->administracion_id);

        $contactos = Contacto::where('edificio_id',$id)->get();
        $tipo      = Tipo_Contacto::orderBy('nombre')->get()->pluck('nombre','id');
        $conceptos      = Concepto::get()->pluck('nombre','id')->prepend('Seleccione..','');

        $comunas = Commune::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
        if(Auth::user()->hasRole('operador')){
            return view('pages.building.show_empresa',compact('building','regions','title','communes','metaEdificio','metaType','tipo_piso','edificio_tipologia','tipologia','admin','conceptos','tipo','comunas','revestimiento','ventanas','cubierta_cocina','ventanas','lavaplatos','alarma','agua_caliente','cubierta_vanitorio','calefaccion','cocina','contactos'));
        }else if(!Auth::user()->hasRole('corredor')){
            return view('pages.building.show',compact('building','regions','title','communes','metaEdificio','metaType','tipo_piso','edificio_tipologia','tipologia','admin','conceptos','tipo','comunas','revestimiento','ventanas','cubierta_cocina','ventanas','lavaplatos','alarma','agua_caliente','cubierta_vanitorio','calefaccion','cocina','contactos'));
        }else{
            return view('pages.building.show_corredor',compact('building','regions','title','communes','metaEdificio','metaType','tipo_piso','edificio_tipologia','tipologia','admin','conceptos','tipo','comunas','revestimiento','ventanas','cubierta_cocina','ventanas','lavaplatos','alarma','agua_caliente','cubierta_vanitorio','calefaccion','cocina','contactos'));
        } 
    }

    public function getEdificio($id)
    {
        $building       = $this->building->find($id);
        $regions        = $this->regions;
        $metaType       = $this->metaType;
        $metaEdificio   = $this->metaEdificio->where('edificioID',$id);
        $title          = "Detalles";
        $communes       = Commune::where('region_id',$building->region_id)->orderBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $admin          = Administracion::get()->pluck('nombre','id')->prepend('Seleccione..','');
        $tipo_piso       = DB::table('adm_tipo_piso')->get()->pluck('nombre','id')->prepend('Seleccione..','');
        $revestimiento       = DB::table('adm_metalist')->where('metaTypeID','6')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $cubierta_cocina       = DB::table('adm_metalist')->where('metaTypeID','7')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $ventanas     = DB::table('adm_metalist')->where('metaTypeID','8')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $alarma     = DB::table('adm_metalist')->where('metaTypeID','14')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $lavaplatos      = DB::table('adm_metalist')->where('metaTypeID','13')->pluck('metaListValue','id')->prepend('Seleccione..','');

        $cocina      = DB::table('adm_metalist')->where('metaTypeID','9')->pluck('metaListValue','id')->prepend('Seleccione..','');

        $agua_caliente = DB::table('adm_metalist')->where('metaTypeID','10')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $cubierta_vanitorio     = DB::table('adm_metalist')->where('metaTypeID','11')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $calefaccion    = DB::table('adm_metalist')->where('metaTypeID','12')->pluck('metaListValue','id')->prepend('Seleccione..','');
        
        $edificio_tipologia = EdificioTipologia::where('id_edificio',$id)->get();
        $tipologia      = Tipologia::get()->pluck('tipologia','id');

        $administracion = Administracion::find($building->administracion_id);

        $contactos = Contacto::where('edificio_id',$id)->get();
        $tipo      = Tipo_Contacto::orderBy('nombre')->get()->pluck('nombre','id');
        $conceptos      = Concepto::get()->pluck('nombre','id')->prepend('Seleccione..','');

        $comunas = Commune::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
        return view('pages.building.single',compact('building','regions','title','communes','metaEdificio','metaType','tipo_piso','edificio_tipologia','tipologia','admin','comunas','administracion','revestimiento','ventanas','cubierta_cocina','ventanas','lavaplatos','alarma','agua_caliente','cubierta_vanitorio','calefaccion','cocina','contactos','tipo','conceptos'));   
    }


    public function obtenerEdificio(Request $request)
    {
        $id = $request->session()->get('idEdificio');
        //dd($id);
        $building       = $this->building->find($id);
        $regions        = $this->regions;
        $metaType       = $this->metaType;
        $metaEdificio   = $this->metaEdificio->where('edificioID',$id);
        $title          = "Detalles";
        $communes       = Commune::where('region_id',$building->region_id)->orderBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $admin          = Administracion::get()->pluck('nombre','id')->prepend('Seleccione..','');
        $tipo_piso       = DB::table('adm_tipo_piso')->get()->pluck('nombre','id');
        $edificio_tipologia = EdificioTipologia::where('id_edificio',$id)->get();
        $tipologia      = Tipologia::get()->pluck('tipologia','id');
        $conceptos      = Concepto::get()->pluck('nombre','id');
        $tipo      = Tipo_Contacto::orderBy('nombre')->get()->pluck('nombre','id');
        $comunas = Commune::get()->sortBy('name')->pluck('name','id')->prepend('Seleccione...','');
        $tipo_piso       = DB::table('adm_tipo_piso')->get()->pluck('nombre','id')->prepend('Seleccione..','');
        $revestimiento       = DB::table('adm_metalist')->where('metaTypeID','6')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $cubierta_cocina       = DB::table('adm_metalist')->where('metaTypeID','7')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $ventanas     = DB::table('adm_metalist')->where('metaTypeID','8')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $alarma     = DB::table('adm_metalist')->where('metaTypeID','14')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $lavaplatos      = DB::table('adm_metalist')->where('metaTypeID','13')->pluck('metaListValue','id')->prepend('Seleccione..','');

        $cocina      = DB::table('adm_metalist')->where('metaTypeID','9')->pluck('metaListValue','id')->prepend('Seleccione..','');

        $agua_caliente = DB::table('adm_metalist')->where('metaTypeID','10')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $cubierta_vanitorio     = DB::table('adm_metalist')->where('metaTypeID','11')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $calefaccion    = DB::table('adm_metalist')->where('metaTypeID','12')->pluck('metaListValue','id')->prepend('Seleccione..','');
        $contactos = Contacto::where('edificio_id',$id)->get();
        if(Auth::user()->hasRole('corredor')){
            return view('pages.building.show_corredor',compact('building','regions','title','communes','metaEdificio','metaType','tipo_piso','edificio_tipologia','tipologia','admin','conceptos','tipo','comunas','revestimiento','ventanas','cubierta_cocina','ventanas','lavaplatos','alarma','agua_caliente','cubierta_vanitorio','calefaccion','cocina','contactos'));
            
        }else  if(Auth::user()->hasRole('mayor')){
            return view('pages.building.show_mayordomo',compact('building','regions','title','communes','metaEdificio','metaType','tipo_piso','edificio_tipologia','tipologia','admin','conceptos','tipo','comunas','revestimiento','ventanas','cubierta_cocina','ventanas','lavaplatos','alarma','agua_caliente','cubierta_vanitorio','calefaccion','cocina','contactos'));
        }else{
            return view('pages.building.show',compact('building','regions','title','communes','metaEdificio','metaType','tipo_piso','edificio_tipologia','tipologia','admin','conceptos','tipo','comunas','revestimiento','ventanas','cubierta_cocina','ventanas','lavaplatos','alarma','agua_caliente','cubierta_vanitorio','calefaccion','cocina','contactos'));
        }  
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries  = $this->countries;
        $profit     = $this->profit; 
        return view('pages.accountOperator.edit',compact('account','categories','countries','profit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function update(buildingRequest $request, $id)
        {
            $building = $this->building->find($id);
            $data = $request->all();
            $building->update($data);


            Session::flash('message-success',' Edificio '. $request->name.' '.trans('modificado exitosamente'));
            return redirect()->back()->with('success', 'modificado exitosamente');  
            
        }

        public function updateEdificio(buildingRequest $request, $id)
        {
           
           
            //dd($request->all());
            $building = $this->building->find($id);
            if(!isset($request->admiten_mascotas)){
                $mascotas = 0;
                $data = $request->all()  + ['admiten_mascotas' => $mascotas];
            }else{
                $data = $request->all();
            }
            $building->update($data);
            Session::flash('message-success',' Edificio '. $request->name.' '.trans('modificado exitosamente'));
            return redirect()->back()->with('success', 'modificado exitosamente');
            
        }
     

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
             $building->delete();
            Session::flash('message-success',' '.trans('Eliminado exitosamente'));
       
    }

  
    public function destroyDocument($id)
    {
            $document = Edificio_Documento::find($id);
            $document->delete();
            Session::flash('message-success',' '.trans('Eliminado exitosamente'));
       
    }


     public function getMetaEdificio($id){
        $metaEdificio   = $this->metaEdificio->where('edificioID',$id);
        $data = [];
        foreach ($metaEdificio as $key => $meta) {
                $data[] = [
                            'id' => $meta->id,
                            'edificioMetaTypeID' => $meta->edificio->campo,
                            'value' => $this->getMetaValue($meta->edificioMetaTypeID,$meta->value)
              ];
        }
                                                
        return response()->json($data);
     }

      public function getMetaValue($id,$value){
        
            if($id == '2'){
                $metalist = MetaList::where('id',$value)->value('metaListvalue');
                return $metalist;
            }else{
                $metaEdificio = MetaEdificio::where('edificioMetaTypeID',$id)->value('value');
                return $metaEdificio;
            }                                    
     }

      public function getAllMeta($id)
    {
        $metaEdificio   = $this->metaEdificio->where('edificioID',$id);
        $data = [];
        foreach ($metaEdificio as $key => $meta) {
                $data[] = [
                            'id' => $meta->id,
                            'edificioMetaTypeID' => $meta->edificio->campo,
                            'value' => $this->getMetaValue($meta->edificioMetaTypeID,$meta->value)
              ];
        } 
        return datatables()->of($data)->toJson();
    }

     public function showContacts($id)
    {
        $contactos = Contacto::where('edificio_id',$id)->get();
        $tipo      = Tipo_Contacto::orderBy('nombre')->get()->pluck('nombre','id');
        $building  = $this->building->find($id);
        return view('pages.building.contacto',compact('contactos','building','tipo'));
    }

    public function showHistory($id)
    {
        $building  = $this->building->find($id);
        $frecuencia = DB::table('adm_recambio_frecuencia')->get()->pluck('frecuencia','id');
        $tipologia  = Tipologia::get()->pluck('tipologia','id');
        return view('pages.building.datos_historicos.index',compact('building','frecuencia','tipologia'));
    }

      public function showHistoryCorredor($id)
    {
        $building  = $this->building->find($id);
        $frecuencia = DB::table('adm_recambio_frecuencia')->get()->pluck('frecuencia','id');
        return view('pages.building.datos_historicos.index_corredor',compact('building','frecuencia'));
    }



     public function showRecambio($id)
    {
        setlocale(LC_TIME, "spanish");
        $vedificio  = DB::table('vedificioRecambio')->where('edificio_id',$id)->get();
        
         $data = [];

        foreach ($vedificio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'frecuencia' => $each->frecuencia,
            'porcentaje' => $each->porcentaje,
            'color' => $this->obtener_color($each->porcentaje)
            ];

        } 
         //dd($data);       
        return datatables()->of($data)->toJson();

    }

    public function showDocument($id)
    {
        $building  = $this->building->find($id);
        $frecuencia = DB::table('adm_recambio_frecuencia')->get()->pluck('frecuencia','id');
        $documentType = DB::table('adm_tipo_documento')->get()->pluck('nombre','id');
        $documents = Edificio_Documento::all();
        return view('pages.building.documentos.index',compact('building','frecuencia','documentType','documents'));
    }

    public function showAsamblea()
    {
        $data = Asamblea::all();
        $events = [];
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                $value->edificio_id." ".$value->asunto." ".$value->creado_por,
                    false,
                    new \DateTime($value->fecha),
                    new \DateTime($value->fecha),
                    null,
                    // Add color and link on event
                  [
                      'color' => '#0033ff',
                      'url' => 'show/asamblea/'.$value->id,
                  ]
                );
            }
      }
        $calendar = Calendar::addEvents($events);
        return view('pages.building.asambleas.index',compact('calendar','data'));
    }

     public function showAsambleaByEdificio($id)
    {
        $building = Building::find($id);
        $data = Asamblea::where('edificio_id',$id)->get();
        $events = [];
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                $value->edificio_id." ".$value->asunto." ".$value->creado_por,
                    false,
                    new \DateTime($value->fecha),
                    new \DateTime($value->fecha),
                    null,
                    // Add color and link on event
                  [
                      'color' => '#0033ff',
                      'url' => 'calendario/'.$value->id.'/'.$id,
                  ]
                );
            }
      }

        $calendar = Calendar::addEvents($events);
        return view('pages.building.asambleas.index',compact('data','calendar','building'));
    } 

      public function fullCalendar()
    {
        $data = Asamblea::all();
       
        return response()->json($data);
    }

    public function createAsamblea()
    {
        $buildings   = $this->building->pluck('name','id')->prepend('Seleccione..','');
        return view('pages.building.asambleas.createAsamblea',compact('buildings'));
    }

       public function createAsambleaEdificio($id)
    {
        $building = Building::find($id);
        $buildings   = $this->building->pluck('name','id')->prepend('Seleccione..','');
        return view('pages.building.asambleas.create',compact('buildings','building'));
    }

    public function createDocumentAsamblea(Request $request)
    {
       // dd($request->all());
        
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        \Storage::disk('local')->put($name,  \File::get($file));
        $request = $request->all();
        $request['file'] = $name;
        $document = Asamblea_Documento::create($request);
     

        Session::flash('message-success',' Documento '. $name.' '.trans('messages.created'));
        return back(); 
    }

     public function destroyDcumentAsamblea($id)
    {
        $asamblea = Asamblea_Document::find($id);
        $asamblea->delete();
        Session::flash('message-success',' '.trans('Eliminado exitosamente'));
     
    }


      public function obtener_color($color)
    {
        //dd($color);
        if($color == '1% a 20%'){
            return 'bg-yellow';
        }else if($color == '20% a 40%'){
             return 'bg-green';
        }else if($color == '40% a 60%'){
              return 'bg-red';   
        }else if($color == '60% a 80%'){
             return 'bg-blue';
        }else{
             return 'bg-light-blue';
        }
    }

      public function showContact($id)
    {
        $contacto = Contacto::find($id);
        return response()->json($contacto);
    }

     public function createContact($id)
    {
        $building  = $this->building->find($id);
        $tipo      = Tipo_Contacto::orderBy('nombre')->get()->pluck('nombre','id');
        return view('pages.building.create_contacto',compact('building','tipo'));
    }

      public function storeContact(Request $request)
    {   

       $contacto = new Contacto($request->all());
       $contacto->save();

       $contact = Contacto::latest('id')->first();
       Session::flash('message-success',' Contacto '. $contact->nombre.' '.trans('creado exitosamente'));


    }

       public function storeAsamblea(asambleaRequest $request)
    {   

       $asamblea = new Asamblea($request->all());
       $asamblea->save();

       $contact = Contacto::latest('id')->first();
       Session::flash('message-success','Asamblea '.trans('creado exitosamente'));
       return redirect::route('edificios.asamblea'); 


    }

    public function storeAsambleaEdificio(asambleaRequest $request)
    {   

       $asamblea = new Asamblea($request->all());
       $asamblea->save();

      Session::flash('message-success','Asamblea '.trans('creado exitosamente'));
      return redirect::route('edificio.asamblea',array('id' =>$request['edificio_id'])); 


    }

      public function updateContact(Request $request,$id)
    {   

        $contacto = Contacto::find($id);
        $data = $request->all();
        $contacto->update($data);
        Session::flash('message-success',' Contacto '. $contacto->nombre.' '.trans('modificado exitosamente'));
       
    }

     public function updateAsamblea(asambleaRequest $request,$id)
    {   

        $asamblea = Asamblea::find($id);
        $data = $request->all();
        $asamblea->update($data);
        Session::flash('message-success',' Asamblea '.trans('modificado exitosamente'));
        //return redirect::route('edificios.asamblea'); 
        return redirect()->back(); 
       
    }

      public function destroyContact($id)
    {
        $contacto = Contacto::find($id);
        $contacto->delete();
        session::flash('message-success',' '.trans('Eliminado exitosamente'));
       
    }

      public function destroyAsamblea(Request $request,$id)
    {

        $asamblea = Asamblea::find($id);
        $asamblea->delete();
        session::flash('message-success','Asamblea '.trans('Eliminado exitosamente'));
        if(session()->has('idEdificio')){ 
          $edificio = $request->session()->get('idEdificio');
          return redirect::route('edificio.asamblea',array($edificio)); 
        }else{
           return redirect::route('edificios.asamblea');
        }
         
       
    }

     public function getRecambio($id)
    {
        setlocale(LC_TIME, "spanish");
        $data = DB::table('adm_edificios_recambio')->find($id);
        $result = [];
        $result[] = [
            'id' => $data->id,
            'periodo' => strftime("%B %Y", strtotime($data->periodo)),
            'frecuencia_id' => $data->frecuencia_id
            ];

        return response()->json($result);
    }

     public function getArriendo($id)
    {
        setlocale(LC_TIME, "spanish");
        $data = DB::table('adm_edificios_arriendos')->find($id);
        $result = [];
        $result[] = [
            'id' => $data->id,
            'mes' => strftime("%B %Y", strtotime($data->mes)),
            'tipologia_id' => $data->tipologia_id,
            'arriendo' => $data->arriendo
            ];

        return response()->json($result);
    }

     public function getDemanda($id)
    {
        setlocale(LC_TIME, "spanish");
        $data = DB::table('adm_demanda')->find($id);
        $result = [];
        $result[] = [
            'id' => $data->id,
            'periodo' => strftime("%B %Y", strtotime($data->periodo)),
            'deuda' => $data->deuda,
            'concepto' => $data->concepto
            ];

        return response()->json($result);
    }

     public function getDeuda($id)
    {
        $data = Deuda::find($id);
        return response()->json($data);
    }

      public function getMantencion($id)
    {
        $data = Mantencion::find($id);
        return response()->json($data);
    }

       public function getMantencionCo($id)
    {
        $data = Mantencion_Co::find($id);
        return response()->json($data);
    }

     public function getGastoComunes($id)
    {
        $data = Gastos_Comunes::find($id);
        return response()->json($data);
    }

      public function getGastoFijo($id)
    {
        $data = Gastos_Fijos::find($id);
        return response()->json($data);
    }

    public function mostrarAsamblea($id)
    {
        $asamblea = Asamblea::find($id);
        $buildings   = $this->building->pluck('name','id')->prepend('Seleccione..','');
        $documentType = DB::table('adm_tipo_documento')->get()->pluck('nombre','id');
        $documents = Asamblea_Documento::where('asamblea_id',$id)->get();
        //dd($documents);
        return view('pages.building.asambleas.show',compact('asamblea','buildings','documentType','documents'));

    }   

      public function mostrarAsambleaByEdificio($id,$id2)
    {
        $asamblea = Asamblea::find($id);
        $building = Building::find($id2);
        $buildings   = $this->building->pluck('name','id')->prepend('Seleccione..','');
        $documentType = DB::table('adm_tipo_documento')->get()->pluck('nombre','id');
        $documents = Asamblea_Documento::where('asamblea_id',$id)->get();

        return view('pages.building.asambleas.edit',compact('asamblea','buildings','documentType','documents','building'));

    } 


     public function getCalificacion($id)
    {
        setlocale(LC_TIME, "spanish");
        $data = Calificacion::find($id);
        $result = [];
        $result[] = [
            'id' => $data->id,
            'periodo' => strftime("%B %Y", strtotime($data->periodo)),
            'calificacion' => $data->calificacion
            ];

        return response()->json($result);
    }

     public function updateRecambio(Request $request)
    {
        //dd($request->all());
        $id = $request->id;
        $data = $request->all();
        $recambio = Recambio::find($id);
        $recambio->update($data);
        
    }

      public function updateDemanda(Request $request)
    {
        //dd($request->all());
        $id = $request->id;
        $data = $request->all();
        $demanda = Demanda::find($id);
        $demanda->update($data);
        
    }

      public function updateDeuda(Request $request)
    {
        //dd($request->all());
        $id = $request->id;
        $data = $request->all();
        $deuda = Deuda::find($id);
        $deuda->update($data);
        
    }

    public function updateGasto(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $gasto = Gastos_Comunes::find($id);
        $gasto->update($data);
        
    }

      public function updateGastoFijo(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $gasto = Gastos_Fijos::find($id);
        $gasto->update($data);
        
    }

      public function updateCalificacion(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $gasto = Calificacion::find($id);
        $gasto->update($data);
        
    }

      public function updateArriendo(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $arriendo = Arriendo::find($id);
        $arriendo->update($data);
        
    }



       public function showDemanda($id)
    {
        setlocale(LC_TIME, "spanish");
        $vedificio  = DB::table('adm_demanda')->where('edificio_id',$id)->get();
        
         $data = [];

        foreach ($vedificio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'deuda' => $this->obtener_respuesta($each->deuda),
            'concepto' => $each->concepto
            ];
        } 
        return datatables()->of($data)->toJson();

    }

    public function showDeuda($id)
    {
        setlocale(LC_TIME, "spanish");
        $vedificio  = Deuda::where('edificio_id',$id)->get();
        
         $data = [];

        foreach ($vedificio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'agua' => $this->obtener_respuesta($each->agua),
            'luz' => $this->obtener_respuesta($each->luz),
            'gas' => $this->obtener_respuesta($each->gas),
            'agua_monto' => $each->agua_monto,
            'luz_monto' => $each->luz_monto,
            'gas_monto' => $each->gas_monto,
            'agua_resolucion' => $each->agua_resolucion,
            'luz_resolucion' => $each->luz_resolucion,
            'gas_resolucion' => $each->gas_resolucion
            ];
        } 
        return datatables()->of($data)->toJson();

    }

    public function showCalificacion($id)
    {
        setlocale(LC_TIME, "spanish");
        $vedificio  = Calificacion::where('edificio_id',$id)->get();
        
         $data = [];

        foreach ($vedificio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'calificacion' => $each->calificacion.'/10'
            ];
        } 
        return datatables()->of($data)->toJson();

    }

      public function showManuntencion($id)
    {
        setlocale(LC_TIME, "spanish");
        $vedificio  = Mantencion::where('edificio_id',$id)->get();
        
         $data = [];

        foreach ($vedificio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'lavanderia' => $this->check($each->lavanderia),
            'quinchos' => $this->check($each->quinchos),
            'piscinas' => $this->check($each->piscinas),
            'salon' => $this->check($each->salon), 
            'gimnasio' => $this->check($each->gimnasio),
            'sala_cine' => $this->check($each->sala_cine),
            'sala_juegos' => $this->check($each->sala_juegos),
            'calderas' => $this->check($each->calderas), 
            'bombas' => $this->check($each->bombas),
            'paneles' => $this->check($each->paneles),
            'ascensores' => $this->check($each->ascensores),
            'portones' => $this->check($each->portones),
            'calderas' => $this->check($each->calderas), 
            'camaras' => $this->check($each->camaras),
            'areas_verdes' => $this->check($each->areas_verdes),
            'aseo' => $this->check($each->aseo) 
            ];
        } 
        return datatables()->of($data)->toJson();

    }

    public function showManuntencionCo($id)
    {
        setlocale(LC_TIME, "spanish");
        $vedificio  = Mantencion_Co::where('edificio_id',$id)->get();
        
         $data = [];

        foreach ($vedificio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'lavanderia' => $this->check($each->lavanderia),
            'quinchos' => $this->check($each->quinchos),
            'piscinas' => $this->check($each->piscinas),
            'salon' => $this->check($each->salon), 
            'gimnasio' => $this->check($each->gimnasio),
            'sala_cine' => $this->check($each->sala_cine),
            'sala_juegos' => $this->check($each->sala_juegos),
            'calderas' => $this->check($each->calderas), 
            'bombas' => $this->check($each->bombas),
            'paneles' => $this->check($each->paneles),
            'ascensores' => $this->check($each->ascensores),
            'portones' => $this->check($each->portones),
            'calderas' => $this->check($each->calderas), 
            'camaras' => $this->check($each->camaras),
            'areas_verdes' => $this->check($each->areas_verdes),
            'aseo' => $this->check($each->aseo) 
            ];
        } 
        return datatables()->of($data)->toJson();

    }

    public function showGastosComunes($id)
    {
        setlocale(LC_TIME, "spanish");
        $vedificio  = DB::table('adm_gastos_comunes')->where('edificio_id',$id)->get();
        
         $data = [];

        foreach ($vedificio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'gastos_comunes' => $each->gastos_comunes,
            'mgc_1mes' => $each->mgc_1mes,
            'mgc_3mes' => $each->mgc_3mes,
            'mgc_6mes' => $each->mgc_6mes,
            'mgc_12mes' => $each->mgc_12mes,
            'mgc_12mes_mas' => $each->mgc_12mes_mas,
            ];
        } 
        return datatables()->of($data)->toJson();

    }


    public function showGastosFijos($id)
    {
        $vedificio  = Gastos_Fijos::where('edificio_id',$id)->get();
         $data = [];

        foreach ($vedificio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'agua' => $each->agua,
            'luz' => $each->luz,
            'telefono' => $each->telefono,
            'conserjes' => $each->conserjes
            ];
        } 
        return datatables()->of($data)->toJson();

    }

       public function showArriendo($id)
    {
        setlocale(LC_TIME, "spanish");
        $vedificio  = DB::table('adm_edificios_arriendos')->where('edificio_id',$id)->get();
        
         $data = [];

        foreach ($vedificio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'mes' => strftime("%B %Y", strtotime($each->mes)),
            'tipologia' => $this->obtener_respuesta($each->tipologia_id),
            'arriendo' => $each->arriendo
            ];
        } 
        return datatables()->of($data)->toJson();

    }


    function obtener_respuesta($resp){
        if($resp == '1'){
            return 'Si';
        }else{
            return 'No';
        }
    }

     function obtener_calificacion($resp){
       switch ($resp) {
        case 0:
           return "";
            break;
        case 1:
           return  "★";
            break;
        case 2:
           return  "★★";
            break;
        case 3:
           return "★★★";
            break;
        case 4:
            return  "★★★★";
            break;
        case 5:
           return  "★★★★★";
            break;
        }
    }


     public function check($id){
       
            if($id == '1'){
                return "checked";
            }else{
                return "";
            }
    }

      public function updateMantencion(Request $request)
    {
        //dd($request->all());
        $id = $request->id;
        $data = $request->all();
        $deuda = Mantencion::find($id);
        $deuda->update($data);
        
    }

     public function updateMantencionCo(Request $request)
    {
        $id = $request->id;
        $data = $request->all();
        $deuda = Mantencion_Co::find($id);
        $deuda->update($data);
        
    }


    public function download($id)
    {
        $document   = Edificio_Documento::find($id);
        $file       = public_path().'/storage/'.$document->file;
        return response()->download($file);
    }

        public function downloadAsamblea($id)
    {
        $document   = Asamblea_Documento::find($id);
        $file       = public_path().'/storage/'.$document->file;
        return response()->download($file);
    }

    public function getDocumentoEdificio($id)
    {
        $document = Edificio_Documento::find($id);
        return response()->json($document);
        
    }

      public function getDocumentoAsamblea($id)
    {
        $document = Asamblea_Documento::find($id);
        return response()->json($document);
        
    }

      public function destroyDocumentAsamblea($id)
    {
            $document = Asamblea_Documento::find($id);
            $document->delete();
            Session::flash('message-success',' '.trans('Eliminado exitosamente'));
       
    }


     public function gastosMayordomoEdificio($id)
    {
        setlocale(LC_TIME, "spanish");
        $gastos  = DB::table('adm_edificios_gastos as gastos') 
        ->leftjoin('adm_concepto as concepto','gastos.concepto_id','=','concepto.id')
        ->select('gastos.periodo','gastos.url_boleta','concepto.nombre as nombre',
          'gastos.estado_mayordomo','gastos.estado_copropietario','gastos.proveedor','calificacion','gastos.id as id')
        ->where('gastos.edificio_id',$id)->get();
        
         $data = [];

        foreach ($gastos as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'concepto' => $each->nombre,
            'url_boleta' => $each->url_boleta,
            'validacion' => $this->obtener_validacion_boleta($each->id),
            'calificacion' => $this->obtener_calificacion($each->calificacion),
            'mayordomo' => $this->obtener_respuesta($each->estado_mayordomo),
            'copropietario' => $this->obtener_respuesta($each->estado_copropietario),
            'proveedor' => $each->proveedor
            ];
        } 
       
        return datatables()->of($data)->toJson();

    }

        public function calificacionAdministracion($id)
    {
        setlocale(LC_TIME, "spanish");
        $calificacion  = DB::table('adm_calificacion_administracion as c') 
        ->leftjoin('adm_administraciones as a','c.id_administracion','=','a.id')
        ->select('c.periodo','a.nombre as nombre','c.calificacion','c.id as id')
        ->where('c.id_edificio',$id)->get();
        
         $data = [];

        foreach ($calificacion as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'nombre' => $each->nombre,
            'calificacion' => $this->obtener_calificacion($each->calificacion)
            ];
        } 
       
        return datatables()->of($data)->toJson();

    }

    public function createGasto(Request $request)
    {
       //dd($request->all());
        $fecha = $request->periodo.'-01';
        
        $file = $request->file('file');
        $request = $request->all();
        if($file != null){
        $name = $file->getClientOriginalName();
        \Storage::disk('local')->put($name,  \File::get($file));
         $request['url_boleta'] = $name;
        }
        $request['periodo'] = $fecha;
        $document = Gastos::create($request);
     

        Session::flash('message-success',' Gasto creado exitosamente');
        return back(); 
    }

    public function downloadBoleta($id)
    {
        $document   = Gastos::find($id);
        $file       = public_path().'/storage/'.$document->url_boleta;
        return response()->download($file);
    }

    public function downloadBoleta2($id)
    {
        $document   = Gasto_Comun::find($id);
        if($document->file == ''){
            Session::flash('message-error','No posee boleta asociada');
            return back();
           
        }else{
            $file = public_path().'/storage/'.$document->file;
            return response()->download($file);
        }
       
    }

    public function downloadBoletaGrande($id)
    {
        $document   = Gasto_Comun::find($id);
        if($document->file_dpto_grande == ''){
            Session::flash('message-error','No posee boleta asociada');
            return back();
           
        }else{
            $file = public_path().'/storage/'.$document->file_dpto_grande;
            return response()->download($file);
        }
       
    }

    public function deleteGasto($id)
    {
          $gasto = Gastos::find($id);
          $gasto->delete();
          Session::flash('message-success','Gasto eliminado exitosamente');
          return back(); 
    }

     public function getGasto($id)
    {
        $gasto = Gastos::find($id);
        return response()->json($gasto);
        
    }


    public function updateGastoEdificio(Request $request)
    {
        //dd($request->all());
        $id = $request->id;
        $file = $request->file('file');

        $fecha = $request->periodo.'-01';
        $request = $request->all();
        $request['periodo'] = $fecha;

         if($file != null){
             $name = $file->getClientOriginalName();
            \Storage::disk('local')->put($name,  \File::get($file));
            $request['url_boleta'] = $name;
        }

        $gasto = Gastos::find($id);
        $gasto->update($request);
        Session::flash('message-success',' Gasto actualizado exitosamente');
        return back(); 
    }

      public function gastoComunEdificio($id)
    {
        setlocale(LC_TIME, "spanish");
        $gastos  = DB::table('adm_edificios_gastos_comunes') 
        ->where('edificio_id',$id)->orderBy('periodo','asc')->get();
        
         $data = [];

        foreach ($gastos as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'monto_dpto_pequenno' => $each->monto_dpto_pequenno,
            'monto_dpto_grande' => $each->monto_dpto_grande,
            'validacion' => $this->obtener_validacion($each->id),
            'validacion2' => $this->obtener_validacion2($each->id),
            'variacion' => $this->obtener_variacion($each->monto_dpto_pequenno,$each->monto_dpto_grande),
            ];
        } 
       
        return datatables()->of($data)->toJson();

    }

       public function createGastoComun(Request $request)
    {
        $file = $request->file('file');
        $fileDpto = $request->file('fileDpto');

        $fecha = $request->periodo.'-01';
        $request['periodo'] = $fecha;
       
        $request = $request->all();
        if($file != null){
            $name = $file->getClientOriginalName();
            \Storage::disk('local')->put($name,  \File::get($file));
            $request['file'] = $name;
           
        }

        if($fileDpto != null){
            $name = $fileDpto->getClientOriginalName();
            \Storage::disk('local')->put($name,  \File::get($fileDpto));
            $request['file_dpto_grande'] = $name;
           
        }
        $document = Gasto_Comun::create($request);
     
        Session::flash('message-success',' Gasto creado exitosamente');
        return back(); 
    }

      public function getGastoComun($id)
    {
        $gasto = Gasto_Comun::select('id','periodo','monto_dpto_pequenno','monto_dpto_grande')->where('id',$id)->get();
        return response()->json($gasto);
        
    }

    public function GastoPromedio($id)
    {
        setlocale(LC_TIME, "spanish");
        $gastos  = Gasto_Comun::where('edificio_id',$id)->orderBy('periodo','asc')->get();
        
         $data = [];

        foreach ($gastos as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'promedio' => $each->promedio
            ];
        } 
       
        return  response()->json($data);
        
    }

     public function GastoDiasEdificio($id)
    {
        setlocale(LC_TIME, "spanish");
        $gastos  = Gastos_Dias::where('edificio_id',$id)->orderBy('periodo','asc')->get();
        
         $data = [];

        foreach ($gastos as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'al_dia' => $each->al_dia,
            'dia_atrasado' => $each->dia_atrasado
            ];
        } 
       
        return  response()->json($data);
        
    }
    
      public function FrecuenciaRecambioEdificio($id)
    {
        setlocale(LC_TIME, "spanish");
        $frecuencias  = Frecuencia_Recambio::where('edificio_id',$id)->orderBy('periodo','asc')->get();
        
         $data = [];

        foreach ($frecuencias as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'recambio' => $each->recambio
            ];
        } 
       
        return  response()->json($data);
        
    }


    public function updateGastoComun(Request $request)
    {
        $id = $request->id;
        $file = $request->file('file');
        $fileDpto = $request->file('fileDpto');

        $gasto = Gasto_Comun::find($id);
        $fecha = $request->periodo.'-01';
        $request = $request->all();
        if($file != null){
            $name = $file->getClientOriginalName();
            \Storage::disk('local')->put($name,  \File::get($file));
            $request['file'] = $name;
        }

        if($fileDpto != null){
            $name = $fileDpto->getClientOriginalName();
            \Storage::disk('local')->put($name,  \File::get($fileDpto));
            $request['file_dpto_grande'] = $name;
        }
        $request['periodo'] = $fecha;
        $gasto->update($request);
        Session::flash('message-success',' Gasto actualizado exitosamente');
        return back(); 
    }

    public function gastoComunEdificioDia($id)
    {
        setlocale(LC_TIME, "spanish");
        $gastos  = DB::table('adm_edificios_gastos_dias') 
        ->where('edificio_id',$id)->orderBy('periodo','desc')->get();
        
         $data = [];

        foreach ($gastos as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'al_dia' => $each->al_dia,
            'dia_atrasado' => $each->dia_atrasado
            ];
        } 
       
        return datatables()->of($data)->toJson();

    }

       public function createGastoComunDia(Request $request)
    {

        $fecha = $request->periodo.'-01';
        $request['periodo'] = $fecha;
       
        $request = $request->all();
        $document = Gastos_Dias::create($request);
     
        Session::flash('message-success',' Gasto creado exitosamente');
        return back(); 
    }

     public function createAdmCalificacion(Request $request)
    {

        $fecha = $request->periodo.'-01';
        $request['periodo'] = $fecha;
       
        $request = $request->all();
        $document = Calificacion_Administracion::create($request);
     
        Session::flash('message-success','Calificación creado exitosamente');
        return back(); 
    }

      public function getAdmCalificacion($id)
    {
        $gasto = Calificacion_Administracion::select('id','periodo','id_administracion','id_edificio','calificacion')->where('id',$id)->get();
        //dd($gasto);
        return response()->json($gasto);
        
    }

     public function updateAdmCalificacion(Request $request)
    {
        $id = $request->id;
        $gasto = Calificacion_Administracion::find($id);
        $fecha = $request->periodo.'-01';
        $request = $request->all();
        $request['periodo'] = $fecha;
        $gasto->update($request);
        Session::flash('message-success','Calificación actualizado exitosamente');
        return back(); 
    }

    public function deleteAdmCalificacion($id)
    {
          $gasto = Calificacion_Administracion::find($id);
          $gasto->delete();
          Session::flash('message-success','Calificación eliminado exitosamente');
          return back(); 
    }

     public function getGastoComunDia($id)
    {
        $gasto = Gastos_Dias::select('id','periodo','al_dia','dia_atrasado')->where('id',$id)->get();
        return response()->json($gasto);
        
    }

     public function updateGastoComunDia(Request $request)
    {
        $id = $request->id;
        $gasto = Gastos_Dias::find($id);
        $fecha = $request->periodo.'-01';
        $request = $request->all();
        $request['periodo'] = $fecha;
        $gasto->update($request);
        Session::flash('message-success',' Gasto actualizado exitosamente');
        return back(); 
    }

    public function deleteGastoComunDia($id)
    {
          $gasto = Gastos_Dias::find($id);
          $gasto->delete();
          Session::flash('message-success','Gasto eliminado exitosamente');
          return back(); 
    }

     public function frecuenciaRecambio($id)
    {
        setlocale(LC_TIME, "spanish");
        $recambio  = DB::table('adm_frecuencia_recambio') 
        ->where('edificio_id',$id)->orderBy('periodo','desc')->get();
        
         $data = [];

        foreach ($recambio as $key => $each) {
            $data[] = [
            'id' => $each->id,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'recambio' => $each->recambio
            ];
        } 
       
        return datatables()->of($data)->toJson();

    }

       public function createFrecuenciaRecambio(Request $request)
    {

        $fecha = $request->periodo.'-01';
        $request['periodo'] = $fecha;
       
        $request = $request->all();
        Frecuencia_Recambio::create($request);
     
        Session::flash('message-success','Frecuencia agregada exitosamente');
        return back(); 
    }

     public function getFrecuenciaRecambio($id)
    {
        $frecuencia = Frecuencia_Recambio::select('id','periodo','recambio')->where('id',$id)->get();
        return response()->json($frecuencia);
        
    }


     public function updateFrecuenciaRecambio(Request $request)
    {
        $id = $request->id;
        $frecuencia = Frecuencia_Recambio::find($id);
        $fecha = $request->periodo.'-01';
        $request = $request->all();
        $request['periodo'] = $fecha;
        $frecuencia->update($request);
        Session::flash('message-success','Frecuencia actualizada exitosamente');
        return back(); 
    }

    public function deleteFrecuenciaRecambio($id)
    {
          $frecuencia = Frecuencia_Recambio::find($id);
          $frecuencia->delete();
          Session::flash('message-success','Frecuencia eliminada exitosamente');
          return back(); 
    }

    public function createPersonalCalificacion(Request $request)
    {
        $fecha = $request->periodo.'-01';
        $request['periodo'] = $fecha;
        $request = $request->all();
        $document = Calificacion_Personal::create($request);

        return response()->json($document);
    }

    public function calificacionPersonal($id)
    {
        setlocale(LC_TIME, "spanish");
        $calificacion  = DB::table('adm_calificacion_personal as c') 
        ->where('c.edificio_id',$id)->get();
        
        $data = [];

        foreach ($calificacion as $key => $each) {
            $data[] = [
            'id' => $each->ID,
            'periodo' => strftime("%B %Y", strtotime($each->periodo)),
            'respeto' => $this->obtener_calificacion($each->respeto),
            'comunicacion' => $this->obtener_calificacion($each->comunicacion),
            'actitud' => $this->obtener_calificacion($each->actitud),
            'escucha' => $this->obtener_calificacion($each->escucha),
            'resolucion' => $this->obtener_calificacion($each->resolucion),
            'responsabilidad' => $this->obtener_calificacion($each->responsabilidad),
            'notas' => $each->notas
            ];
        } 
    return datatables()->of($data)->toJson();

    }

        public function getPersonalCalificacion($id)
    {
        $calificacion = Calificacion_Personal::find($id);
        return response()->json($calificacion);
        
    }

    public function updatePersonalCalificacion(Request $request)
    {

        $id = $request->ID;
        $calificacion = Calificacion_Personal::find($id);
        $fecha = $request->periodo.'-01';
        $request = $request->all();
        //dd($calificacion);
        $request['periodo'] = $fecha;
        //dd($request);
        $calificacion = Calificacion_Personal::where('ID', $id)->update(['respeto' => $request['respeto'], 'comunicacion' => $request['comunicacion'],
        'periodo' => $request['periodo'],'escucha' => $request['escucha'],'actitud' => $request['actitud'],'resolucion' => $request['resolucion'],
        'responsabilidad' => $request['responsabilidad'],'notas' => $request['notas']]);
    
        return response()->json($calificacion);
    }

    
    public function obtener_variacion($monto_pequeño, $monto_grande)
    {
       $promedio2 = 0;
       $promedio2 = ($monto_pequeño + $monto_grande)/2;
       $promedio1 = $this->promedio1;
       if($promedio1 == 0){
           $variacion = 0;
       }else{
        $variacion = (($promedio1 - $promedio2)*100)/$promedio1; 
       }
      
       $this->promedio1 = $promedio2;
       return floor($variacion).' %';
    }

    public function obtener_validacion($id)
    {
       $gasto= Gasto_Comun::find($id);
       if($gasto->file == null || $gasto->file=''){
            return 'display:none;';
       }else{
            return 'display:inline;';
       }
       
    }

    public function obtener_validacion2($id)
    {
       $gasto= Gasto_Comun::find($id);
       if($gasto->file_dpto_grande == null || $gasto->file_dpto_grande=''){
            return 'display:none;';
       }else{
            return 'display:inline;';
       }
       
    }

    public function obtener_validacion_boleta($id)
    {
       $gasto= Gastos::find($id);
       if($gasto->url_boleta == null || $gasto->url_boleta ==''){
            return 'display:none;';
       }else{
            return 'display:inline;';
       }
    }   
}
