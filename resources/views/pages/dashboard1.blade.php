@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"> <i class="icon-home2"></i>
    Tablero @if(session()->has('idEdificio')) | {{ session('nameEdificio')}} @endif</h1>
@endsection

@section('maincontent')

<div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort" style="margin-top:-40px;">

            <div class="d-flex row row-eq-height my-3">
                <div class="col-md-8">
                    <div class="card">
                        @if((Auth::user()->hasRole('admin')))
                        {{ Html::image('img/db/administrador/principal.jpg', 'a picture', array('alt'=>'Logo')) }}
                        @elseif((Auth::user()->hasRole('copro')))
                        {{ Html::image('img/db/copropietario/principal.jpg', 'a picture', array('alt'=>'Logo')) }}
                        @elseif((Auth::user()->hasRole('corredor')))
                        {{ Html::image('img/db/corredor/principal.jpg', 'a picture', array('alt'=>'Logo')) }}
                        @elseif((Auth::user()->hasRole('mayor')))
                        {{ Html::image('img/db/mayordomo/principal.jpg', 'a picture', array('alt'=>'Logo')) }}
                        @elseif((Auth::user()->hasRole('operador')))
                        {{ Html::image('img/db/empresaexterna/principal.jpg', 'a picture', array('alt'=>'Logo')) }}
                        @elseif((Auth::user()->hasRole('super')))
                        {{ Html::image('img/db/super/principal.jpg', 'a picture', array('alt'=>'Logo')) }}
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="white">
                        <div class="card">
                   
                            <div class="card-body no-p">
                                <div class="tab-content" >
                                    <a href="{{ route('passwordReset') }}">
                                    <div class="tab-pane animated fadeIn show active mb-2" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                                    @if((Auth::user()->hasRole('admin')))
                                    <img src="{{URL::asset('img/db/administrador/lateral1.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('copro')))
                                    <img src="{{URL::asset('img/db/copropietario/lateral1.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('corredor')))
                                    <img src="{{URL::asset('img/db/corredor/lateral1.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('mayor')))
                                    <img src="{{URL::asset('img/db/mayordomo/lateral1.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('operador')))
                                    <img src="{{URL::asset('img/db/empresaexterna/lateral1.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('super')))
                                    <img src="{{URL::asset('img/db/super/lateral1.jpg')}}" style="width:100%">
                                 
                                    @endif
     
                                    </div>
                                </a>
                                <a href="{{ route('buildings.index') }}" >
                                    <div class="tab-pane animated fadeIn show active mb-2" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                                    @if((Auth::user()->hasRole('admin')))
                                    <img src="{{URL::asset('img/db/administrador/lateral2.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('copro')))
                                    <img src="{{URL::asset('img/db/copropietario/lateral2.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('corredor')))
                                    <img src="{{URL::asset('img/db/corredor/lateral2.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('mayor')))
                                    <img src="{{URL::asset('img/db/mayordomo/lateral2.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('operador')))
                                    <img src="{{URL::asset('img/db/empresaexterna/lateral2.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('super')))
                                    <img src="{{URL::asset('img/db/super/lateral2.jpg')}}" style="width:100%">
                                 
                                    @endif
     
     
                                    </div>
                                </a>
                                <a href="{{ route('getAllAnuncios') }}">
                                    <div class="tab-pane animated fadeIn show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                                    @if((Auth::user()->hasRole('admin')))
                                    <img src="{{URL::asset('img/db/administrador/lateral3.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('copro')))
                                    <img src="{{URL::asset('img/db/copropietario/lateral3.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('corredor')))
                                    <img src="{{URL::asset('img/db/corredor/lateral3.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('mayor')))
                                    <img src="{{URL::asset('img/db/mayordomo/lateral3.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('operador')))
                                    <img src="{{URL::asset('img/db/empresaexterna/lateral3.jpg')}}" style="width:100%">
                                    @elseif((Auth::user()->hasRole('super')))
                                    <img src="{{URL::asset('img/db/super/lateral3.jpg')}}" style="width:100%">
                    
                                    @endif
                                    </div>
                                </a>
                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>

@endsection
@section('js')
<script>
   
</script>
@endsection
