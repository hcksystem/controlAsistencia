<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-150px mt-3 mb-3 ml-3">
            {{ Html::image('assets/img/basic/logoadm.png', 'a picture', array('alt'=>'Logo')) }}
        </div>
          <div class="relative">

            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        {{ Html::image('img/avatar/default.png', 'a picture', array('class'=>'user_avatar','alt'=>'a picture')) }}
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">{{ Auth::user()->fullname }}</h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                
            </div>
        </div>
        
        <ul class="sidebar-menu">
        <li class="header"><strong>MÓDULOS DEL SISTEMA</strong></li>
        @if((Auth::user()->hasRole('mayor')))
             <li class="treeview">
                <a href="{{url('loginUser')}}" onclick="event.preventDefault(); document.getElementById('loginUser-form').submit();">
                    <i class="icon icon-compass gray-text s-18"></i> <span>{{ __('Tablero') }}</span>
                </a>
                <form id="loginUser-form" action="{{ route('loginUser') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                </form>
                 
            </li>
         @endif   
         @if(Auth::user()->hasRole('super') || Auth::user()->hasRole('corredor') || Auth::user()->hasRole('operador'))
          <li class="treeview"><a href="{{url('home')}}">
                <i class="icon icon-compass gray-text s-18"></i><span>{{ __('Dashboard') }}</span></a>
             </li>
        <li class="treeview no-b"><a href="{{ route('buildings.index') }}">
            <i class="icon icon-equalizer gray-text s-18"></i>
            <span>{{ __('Edificios') }}</span></a>
        </li>
        @else  
            <li class="treeview no-b"><a href="{{ route('edificio.mostrar') }}">
                <i class="icon icon-equalizer gray-text s-18"></i>
                <span>{{ __('Edificios') }}</span></a>
            </li>
            @if(!Auth::user()->hasRole('operador'))
            @if(!Auth::user()->hasRole('copro'))
            <li><a href="{!! route('encomienda.mostrar') !!}"><i class="icon icon-equalizer s-18"></i>Encomiendas</a>
                @endif
           </li>
           <li class="treeview no-b"><a href="{{ route('reservaEspacioPorEdificio') }}">
            <i class="icon icon-equalizer gray-text s-18"></i>
                <span>{{ __('Reservas') }}</span></a>
            </li>
            @endif
            @if(Auth::user()->hasRole('mayor') || Auth::user()->hasRole('admin'))
                <li class="treeview no-b"><a href="{{ route('empresaExterna.index') }}">
                    <i class="icon icon-equalizer gray-text s-18"></i>
                    <span>{{ __('Empresas Externas') }}</span></a>
                </li>
            @endif
            <li class="treeview"><a href="{{url('home')}}">
                <i class="icon icon-compass gray-text s-18"></i><span>{{ __('Cambiar Edificio') }}</span></a>
             </li>
      
        @endif 
        
       
    </li>
    @if(Auth::user()->hasRole('super') || Auth::user()->hasRole('admin'))
         <li class="treeview no-b"><a href="{{ route('administraciones.index') }}">
            <i class="icon icon-equalizer gray-text s-18"></i>
            <span>{{ __('Administraciones') }}</span></a>
        </li>
    @endif
    @if(Auth::user()->hasRole('operador'))
     <li><a href="{!! route('corredor.index') !!}">
        <i class="icon icon-equalizer gray-text s-18"></i>Corredores</a>
    </li>
    @endif
    @if(Auth::user()->hasRole('super'))
        <li class="treeview no-b"><a href="{{ route('empresaExterna.index') }}">
            <i class="icon icon-equalizer gray-text s-18"></i>
            <span>{{ __('Empresas Externas') }}</span></a>
        </li>
    @endif
    
    
    @if(Auth::user()->hasRole('operador'))
        <li class="treeview no-b"><a href="{{ route('empresaExterna.index') }}">
            <i class="icon icon-equalizer gray-text s-18"></i>
            <span>{{ __('Mis Empresas') }}</span></a>
        </li>
    @endif
    @if(Auth::user()->hasRole('super') || Auth::user()->hasRole('corredor') || Auth::user()->hasRole('copro'))
        <li><a href="{!! route('corredor.index') !!}"><i class="icon icon-equalizer gray-text s-18"></i>Corredores</a>
        </li>
    @endif
    @if(Auth::user()->hasRole('super'))
        <li class="treeview no-b"><a href="{{ route('reservaEspacio.index') }}">
            <i class="icon icon-equalizer gray-text s-18"></i>
            <span>{{ __('Reservas') }}</span></a>
        </li>
        <li class="treeview">
            <a href="{{ route('user.index') }}">
                <i class="icon icon-equalizer gray-text s-18"></i>{{ __('Usuarios') }}
            </a>
        </li>  
    @endif
    @if(Auth::user()->hasRole('super') || Auth::user()->hasRole('operador'))
        <li class="treeview no-b"><a href="{{ route('getAllAnuncios') }}">
            <i class="icon icon-equalizer gray-text s-18"></i>
                <span>{{ __('Anuncios') }}</span></a>
        </li>
    @endif
  
    @if(Auth::user()->hasRole('super'))
        
        <li class="header light mt-3"><strong>CONFIGURACIÓN</strong></li>
        <li class="treeview">
            <a href="#">
                <i class="icon icon-book gray-text s-18"></i> <span>{{ __('Configuración') }}</span>
                <i class="icon icon-angle-left s-18 pull-right"></i>
            </a>
            <ul class="treeview-menu">
                
                <li class="treeview"><a href="{{ route('dataType.index') }}">
                    <i class="icon icon-circle-o gray-text s-14"></i>
                    <span>{{ __('MetaData') }}</span></a>
                </li>
                <li>
                    <a href="{!! route('metaType.index') !!}">
                        <i class="icon icon-circle-o gray-text s-14"></i> <span>{{ __('Campos adicionales') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('metaList.index') !!}">
                        <i class="icon icon-circle-o gray-text s-14"></i> <span>{{ __('Lista de Datos') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('module.index') !!}">
                        <i class="icon icon-circle-o gray-text s-14"></i> <span>{{ __('Módulos') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('tipoDocumento.index') !!}">
                        <i class="icon icon-circle-o gray-text s-14"></i> <span>{{ __('Tipos de Documento') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('tipoPersona.index') !!}">
                        <i class="icon icon-circle-o gray-text s-14"></i> <span>{{ __('Tipos de Persona') }}</span>
                    </a>
                </li>
                 <li>
                    <a href="{!! route('tipologia.index') !!}">
                        <i class="icon icon-circle-o gray-text s-14"></i> <span>{{ __('Tipología') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('espacioComun.index') !!}">
                        <i class="icon icon-circle-o gray-text s-14"></i> <span>{{ __('Espacio Común') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{!! route('module.index') !!}">
                        <i class="icon icon-circle-o gray-text s-14"></i> <span>{{ __('Documentos') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('edificios.asamblea') }}">
                        <i class="icon icon-circle-o gray-text s-14"></i> <span>{{ __('Calendario') }}</span>
                    </a>
                </li>
               
            </ul>
        </li>
        <li class="treeview ">
                <a href="#">
                    <i class="icon icon-data_usage text-lime s-18"></i> <span>Gestión Interna</span>
                    <i class="icon icon-angle-left s-18 pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('regions.index') !!}"><i class="icon icon-circle-o"></i>Regiones/Comunas</a>
                    </li>
                    <li><a href="#"><i class="icon icon-circle-o"></i>Reserva de espacios</a>
                    </li>
                    <li><a href="{{ route('edificios.asamblea') }}"><i class="icon icon-circle-o"></i>Asambleas</a>
                    </li>
                    <li><a href="{!! route('encomiendas.index') !!}"><i class="icon icon-date_range"></i>Encomiendas</a>
                    </li>
                  
                    
                    
                </ul>
         </li>

    </ul>

        @else
            <!--<div>Acceso usuario</div>-->
    @endif
    
        
      
</section>
</aside>
<script>
    $(document).ready(function() {
    
        $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

        $('#search1').on('keyup',function(){

            $value=$(this).val();
            window.location.href = "{{URL::to('resultOperations')}}"
            $.ajax({
            type : 'get',
            url : "{{URL::to('search/operation')}}",
            data:{'search':$value},
            success:function(data){
                //$('tbody').html(data);
                
                //console.log(data);
                $('tbody').html(data);
                }
            });
        })


    });

    function SearchOperation(){
        var value = $("#search11").val();
        //console.log(value);
        $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
            $.ajax({
                type: "POST",
                url:"{{ url('search/operation') }}/"+value,
                dataType:'json',
                success: function(data){
                    console.log(data);
                    // window.location.href = "{{URL::to('getAllLanguages')}}"
                    
                }
            });

    }
</script>
<script type="text/javascript">
   
</script>


<!--Sidebar End-->
