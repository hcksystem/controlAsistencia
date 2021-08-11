@extends('layouts.app')
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKA5z9mjBp51OKJ0Ub2rEZmOf2TDliAnk&libraries=places">
</script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
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
        //createMap2(myLatLng);
        console.log(longitude+"-"+latitude)
        var mymap = L.map('mapid').setView([latitude, longitude], 13);
        $('#map').show();

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZ2Fib2xlYWwxMjMiLCJhIjoiY2tqYWh1bmYxMW9zOTJ6bnllZDJ5cHU1ZiJ9.dWucc-gHwan1ANwOgt2fFQ', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiZ2Fib2xlYWwxMjMiLCJhIjoiY2tqYWh1bmYxMW9zOTJ6bnllZDJ5cHU1ZiJ9.dWucc-gHwan1ANwOgt2fFQ'
        }).addTo(mymap);

        var myIcon = L.divIcon({className: 'my-div-icon'});

        var popup = L.popup()
        .setLatLng([latitude, longitude])
        .openOn(mymap);
    }

    if(image != ""){
        $('#image').append('<img src="img/avatar/'+image+'" alt="" id="img_marca" width="200" height="200">');
    }
}
function createMap(myLatLng) {
        $('#map').show();
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map
        });
}

function createMap2(lat,long) {
    var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([long, lat]),
          zoom:3
        })
      });
}



$(document).on('hide.bs.modal','#details', function () {
    $('#img_marca').remove();
    var container= L.DomUtil.get('mapid');
    if(container != null){

            container._leaflet_id = null;

    }
});

</script>
@endsection
