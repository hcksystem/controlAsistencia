@extends('app')
@section('content')
<div class="page parallel">
    <div class="d-flex row">
        <div class="col-md-3 white">
            <div class="p-5 mt-5">
                <img src="assets/img/basic/logo.png" alt=""/>
            </div>

            <div class="p-5">
                @if(count($edificios) > 0)
                <h3>Seleccione edificio</h3>
               
                {!! Form::open(['route'=>'loginUser','method'=>'POST']) !!}
               
                    {{ csrf_field() }}
                    <div class="form-group m-0" id="modulo_group">
                            
                            {!! Form::select('edificio_id', $edificios, null, ['class'=>'form-control r-0 light s-12', 'id'=>'edificio_id', 'onclick'=>'inputClear(this.id)']) !!}
                            {!! Form::hidden('user_id', $user, ['class'=>'form-control r-0 light s-12', 'id'=>'user_id', 'onclick'=>'inputClear(this.id)']) !!}
                            <span class="status_span"></span>
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg btn-block mt-2" value="Continuar">
               @else  
                <p> Este Usuario no posee edificios asignados</p>   
               @endif
                {!! Form::close() !!}
                <div class="col-md-12">
                                <a href="{{ route('logout') }}" class="btn btn-info btn-lg btn-block mt-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Salir                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
            </div>
        </div>
        <div class="col-md-9  height-full blue accent-3 align-self-center text-center" data-bg-repeat="false"
             data-bg-possition="center"
             style="background: url('./assets/img/app/bgLogin.jpg') #FFEFE4">
        </div>
    </div>
</div>
@endsection