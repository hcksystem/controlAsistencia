@extends('layouts.app')
<style>
    .spinner {
  border: 4px solid rgba(0, 0, 0, 0.1);
  width: 70px;
  height: 70px;
  border-radius: 50%;
  border-left-color: #09f;

  animation: spin 1s ease infinite;
  position:absolute;
  z-index:3;
  left:25em;
  top:50px; opacity:0.9
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}
</style>
<script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKA5z9mjBp51OKJ0Ub2rEZmOf2TDliAnk&libraries=places">
        </script>
@section('title')
<h1 class="nav-title text-white"> <i class="icon-home2"></i>
    Tablero @if(session()->has('idEdificio')) | {{ session('nameEdificio')}} @endif</h1>
@endsection

@section('maincontent')
@include('pages.asistencia')
<div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort" style="margin-top:-40px;">

            <div class="d-flex row row-eq-height my-3">
                <div class="col-md-5">
                    <div class="card text-center">
                        <div class="p-4">

                                <div class=" pt-2 pb-1" style="background-color:#f5f8fa">
                                    <h4 class="text-center font-weight-normal ">Registrar Nueva Marcación</h4>
                                </div>
                                <div class="content">
                                    <h6 class="pt-2 pb-2" > HORA ACTUAL </h6>
                                    <h1 class="text-blue "  id="hour"></h1>

                                      <div class="row p-t-b-10 ">
                    <div class="col">
                        <div class="pb-3">
                            <div class="image mr-3  float-left">
                                 @if(isset(Auth::user()->image))
                                    {{ Html::image('img/avatar/'.Auth::user()->image ?? 'dummy/u1.png', 'a picture', array('alt'=>'Logo','class'=>'user_avatar no-b no-p')) }}
                                 @else
                                 {{ Html::image('img/avatar/dummy/u1.png', 'a picture', array('alt'=>'Logo','class'=>'user_avatar no-b no-p')) }}
                                 @endif
                            </div>
                            <div>
                                <h6 class="p-t-10 text-left">{{ Auth::user()->fullname }} {{ Auth::user()->last_name }}</h6>
                                <h6 class="p-t-10 text-left">{{ Auth::user()->rut ??  null }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-left"><b>Última Marca: </b>{{$asistencia->fecha ?? null }}</p>
                <p class="text-left"><b>Tipo de Marca:</b>@if(isset($asistencia->tipo))@if($asistencia->tipo == 0) Entrada @else Salida @endif @endif</p>
                <p class="text-left"><b>IP: </b>{{$asistencia->ip ?? null }}</p>
                </div>

                <div class="footer text-left">
                        <p>Para registrar asistencia presione el botón abajo.
                        Por seguridad se guardará
                        su IP, foto y geolocalización.
                        </p>
                </div>
                                @if(isset($asistencia))
                                    @if($asistencia->tipo == 0)
                                        <input type="hidden" value="1" name="tipo">
                                        <a onclick="mostrarAsistencia()" class="btn btn-danger col-6 mw-100">Registrar Salida</a>
                                    @else
                                        <input type="hidden" value="0" name="tipo">
                                        <a onclick="mostrarAsistencia()" class="btn btn-success col-6 mw-100">Registrar Entrada</a>
                                    @endif
                                @else
                                    <input type="hidden" value="0" name="tipo">
                                    <a onclick="mostrarAsistencia()" class="btn btn-success col-6 mw-100">Registrar Entrada</a>
                                @endif
                            </form>
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
  mueveReloj();
   function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    horaImprimible = hora + " : " + minuto + " : " + segundo

    $('#hour').html(horaImprimible)

    setTimeout("mueveReloj()",1000)
    window.onload=function(){mueveReloj();}
    }


    function mostrarAsistencia() {
       $('#create').modal('show');
    }

    $(document).ready(function(){

    var webCamElement = document.getElementById("webcam");
    var canvasElement = document.getElementById("canvas");
    const webcam = new Webcam(webCamElement, 'user', canvasElement, null);

    $('#btnCamara').click(function(){

        webcam.start()
        .then(result =>{
            console.log("webcam started");
        })
        .catch(err => {
            console.log(err);
        });

        $('#btnCamara').hide();
        $('#btnOcultarCamara').show();
        $('#checker').show();
    });


    //$('#camera').style.display="none";
    //$('#camera').attr('visibility', 'hidden');
    //$('#camera').attr('display', 'block');

    $('#checker').click(function(){
        picture = webcam.snap();
        console.log(picture);
        $(".image-tag").val(picture);
        webcam.stop();
        $('#checker').hide();
    }); /*END click*/


    $('#btnOcultarCamara').click(function(){

        webcam.stop();
        $('#btnCamara').show();
        $('#btnOcultarCamara').hide();
        $('#checker').hide();
    });



});/* END ready*/

var map;
var myLatLng;
$(document).ready(function() {
    geoLocationInit();
});
    function geoLocationInit() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Browser not supported");
        }
    }

    function success(position) {
        console.log(position);
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;
        myLatLng = new google.maps.LatLng(latval, lngval);
        $("#lngval").val(lngval);
        $("#latval").val(latval);

        //createMap(myLatLng);
    }

    function fail() {
        console.log("fracaso conexion");
    }

   /* function createMap(myLatLng) {
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });
    }*/

    enviando = false; //Obligaremos a entrar el if en el primer submit

    function checkSubmit() {
        if (!enviando) {
    		enviando= true;
    		return true;
        } else {
            //Si llega hasta aca significa que pulsaron 2 veces el boton submit
            alert("El formulario ya se esta enviando");
            return false;
        }
    }
</script>
@endsection
