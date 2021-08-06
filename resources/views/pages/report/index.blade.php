@extends('layouts.app')
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKA5z9mjBp51OKJ0Ub2rEZmOf2TDliAnk&libraries=places">
</script>
@section('title')
<h1 class="nav-title text-white"> <i class="icon icon-documents3 text-blue s-18"></i>
MARCAS</h1>
@endsection
@section('maincontent')

@include('pages.report.details')

<div class="page height-full">

    {{-- alerts --}}
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="card">
                <div class="form-group">
                    <div class="card-header white">
                        <h6> LISTA DE MARCAS </h6>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <div class="row text-right"> --}}
                        <div class="col-md-12 text-right">
                            <div class="form-group">

                            </div>
                        </div>
                    {{-- </div> --}}
                    <div id="table" class=" table-responsive">
                    <table id="mydatatable" class="table table-bordered table-hover table-sm"
                                data-order='[[ 0, "desc" ]]' data-page-length='10'>
                            <thead>
                                <tr>
                                    <th><b>NOMBRE</b></th>
                                    <th><b>IDENTIFICACIÓN</b></th>
                                    <th><b>GRUPO</b></th>
                                    <th><b>FECHA</b></th>
                                    <th><b>TIPO</b></th>
                                    <th><b>DIRECCIÓN IP</b></th>
                                    <th><b>SISTEMA</b></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach ($asistencia as $a)
                                <tr class="tbody">
                                    <td>{{ $a->user->fullname ?? null }} {{ $a->user->last_name ?? null}}</td>
                                    <td>{{ $a->user->rut ?? null }}</td>
                                    <td>{{ $a->user->grupo->group->group ?? null}}</td> 
                                    <td>{{ Carbon\Carbon::parse($a->fecha)->format('d-m-Y h:i:s A') ?? null }}</td>
                                    <td>@if(isset($a->tipo)) @if($a->tipo == 0) <a onclick="details('{{ $a->image }}','{{ $a->latitude }}','{{ $a->longitude }}')">Entrada</a> @else 
                                    <a onclick="details('{{ $a->image }}','{{ $a->latitude }}','{{ $a->longitude }}')">Salida</a> @endif @endif </td>
                                    <td>{{ $a->ip ?? null }}</td>
                                    <td>{{ $a->sistema ?? null }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Add New Message Fab Button-->

@endsection
@section('js')
<script>
$(document).ready(function() {

       var table = $('#mydatatable').DataTable( {
                   dom: '<"top"i>rt<"bottom"lp><"clear">',
                   orderCellsTop: true,
                   fixedHeader: true,
                   // dom: 'Blrtip ',
                   buttons: [],
                   info:true,
                   bLengthChange: true,
                   lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
                   order: [[7, 'desc']],
                   language: {
                       "decimal": "",
                       "emptyTable": "No hay información",
                       "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                       "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                       "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                       "infoPostFix": "",
                       "thousands": ",",
                       "lengthMenu": "Mostrar _MENU_ Entradas",
                       "loadingRecords": "Cargando...",
                       "processing": "Procesando...",
                       "search": "Buscar:",
                       "zeroRecords": "Sin resultados encontrados",
                       "paginate": {
                           "first": "Primero",
                           "last": "Ultimo",
                           "next": "Siguiente",
                           "previous": "Anterior"
                       }
                   }
               } );
   
   });

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
    }

    function fail() {
        console.log("fracaso conexion");
    }





function details(image, latitude, longitude){
 
    $('#details').modal('show');
    if(latitude != "" && longitude != ""){
        myLatLng = new google.maps.LatLng(latitude, longitude);
        createMap(myLatLng);
    }
    
    if(image != ""){
        $('#image').append('<img src="img/avatar/'+image+'" alt="" width="200" height="200">');
    }
}
function createMap(myLatLng) {
        $('#map').show();
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 12
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });
}

$(document).on('hide.bs.modal','#details', function () { 
    $('#image img').remove();
    $('#map').hide();
});

</script>
@endsection
