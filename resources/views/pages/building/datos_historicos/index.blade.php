@extends('layouts.app')

@section('title')
<h1 class="nav-title text-white"><i class="icon icon-building s-18"></i><a href="{{ route('buildings.index')}}">{{ __('Edificios')}}</a> > <a  href="{{ route('buildings.show',$building) }}">{{$building->name}}</a> > Datos Historicos</h1>
@endsection
@section('top-menu')
    {{-- header --}}
    @include('pages.building.headbar')
    {{-- end header --}}
@endsection

@section('maincontent')
@include('pages.building.datos_historicos.arriendo')
@include('pages.building.datos_historicos.calificacion')
@include('pages.building.datos_historicos.edit')
@include('pages.building.datos_historicos.demanda')
@include('pages.building.datos_historicos.deuda')
@include('pages.building.datos_historicos.gasto')
@include('pages.building.datos_historicos.gasto_fijo')

<div>
    @include('alerts.toastr')
</div>
<div class="page  height-full">

    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
          <div class="row">
              <div class="col-md-6">
                  <div class="card">
                     <div class="card-body">
                           <div class="box">
                              <div class="box-header with-border">
                                  <h5 class="box-title">Recambio de Persona por Propiedad</h5>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table table-bordered" data-page-length="12" id="recambio" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 60px">Periódo</th>
                                              <th style="width: 40px">%</th>
                                              <th style="width: 80px">Frecuencia</th>
                                              <th style="width: 10px"></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                              </div>
                             
                          </div>
                          
                      </div>
                  </div>
              </div>
               <div class="col-md-6">
                  <div class="card">
                     <div class="card-body">
                           <div class="box">
                              <div class="box-header with-border">
                                  <h5 class="box-title">Demanda</h5>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table table-bordered" data-page-length="12" id="demanda" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 60px">Periódo</th>
                                              <th style="width: 10px">Demanda</th>
                                              <th style="width: 40px">Notas</th>
                                              <th style="width: 10px"></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                              </div>
                             
                          </div>
                          
                      </div>
                  </div>
              </div>
           </div>
           <div class="row">
               <div class="col-md-6">
                  <div class="card">
                     <div class="card-body">
                           <div class="box">
                              <div class="box-header with-border">
                                  <h5 class="box-title">Calificación</h5>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table table-bordered" data-page-length="12" id="calificacion" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 60px">Periódo</th>
                                              <th style="width: 10px">Calificacion</th>
                                              <th style="width: 10px"></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                              </div>
                             
                          </div>
                          
                      </div>
                  </div>
              </div>
              <div class="col-md-6">
                   <div class="card">
                     <div class="card-body">
                           <div class="box">
                              <div class="box-header with-border">
                                  <h5 class="box-title">Gastos Fijos</h5>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table table-bordered" data-page-length="12" id="table_gastos_fijos" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 10px">Agua</th>
                                              <th style="width: 10px">Luz</th>
                                              <th style="width: 10px">Telefono</th>
                                              <th style="width: 10px">Conserjes</th>
                                              <th style="width: 10px"></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                              </div>
                             
                          </div>
                          
                      </div>
                  </div>
              </div>

           </div>
           <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                           <div class="box">
                              <div class="box-header with-border">
                                  <h5 class="box-title">Arriendo</h5>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table table-bordered" data-page-length="12" id="table_arriendo" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 60px">Periódo</th>
                                              <th style="width: 40px">Tipología</th>
                                              <th style="width: 40px">Monto</th>
                                              <th style="width: 10px"></th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                              </div>
                             
                          </div>
                          
                      </div>
                  </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-12" style="width:100%;" class="display nowrap">
                  <div class="card">
                     <div class="card-body">
                           <div class="box">
                              <div class="box-header with-border">
                                  <h5 class="box-title">Mantención Mayordomo</h5>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table table-bordered" data-page-length="12" id="table_mant" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 20px">Periódo</th>
                                              <th style="width: 20px">Lavandería</th>
                                              <th style="width: 20px">Quinchos</th>
                                              <th style="width: 20px">Piscinas</th>

                                              <th style="width: 20px">Salon</th>
                                              <th style="width: 20px">Gimnasio</th>
                                              <th style="width: 20px">Sala Cine</th>
                                              <th style="width: 20px">Sala Juegos</th>

                                              <th style="width: 20px">Calderas</th>
                                              <th style="width: 20px">Bombas</th>
                                              <th style="width: 20px">Paneles</th>
                                              <th style="width: 20px">Ascensores</th>
                                             
                                              <th style="width: 20px">Portones</th>
                                              <th style="width: 20px">Camaras</th>
                                              <th style="width: 20px">Areas Verdes</th>
                                              <th style="width: 20px">Aseo</th>
                                              
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                              </div>
                             
                          </div>
                          
                      </div>
                  </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-12" style="width:100%;" class="display nowrap">
                  <div class="card">
                     <div class="card-body">
                           <div class="box">
                              <div class="box-header with-border">
                                  <h5 class="box-title">Mantención Copropetario</h5>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table table-bordered" data-page-length="12" id="table_mant_co" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 20px">Periódo</th>
                                              <th style="width: 20px">Lavandería</th>
                                              <th style="width: 20px">Quinchos</th>
                                              <th style="width: 20px">Piscinas</th>

                                              <th style="width: 20px">Salon</th>
                                              <th style="width: 20px">Gimnasio</th>
                                              <th style="width: 20px">Sala Cine</th>
                                              <th style="width: 20px">Sala Juegos</th>

                                              <th style="width: 20px">Calderas</th>
                                              <th style="width: 20px">Bombas</th>
                                              <th style="width: 20px">Paneles</th>
                                              <th style="width: 20px">Ascensores</th>
                                             
                                              <th style="width: 20px">Portones</th>
                                              <th style="width: 20px">Camaras</th>
                                              <th style="width: 20px">Areas Verdes</th>
                                              <th style="width: 20px">Aseo</th>
                                          </tr>
                                      </thead>
                                      <tbody></tbody>
                                  </table>
                              </div>
                             
                          </div>
                          
                      </div>
                  </div>
              </div>
           </div>
           <div class="row">
              
              <div class="col-md-12">
                     <div class="card" style="margin-top: 10px;">
                       <div class="card-body">
                             <div class="box">
                                <div class="box-header with-border">
                                    <h5 class="box-title">Mora en Gastos Comunes</h5>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered" data-page-length="12" id="table_gastos" style="font-size:11px;">
                                        <thead>
                                            <tr>
                                                <th style="width: 60px">Periódo</th>
                                                <th style="width: 10px">Gastos</th>
                                                <th style="width: 10px">(1 mes) %</th>
                                                <th style="width: 10px">(3 mes) %</th>
                                                <th style="width: 10px">(6 mes) %</th>
                                                <th style="width: 10px">(12 mes) %</th>
                                                <th style="width: 10px">(+12 mes) %</th>
                                                <th style="width: 10px"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                               
                            </div>
                            
                        </div>
                      </div>
               </div>

           </div>  
            {!! Form::hidden('edificio_id', $building->id, ['class'=>'form-control r-0 light s-12', 'id'=>'_edificio_id']) !!}

            
        </div>
    </div>
    <!--Add New Message Fab Button-->
   
