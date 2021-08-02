@extends('layouts.app')
@section('title')
<h1 class="nav-title text-white"> <i class="icon-home2"></i>
    Tablero @if(session()->has('idEdificio')) | {{ session('nameEdificio')}} @endif</h1>
@endsection

@section('maincontent')

<div class="container-fluid animatedParent animateOnce my-3" onload="mueveReloj()">
        <div class="animated fadeInUpShort" style="margin-top:-40px;">

            <div class="d-flex row row-eq-height my-3">
                <div class="col-md-8">
                    <div class="card text-center">
                        <div class="p-4">
                            <form id="formAsistencia">
                                <div class="header text-left mb-2" style="background-color:#d4d2d2">
                                    <h6>Registrar Nueva Marcación</h6>
                                </div>
                                <div class="content">
                                    <h6 class="pt-2 pb-2" style="background-color:#d4d2d2"> HORA ACTUAL </h6>
                                    <h1 class="text-blue" id="hour">{{ date('H:i:s') }}</h1>
                                    <p class="text-left"><b>Última Marca:</b>{{$asistencia->fecha ?? null }}</p>
                                    <p class="text-left"><b>Tipo Marca:</b>@if($asistencia->tipo == 1) Entrada @else Salida @endif</p>
                                </div>
                                <div class="footer text-left">
                                    <p>Para registrar asistencia presione el botón correspondiente
                                        al tipo de marcación que desea generar. Por seguridad se guardará
                                        la dirección IP y Geolocalización  del equipo donde realiza la marcación
                                    </p>
                                </div>
                                @if(isset($asistencia))
                                <a onclick="actualizarAsistencia({{ $asistencia->id }})" class="btn btn-danger col-6">Registrar Salida</a>
                                @else
                                <a onclick="guardarAsistencia()" class="btn btn-success col-6">Registrar Entrada</a>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="white">
                        <div class="card">
                   
                            <div class="card-body no-p">
                               
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
  
   function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible
    $('#hour').html(horaImprimible)

    setTimeout("mueveReloj()",1000)
    window.onload=function(){mueveReloj();}
    }
</script>
@endsection
