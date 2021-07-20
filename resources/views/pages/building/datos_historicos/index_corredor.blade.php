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
                                  <h5 class="box-title">Deuda</h5>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  <table class="table table-bordered" data-page-length="12" id="table_deuda" style="font-size:11px;">
                                      <thead>
                                          <tr>
                                              <th style="width: 60px">Periodo</th>
                                              <th style="width: 40px">Agua</th>
                                              <th style="width: 40px">Luz</th>
                                              <th style="width: 40px">Gas</th>
                                             
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
                                              <th style="width: 20px">Periodo</th>
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
                                              <th style="width: 20px">Periodo</th>
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
                {!! Form::hidden('edificio_id', $building->id, ['class'=>'form-control r-0 light s-12', 'id'=>'_edificio_id']) !!}
                <div style="display: none;">
                  <form id="formMantencion">
                    <div>
                      <input type="text" id="lavanderia" name="lavanderia">
                      <input type="text" id="quinchos" name="quinchos">
                      <input type="text" id="piscinas" name="piscinas">
                      <input type="text" id="salon" name="salon">

                      <input type="text" id="gimnasio" name="gimnasio">
                      <input type="text" id="sala_cine" name="sala_cine">
                      <input type="text" id="sala_juegos" name="sala_juegos">
                      <input type="text" id="calderas" name="calderas">

                      <input type="text" id="bombas" name="bombas">
                      <input type="text" id="paneles" name="paneles">
                      <input type="text" id="ascensores" name="ascensores">
                      <input type="text" id="portones" name="portones">

                      <input type="text" id="camaras" name="camaras">
                      <input type="text" id="areas_verdes" name="areas_verdes">
                      <input type="text" id="aseo" name="aseo">
                      <input type="text" id="mantencion_id" name="mantencion_id">
                    </div>
                  </form>
                </div>
            </div>
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
                                    return '<div class="text-center" role="group"><input type="checkbox"  name="lavanderia_check_box" '+row['lavanderia']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                   { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['quinchos']+' assgn-checkbox="'+row['id']+'"disabled></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                   { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['piscinas']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['salon']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['gimnasio']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['sala_cine']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['sala_juegos']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['calderas']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['bombas']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['paneles']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['ascensores']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['portones']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['camaras']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['areas_verdes']+' assgn-checkbox="'+row['id']+'" disabled ></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['aseo']+' assgn-checkbox="'+row['id']+'" disabled ></div>';
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
                                    return '<div class="text-center" role="group"><input type="checkbox"  name="lavanderia_check_box" '+row['lavanderia']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                   { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['quinchos']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                   { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['piscinas']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['salon']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['gimnasio']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['sala_cine']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['sala_juegos']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   },
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['calderas']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['bombas']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['paneles']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['ascensores']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['portones']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['camaras']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['areas_verdes']+' assgn-checkbox="'+row['id']+'" disabled></div>';
                                    },
                                    className: 'text-center'  
                                   }, 
                                    { 
                                    mRender : function(data, type, row ) {
                                    return '<div class="text-center" role="group"><input type="checkbox" value="'+row['id']+'" name="assgn_check_box_id" '+row['aseo']+' assgn-checkbox="'+row['id']+'" onclick="actualizarMant2($(this).prop(`checked`), '+row['id']+',\'aseo\')" disabled></div>';
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
                                    }
                                ]
         });



  }

  function actualizarMant($val,$id,$input){
 
    if($val === true){
      $data = '1';
    }else{
      $data = '0';
    }

    $('#'+$input).val($data);
    $('#mantencion_id').val($id);
  
     var url ="{{url('updateMantencion')}}";
     var formData = $('#formMantencion').serialize();

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
             
              $('#table_mant').DataTable().clear().destroy();
              manuntencion_mayordomo();
              
            }
          });


  }

  function actualizarMant2($val,$id,$input){
 
    if($val === true){
      $data = '1';
    }else{
      $data = '0';
    }

    setMantencionCo($id);

    $('#'+$input).val($data);
    $('#mantencion_id').val($id);
  
     var url ="{{url('updateMantencionCo')}}";
     var formData = $('#formMantencion').serialize();

          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            success:function(data){
             
             toastr.success('Registro modificado correctamente!');
             
              $('#table_mant_co').DataTable().clear().destroy();
              manuntencion_copropetario();
              
            }
          });


  }

  function setMantencionCo(id){
     var url ="{{url('getMantencionCo')}}/"+id;

          $.ajax({
            type : 'get',
            url  : url,
            data : {'id':id},
            success:function(data){
             
              $('#areas_verdes').val(data.areas_verdes);
              $('#ascensores').val(data.ascensores);
              $('#aseo').val(data.aseo);
              $('#bombas').val(data.bombas);

              $('#calderas').val(data.calderas);
              $('#camaras').val(data.camaras);
              $('#gimnasio').val(data.gimnasio);
              $('#lavanderia').val(data.lavanderia);

              $('#paneles').val(data.paneles);
              $('#piscinas').val(data.piscinas);
              $('#portones').val(data.portones);
              $('#quinchos').val(data.quinchos);

              $('#sala_cine').val(data.sala_cine);
              $('#sala_juegos').val(data.sala_juegos);
              $('#salon').val(data.salon);
              console.log(data);
              
            }
          });
  }


</script>
@endsection