</div>


                  
                
@endsection
@section('js')

<script>

  demanda();
  deuda();
  calificacion();
  manuntencion_mayordomo();
  manuntencion_copropetario();
  gastos_comunes();
  gastos_fijos();
  arriendo();

  function demanda(){


        var id = $('#_edificio_id').val();

        $('#demanda').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
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
                },
                "ajax": {
                        url: "{{ url('demanda') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                         columns: [
                                    {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                   {
                                    data:'deuda',
                                    className: 'text-center',
                                    },
                                    {
                                    data:'concepto',
                                    className: 'text-center',
                                    },
                                   
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editDemanda('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

  function deuda(){


        var id = $('#_edificio_id').val();

        $('#table_deuda').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
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
                },
                "ajax": {
                        url: "{{ url('deuda') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                         columns: [
                                    {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['agua']+'. Monto:'+row['agua_monto']+'$  '+row['agua_resolucion']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['luz']+'. Monto:'+row['luz_monto']+'$  '+row['luz_resolucion']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['gas']+'. Monto:'+row['gas_monto']+'$  '+row['gas_resolucion']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editDeuda('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

    function calificacion(){


        var id = $('#_edificio_id').val();

        $('#calificacion').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
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
                },
                "ajax": {
                        url: "{{ url('calificacion') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                           columns: [
                                    {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                   {
                                    data:'calificacion',
                                    className: 'text-center',
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editCalificacion('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

   function manuntencion_mayordomo(){


        var id = $('#_edificio_id').val();

        $('#table_mant').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "scrollX": true,
                "language": {
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
                },
                "ajax": {
                        url: "{{ url('mantencion') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                           columns: [
                                    {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                   { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox"  name="lavanderia_check_box'+row['id']+'" '+row['lavanderia']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                   { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="quinchos_check_box'+row['id']+'" '+row['quinchos']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                   { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="piscinas_check_box'+row['id']+'" '+row['piscinas']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="salon_check_box'+row['id']+'" '+row['salon']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="gimnasio_check_box'+row['id']+'" '+row['gimnasio']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="sala_cine_check_box'+row['id']+'" '+row['sala_cine']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="sala_juegos_check_box'+row['id']+'" '+row['sala_juegos']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="calderas_check_box'+row['id']+'" '+row['calderas']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="bombas_check_box'+row['id']+'" '+row['bombas']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="paneles_check_box'+row['id']+'" '+row['paneles']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="ascensores_check_box'+row['id']+'" '+row['ascensores']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="portones_check_box'+row['id']+'" '+row['portones']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="camaras_check_box'+row['id']+'" '+row['camaras']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="areas_verdes_check_box'+row['id']+'" '+row['areas_verdes']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="aseo_check_box'+row['id']+'" '+row['aseo']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }
                                ]
         });



  }


function manuntencion_copropetario(){


        var id = $('#_edificio_id').val();

        $('#table_mant_co').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "scrollX": true,
                "language": {
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
                },
                "ajax": {
                        url: "{{ url('mantencionCo') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                           columns: [
                                    {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                   { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox"  name="lavanderia_co_check_box'+row['id']+'" '+row['lavanderia']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                   { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="quinchos_co_check_box'+row['id']+'" '+row['quinchos']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="piscinas_co_check_box'+row['id']+'" '+row['piscinas']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="salon_co_check_box'+row['id']+'" '+row['salon']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="gimnasio_co_check_box'+row['id']+'" '+row['gimnasio']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="sala_cine_co_check_box'+row['id']+'" '+row['sala_cine']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="sala_juegos_co_check_box'+row['id']+'" '+row['sala_juegos']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="calderas_co_check_box'+row['id']+'" '+row['calderas']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="bombas_co_check_box'+row['id']+'" '+row['bombas']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="paneles_co_check_box'+row['id']+'" '+row['paneles']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="ascensores_co_check_box'+row['id']+'" '+row['ascensores']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="portones_co_check_box'+row['id']+'" '+row['portones']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="camaras_co_check_box'+row['id']+'" '+row['camaras']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="areas_verdes_co_check_box'+row['id']+'" '+row['areas_verdes']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionCo('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="aseo_co_check_box'+row['id']+'" '+row['aseo']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMantencionMa('+row['id']+')"></div>';
                                    },
                                    className: 'text-center'  
                                   }
                                ]
         });



  }

function gastos_comunes(){


        var id = $('#_edificio_id').val();

        $('#table_gastos').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
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
                },
                "ajax": {
                        url: "{{ url('gastos_comunes') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                         columns: [
                                    {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['gastos_comunes']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['mgc_1mes']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['mgc_3mes']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['mgc_6mes']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['mgc_12mes']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['mgc_12mes_mas']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editGastos('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }

  function gastos_fijos(){


        var id = $('#_edificio_id').val();

        $('#table_gastos_fijos').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "ajax": {
                        url: "{{ url('gastos_fijos') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                         columns: [
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['agua']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['luz']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['telefono']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                    {
                                    "mRender": function ( data, type, row ) {
                                      return '<div><p style="font-size:10px;">'+row['conserjes']+'</p></div>'
                                        },
                                        className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editGastosFijos('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }



 $(document).ready(function() {
        var id = $('#_edificio_id').val();

        
        $('#recambio').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "pageLength": 12,
                "bPaginate": false,
                 "bInfo": false,
                "ajax": {
                        url: "{{ url('recambio') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                         columns: [
                                   {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<span class="badge text-white '+row['color']+' ">'+row['porcentaje']+'</span>'
                                        },
                                     className: 'text-center'
                                    },
                                   {
                                    data:'frecuencia',
                                     className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editRecambio('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });

       

    });


  function editRecambio(id){

    $("#edit").modal("show");
        
        var url ="{{url('getRecambio')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#periodo').val(data['0'].periodo);
              $('#frecuencia').val(data['0'].frecuencia_id);
              $('#id_recambio').val(data['0'].id);
              console.log(data);
              
            }
          });

  }


  function editArriendo(id){

    $("#modal_arriendo").modal("show");
        
        var url ="{{url('getArriendo')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#periodo_mes').val(data['0'].mes);
              $('#arriendo').val(data['0'].arriendo);
              $('#id_arriendo').val(data['0'].id);
              $('#tipologia_id').val(data['0'].tipologia_id);
              
            }
          });

  }


  function editDemanda(id){

    $("#modal_demanda").modal("show");
        
        var url ="{{url('getDemanda')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#periodo_demanda').val(data['0'].periodo);
              $('#deuda').val(data['0'].deuda);
              $('#id_demanda').val(data['0'].id);
              $('#concepto').val(data['0'].concepto);
              
            }
          });

  }

    function editCalificacion(id){

    $("#modal_calificacion").modal("show");
        
        var url ="{{url('getCalificacion')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#periodo_calificacion').val(data['0'].periodo);
              $('#nota_calificacion').val(data['0'].calificacion);
              $('#id_calificacion').val(data['0'].id);
     
            }
          });

  }

   function editDeuda(id){

    $("#modal_deuda").modal("show");
        
        var url ="{{url('getDeuda')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#periodo_deuda').val(data.periodo);
              $('#id_deuda').val(data.id);
              $('#agua').val(data.agua);
              $('#luz').val(data.luz);
              $('#gas').val(data.gas);
              $('#agua_monto').val(data.agua_monto);
              $('#luz_monto').val(data.luz_monto);
              $('#gas_monto').val(data.gas_monto);
              $('#agua_resolucion').val(data.agua_resolucion);
              $('#luz_resolucion').val(data.luz_resolucion);
              $('#gas_resolucion').val(data.gas_resolucion);

              
            }
          });

  }

    function editGastos(id){

    $("#modal_gastos").modal("show");
        
        var url ="{{url('getGasto')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#gastos_comunes').val(data.gastos_comunes);
              $('#mgc_1mes').val(data.mgc_1mes);
              $('#mgc_3mes').val(data.mgc_3mes);
              $('#mgc_6mes').val(data.mgc_6mes);
              $('#mgc_12mes').val(data.mgc_12mes);
              $('#mgc_12mes_mas').val(data.mgc_12mes_mas);
              $('#id_gasto').val(data.id);
              //console.log(data);
              
            }
          });

  }

  function editGastosFijos(id){

    $("#modal_gastos_fijos").modal("show");
        
        var url ="{{url('getGastoFijo')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#gasto_agua').val(data.agua);
              $('#gasto_luz').val(data.luz);
              $('#telefono').val(data.telefono);
              $('#conserjes').val(data.conserjes);
              $('#id_gasto_fijo').val(data.id);
              //console.log(data);
              
            }
          });

  }


  function recrear(){


        var id = $('#_edificio_id').val();

        $('#recambio').DataTable().clear().destroy();
        $('#recambio').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "pageLength": 12,
                "bPaginate": false,
                "bInfo": false,
                "ajax": {
                        url: "{{ url('recambio') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        //console.log(d);
                                        }
                         },
                         columns: [
                                   {
                                    data:'periodo',
                                    className: 'text-center',
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<span class="badge text-white '+row['color']+' ">'+row['porcentaje']+'</span>'
                                        },
                                     className: 'text-center'
                                    },
                                   {
                                    data:'frecuencia',
                                     className: 'text-center'
                                    },
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editRecambio('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }


  function arriendo(){


        var id = $('#_edificio_id').val();

        $('#table_arriendo').DataTable({
                "processing": true,
                "serverSide": true,
                "lengthChange": false,
                "bFilter": false,
                "bSort" : false,
                "bPaginate": false,
                "pageLength": 12,
                "bInfo": false,
                "language": {
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
                },
                "ajax": {
                        url: "{{ url('arriendo') }}/"+id,
                        type:'GET',
                        'headers': {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    'data': function (d) {
                                        
                                        }
                         },
                         columns: [
                                    {
                                    data:'mes',
                                    className: 'text-center',
                                    },
                                   {
                                    data:'tipologia',
                                    className: 'text-center',
                                    },
                                    {
                                    data:'arriendo',
                                    className: 'text-center',
                                    },
                                   
                                   {
                                    "mRender": function ( data, type, row ) {
                                      return '<a onclick=editArriendo('+row['id']+') class="btn btn-default btn-sm" style="padding: .10rem .4rem;" title="Edit"><i class="icon-pencil text-info"></i></a>'
                                        },
                                        className: 'text-center'
                                    }
                                ]
         });



  }



  function actualizarMantencionMa(id){
     let lavanderia = $("input:checkbox[name=lavanderia_check_box"+id+"]").is(":checked");
     let quinchos = $("input:checkbox[name=quinchos_check_box"+id+"]").is(":checked");
     let piscinas = $("input:checkbox[name=piscinas_check_box"+id+"]").is(":checked");
     let salon = $("input:checkbox[name=salon_check_box"+id+"]").is(":checked");

     let gimnasio = $("input:checkbox[name=gimnasio_check_box"+id+"]").is(":checked");
     let sala_cine = $("input:checkbox[name=sala_cine_check_box"+id+"]").is(":checked");
     let sala_juegos = $("input:checkbox[name=sala_juegos_check_box"+id+"]").is(":checked");
     let calderas = $("input:checkbox[name=calderas_check_box"+id+"]").is(":checked");

     let bombas = $("input:checkbox[name=bombas_check_box"+id+"]").is(":checked");
     let paneles = $("input:checkbox[name=paneles_check_box"+id+"]").is(":checked");
     let ascensores = $("input:checkbox[name=ascensores_check_box"+id+"]").is(":checked");
     let portones = $("input:checkbox[name=portones_check_box"+id+"]").is(":checked");

     let camaras = $("input:checkbox[name=camaras_check_box"+id+"]").is(":checked");
     let areas_verdes = $("input:checkbox[name=areas_verdes_check_box"+id+"]").is(":checked");
     let aseo = $("input:checkbox[name=aseo_check_box"+id+"]").is(":checked");

     if(lavanderia == true){
       lavanderia = 1
     }else{
        lavanderia = 0
     }

     if(quinchos == true){
       quinchos = 1
     }else{
        quinchos = 0
     }

     if(piscinas == true){
       piscinas = 1
     }else{
        piscinas = 0
     }

     if(salon == true){
       salon = 1
     }else{
        salon = 0
     }

     if(gimnasio == true){
       gimnasio = 1
     }else{
        gimnasio = 0
     }

     if(sala_cine == true){
       sala_cine = 1
     }else{
        sala_cine = 0
     }

     if(sala_juegos == true){
       sala_juegos = 1
     }else{
        sala_juegos = 0
     }

     if(calderas == true){
       calderas = 1
     }else{
        calderas = 0
     }

    if(bombas == true){
       bombas = 1
     }else{
        bombas = 0
     }

    if(paneles == true){
       paneles = 1
     }else{
        paneles = 0
     }


    if(ascensores == true){
       ascensores = 1
     }else{
        ascensores = 0
     }

    if(portones == true){
       portones = 1
     }else{
        portones = 0
     }

     if(camaras == true){
       camaras = 1
     }else{
        camaras = 0
     }

     if(areas_verdes == true){
       areas_verdes = 1
     }else{
        areas_verdes = 0
     }

     if(aseo == true){
       aseo = 1
     }else{
        aseo = 0
     }


      var data = {id: id, lavanderia:lavanderia, quinchos:quinchos, piscinas:piscinas, salon:salon,
               gimnasio:gimnasio, sala_cine:sala_cine, sala_juegos:sala_juegos, calderas:calderas,bombas:bombas, paneles:paneles, ascensores:ascensores, portones:portones, camaras:camaras, areas_verdes:areas_verdes, aseo:aseo}
      console.log(data);

       var url ="{{url('updateMantencion')}}";
    
          $.ajax({
            type : 'POST',
            url  : url,
            data : data,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
             
              $('#table_mant').DataTable().clear().destroy();
              manuntencion_mayordomo();
              
            }
          });
  }

  function actualizarMantencionCo(id){
     let lavanderia = $("input:checkbox[name=lavanderia_co_check_box"+id+"]").is(":checked");
     let quinchos = $("input:checkbox[name=quinchos_co_check_box"+id+"]").is(":checked");
     let piscinas = $("input:checkbox[name=piscinas_co_check_box"+id+"]").is(":checked");
     let salon = $("input:checkbox[name=salon_co_check_box"+id+"]").is(":checked");

     let gimnasio = $("input:checkbox[name=gimnasio_co_check_box"+id+"]").is(":checked");
     let sala_cine = $("input:checkbox[name=sala_cine_co_check_box"+id+"]").is(":checked");
     let sala_juegos = $("input:checkbox[name=sala_juegos_co_check_box"+id+"]").is(":checked");
     let calderas = $("input:checkbox[name=calderas_co_check_box"+id+"]").is(":checked");

     let bombas = $("input:checkbox[name=bombas_co_check_box"+id+"]").is(":checked");
     let paneles = $("input:checkbox[name=paneles_co_check_box"+id+"]").is(":checked");
     let ascensores = $("input:checkbox[name=ascensores_co_check_box"+id+"]").is(":checked");
     let portones = $("input:checkbox[name=portones_co_check_box"+id+"]").is(":checked");

     let camaras = $("input:checkbox[name=camaras_co_check_box"+id+"]").is(":checked");
     let areas_verdes = $("input:checkbox[name=areas_verdes_co_check_box"+id+"]").is(":checked");
     let aseo = $("input:checkbox[name=aseo_co_check_box"+id+"]").is(":checked");

     if(lavanderia == true){
       lavanderia = 1
     }else{
        lavanderia = 0
     }

     if(quinchos == true){
       quinchos = 1
     }else{
        quinchos = 0
     }

     if(piscinas == true){
       piscinas = 1
     }else{
        piscinas = 0
     }

     if(salon == true){
       salon = 1
     }else{
        salon = 0
     }

     if(gimnasio == true){
       gimnasio = 1
     }else{
        gimnasio = 0
     }

     if(sala_cine == true){
       sala_cine = 1
     }else{
        sala_cine = 0
     }

     if(sala_juegos == true){
       sala_juegos = 1
     }else{
        sala_juegos = 0
     }

     if(calderas == true){
       calderas = 1
     }else{
        calderas = 0
     }

    if(bombas == true){
       bombas = 1
     }else{
        bombas = 0
     }

    if(paneles == true){
       paneles = 1
     }else{
        paneles = 0
     }


    if(ascensores == true){
       ascensores = 1
     }else{
        ascensores = 0
     }

    if(portones == true){
       portones = 1
     }else{
        portones = 0
     }

     if(camaras == true){
       camaras = 1
     }else{
        camaras = 0
     }

     if(areas_verdes == true){
       areas_verdes = 1
     }else{
        areas_verdes = 0
     }

     if(aseo == true){
       aseo = 1
     }else{
        aseo = 0
     }


      var data = {id: id, lavanderia:lavanderia, quinchos:quinchos, piscinas:piscinas, salon:salon,
               gimnasio:gimnasio, sala_cine:sala_cine, sala_juegos:sala_juegos, calderas:calderas,bombas:bombas, paneles:paneles, ascensores:ascensores, portones:portones, camaras:camaras, areas_verdes:areas_verdes, aseo:aseo}
      console.log(data);

       var url ="{{url('updateMantencionCo')}}";
    
          $.ajax({
            type : 'POST',
            url  : url,
            data : data,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
             
              $('#table_mant_co').DataTable().clear().destroy();
              manuntencion_copropetario();
              
            }
          });
  }
</script>
@endsection