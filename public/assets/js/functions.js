/**
 * Funciones que se ejecutan en el DOM
 */
$(document).ready(function(){
    $('.combo').on('change',function(e) {
        var id = e.target.value;
        var route = e.target.dataset.route;
        var receptor = e.target.dataset.r;
        e.preventDefault();
        e.stopImmediatePropagation();
        comboBox(id,route,receptor);
    });

    $('#_origin').on('change',function(e) {
        var id = e.target.value;
        var route = e.target.dataset.route;
        var receptor = e.target.dataset.r;
        e.preventDefault();
        e.stopImmediatePropagation();
        comboBoxPort(id,route,receptor);
    });

    $('.comboDual').on('change',function(e) {
        var id = e.target.value;
        var route = e.target.dataset.route;
        var route2 = e.target.dataset.route2;
        var r1 = e.target.dataset.r1;
        var r2 = e.target.dataset.r2;
        comboBox(id,route,r1);
        comboBox(id,route2,r2);
    })

    $('.comboPartner').on('change',function(e) {
        var id = e.target.value;
        var route = e.target.dataset.route;
        var receptor = e.target.dataset.r;
        e.preventDefault();
        e.stopImmediatePropagation();
        comboBoxPartner(id,route,receptor);
    });

    $( "#first_name , #last_name" ).keyup(function() {
      $("#fullname").val($("#first_name").val()+" "+ $("#last_name").val());
    }); 

    $( "#_first_name , #_last_name" ).keyup(function() {
      $("#_fullname").val($("#_first_name").val()+" "+ $("#_last_name").val());
    }); 

    $( "#cust_first_name , #cust_last_name" ).keyup(function() {
      $("#cust_fullname").val($("#cust_first_name").val()+" "+ $("#cust_last_name").val());
    }); 

    $( "#sup_first_name , #sup_last_name" ).keyup(function() {
      $("#sup_fullname").val($("#sup_first_name").val()+" "+ $("#sup_last_name").val());
    }); 

     $( "form input , form select, form textarea" ).each(function(index) {
       var input = $(this);
       input.attr('autocomplete', 'off');
    }); 

});

/**
 * Funciones invocadas
 */
$(".formlDinamic").on('submit', function(e) {
    e.preventDefault();
    var id = $(this).attr('id');
    var url = $(this).attr("action");
    var method = $(this).attr("method");
    var forml = $(this);

    if (id == 'guardarRegistro') {
        saveData(url, forml, method);
    }

    if (id == 'guardarRegistroMultitap') {
       
        saveDataMultitap(url, forml, method);
    }
    if (id == 'DataUpdate') {
        //input file
        var inputFile = $('#file-2');

        if(inputFile[0] == undefined){
            saveData(url, forml, method);
        }else{
            saveDataMultitap(url, forml, method, inputFile);
        }
    }
    if (id == 'eliminarRegistro'){
        deleteReg(url,forml,method);
    }
});

$(".formSupplier").on('submit', function(e) {
    e.preventDefault();
    var id = $(this).attr('id');
    var url = $(this).attr("action");
    var method = $(this).attr("method");
    var forml = $(this);

    if (id == 'guardarRegistro2') {
        saveData2(url, forml, method);
    }

    if (id == 'guardarRegistroMultitap') {
        var inputFile = $('#file');
        saveDataMultitap(url, forml, method, inputFile);
    }
    if (id == 'DataUpdate') {
        //input file
        var inputFile = $('#file-2');

        if(inputFile[0] == undefined){
            saveData(url, forml, method);
        }else{
            saveDataMultitap(url, forml, method, inputFile);
        }
    }
    if (id == 'eliminarRegistro'){
        deleteReg(url,forml,method);
    }
});


/**
 * { function_description }
  * @param      {<type>}  url     The url
 */
function deleteReg(url){
    var token = $("#token").attr("content");
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        success: function(result) {
            location.reload();
        },
        error: function(msj) {
            var message = msj.responseText;
            var errors = $.parseJSON(msj.responseText);
            $.each(errors.errors, function(key, value) {
                toastr.error(value,"Error");
            });
        },
        timeout: 15000
    });
}

/**
 * Saves a data.
 *
 * @param      {<type>}    url     The url
 * @param      {<type>}    forml   The forml
 * @param      {Function}  method  The method
 */
function saveData(url, forml, method)
{

    var route = $('#route').val();
    $.ajax({
        url: url,
        type: method,
        data: forml.serialize(),
        cache: false,
        success: function(result)
        {
            $('.modal').modal('hide');// Oculta el modal del formulario create
            //si recibe respuesta redirecciona al edit
            // console.log(result.id);
            if (result.id != undefined) {
                if(result.page == 'show'){
                    window.location.replace(route  + "/" + result.id);
                }else{
                    window.location.replace(route  + "/" + result.id + "/edit");
                }
            }else{
                if(route == '' || result.operator == true){
                    location.reload();
                }else{
                    window.location.replace(route)
                }
            }
            if(result.page = 'shipDetails'){
                location.reload();
            }
            $(".create")[0].reset();
        },
        error: function(msj)
        {
            var status = msj.statusText;
            var errors = $.parseJSON(msj.responseText);

            $.each(errors.errors, function(key, value)
            {
                $("#" + key).addClass("is-invalid");
                $("#_" + key).addClass("is-invalid");
                $("." + key + "_span").addClass("invalid-feedback").html(value);
                toastr.error(value,"Error");
            });
            if(msj.statusText == 'Internal Server Error'){
                toastr.error('Internal Server Error',"Error");
            };
        },
    timeout: 15000
    });
}

function saveData2(url, forml, method)
{

    var route = 'orderPmtSupplier';
    $.ajax({
        url: url,
        type: method,
        data: forml.serialize(),
        cache: false,
        success: function(result)
        {
            $('.modal').modal('hide');// Oculta el modal del formulario create
            //si recibe respuesta redirecciona al edit
            // console.log(result.id);
            if (result.id != undefined) {
                if(result.page == 'show'){
                    window.location.replace(route  + "/" + result.id);
                }else{
                    window.location.replace(route  + "/" + result.id + "/edit");
                }
            }else{
                if(route == '' || result.operator == true){
                    location.reload();
                }else{
                    window.location.replace(route)
                }
            }
            if(result.page = 'shipDetails'){
                location.reload();
            }
            $(".create")[0].reset();
        },
        error: function(msj)
        {
            var status = msj.statusText;
            var errors = $.parseJSON(msj.responseText);

            $.each(errors.errors, function(key, value)
            {
                $("#" + key).addClass("is-invalid");
                $("#_" + key).addClass("is-invalid");
                $("." + key + "_span").addClass("invalid-feedback").html(value);
                toastr.error(value,"Error");
            });
            if(msj.statusText == 'Internal Server Error'){
                toastr.error('Internal Server Error',"Error");
            };
        },
    timeout: 15000
    });
}

/**
 * { function_description }
 * @param      {<type>}    url     The url
 * @param      {<type>}    forml   The forml
 * @param      {Function}  method  The method
 */
function saveDataMultitap(url, forml, method)
{
    var route = $('#route').val();
    var formData = new FormData();
    
    $.ajax({
        url: url + '?' + forml.serialize(),
        type: method,
        data: formData,
        cache: false,
        processData: false,
        contentType: false,

        success: function(result)
        {
            $('.modal').modal('hide');// Oculta el modal del formulario create
            // $('#tbody').load(' .tbody');//Recarga el body de la tabla
            // toastr.success(result.message,"Exitoso");
            if (result.id != undefined) {
                if(result.page == 'show'){
                    window.location.replace(route  + "/" + result.id);
                }else{
                    window.location.replace(route  + "/" + result.id + "/edit");
                }
            }else{
                if(route == null || result.operator == true){
                    location.reload();
                }else{
                    window.location.replace(route)
                }
            }
        },
        error: function(msj)
        {
            var status = msj.statusText;
            var errors = $.parseJSON(msj.responseText);

            $.each(errors.errors, function(key, value)
            {
                $("#" + key + "_group").addClass("has-error");
                $("." + key + "_span").addClass("help-block text-danger").html(value);
                toastr.error(value,"Error");
            });
        },
    timeout: 15000
    });
}

/**
 * { function_description }
 * @param      {string}  url     dirección del controlador para obtener los datos
 * @param      {string}  url2    dirección que se agrega en el acción para guadar los datos
 */
function obtenerDatosGet(url, url2)
{
    var form = $('.form'); //seleciona el formulario
    form.attr('action',url2);
    //console.log(url2);
    $.get(url, function(data)
    {
        //console.log(url2);
        $.each(data, function(key, value)
        {
            console.log(value);
            if (key=='curren_account' && value == 1) {
                $('#'+'_'+key).prop('checked', true);
            }
            else if(key=='curren_account' && value != 1){
                $('#'+'_'+key).prop('checked', false);
            }
            else{
                $('#'+'_'+key).val(value);
            }
            /*if (key=='curren_account' && value == 1) {
                $('#'+'-'+key).prop('checked', true);
            }
            else{
                $('#'+'-'+key).prop('checked', false);
            }*/
        });
        var image = data.image;
        validatFile(image, 'file-2');

    });
}
/**
 * { function_description }
 *
 * @param      {string}  image   The image
 * @param      {string}  id      The identifier
 */
function validatFile(image, id)
{
    if (image != null)
        {
            var url = './././img/avatar/' + image;
            // destroy fileimput previous
            $('#'+id).fileinput('destroy');
            addImage(url, id, image);
        }
}
/**
 * Adds an image.
 *
 * @param      {<type>}  url       The url
 * @param      {string}  id        The identifier
 * @param      {<type>}  namefile  The namefile
 */
function addImage(url, id, namefile)
{
    $("#"+id).fileinput
    ({
        initialPreview: [url],
        initialPreviewAsData: true,
        initialPreviewConfig:
            [
                {caption: namefile},
            ],
        showCaption: false,
        showRemove: false,
        showUpload: false,
        showBrowse: false,
        overwriteInitial: true,
        browseOnZoneClick: true,
        initialCaption: namefile
    });
}
/**
 * Shows the data.
 *
 * @param      {<type>}  url     The url
 */
function showData(url)
{
    $.get(url, function(data)
    {
        console.log(data)
        $.each(data, function(key, value)
        {
            $('#'+'-'+key).val(value);
            if (key=='curren_account' && value == 1) {
                $('#'+'-'+key).prop('checked', true);
            }
            else if(key=='curren_account' && value != 1){
                $('#'+'-'+key).prop('checked', false);
            }
            else{
                $('#'+'-'+key).val(value);
            }
        });
        var image = data.image;
        validatFile(image, 'file-3');
    });
}
/**
 * Shows the data.
 *
 * @param      {<type>}  url     The url
 */
function showDataPayment(url)
{
    $.get(url, function(data)
    {
        // console.log(data)
        $.each(data[0], function(key, value)
        {
            console.log(key);
            $('#'+'-'+key).val(value);
        });

        var response = ""

        $.each(data[1], function(key, value)
        {
         var type = ""
         if (value.type == 1) {
            type = "ABONO"
         }else{
            type = "PAGO TOTAL"
         }
            response += "<tr>"
            response += "<td>"+value.id+"</td>"
            response += "<td>"+value.amount+"$</td>"
            response += "<td>"+type+"</td>"
            response += "<td>"+value.created_at+"</td>"
            response += "</tr>"
        });


        $('#pay').html(response)


    });
}
/**
 * { function_description }
 * @param     {string}  url The url
 */
function modal(url)
{
    var form = $('.form'); //seleciona el formulario
    form.attr('action',url); //agrega url en el action
    form.attr('method', 'POST'); //agrega url en el action
    $("#guardarRegistro")[0].reset();
    $('#myModal').modal('show');
}
/**
 * { function_description }
  * @param      {string}  id      The identifier
 */
function inputClear(id)
{
    $('.'+id+'_span').empty();
    $('#'+id).removeClass("is-invalid");
}


function dataTableExport(title, columns) {
    $('#example2').DataTable( {
        lengthChange: true,
        lengthMenu:[10,25,50,100],
        dom: '<"top"l>rt<"bottom"ip><"clear">',
        buttons: [
            {
                extend: 'excel',
                title: title,
                text: '<img src="img/excel-ico.png" alt="" heigth= ""/> Export Excell',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: columns
                }

            }
        ],
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

    $('#example3').DataTable( {
        lengthChange: true,
        lengthMenu:[10,25,50,100],
        searching:true,
        dom: '<"top"l>frt<"bottom"ip><"clear">',
        buttons: [
            {
                extend: 'excel',
                title: title,
                text: '<img src="img/excel-ico.png" alt="" heigth= ""/> Export Excell',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: columns
                }

            }
        ],
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

    $('#example4,#example5,#example6,#example7,#example8,#example9,#example10,#example11,#example12').DataTable( {
        lengthChange: true,
        lengthMenu:[10,25,50,100],
        dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'><'col-sm-12 col-md-6'f>>t<ip>",
        buttons: [
            {
                extend: 'excel',
                title: title,
                text: '<img src="img/excel-ico.png" alt="" heigth= ""/> Export Excell',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: columns
                }

            }
        ],
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
}



/*function dataTableExport(title, columns) {
    $('#example2').DataTable( {
        lengthChange: true,
        lengthMenu:[10,25,50,100],
        dom: "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-6'f>>t<ip>",
        buttons: [
            {
                extend: 'excel',
                title: title,
                text: 'Test',
                action: function ( e, dt, button, config ) {
                window.location = 'getOperation';
              }    

            }
        ],
    } );
} */
//Funcion que solo permite introducir n煤meros//
 //===========================================//
 function soloNum(e) {
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " 0123456789";
     especiales = "8-37-39-46";

     tecla_especial = false
     for (var i in especiales) {
         if (key == especiales[i]) {
             tecla_especial = true;
             break;
         }
     }
     if (letras.indexOf(tecla) == -1 && !tecla_especial) {
         return false;
     }
 }

/**
 *
 * @param {valor a comparar} id
 * @param {route del controlador} route
 * @param {campo receptor} receptor
 */
function comboBox(id,route,receptor) {
        $.get(route + '/' + id, function (data) {
        console.log(data);

         var paises= data;
          

        const array=[];

        for (let i in paises) {
          array.push({ id: i, nombre: paises[i]});
        }

        //console.log(array);

        array.sort((a,b) => a.nombre < b.nombre ? -1 : +(a.nombre > b.nombre));

        console.log(array.map(a=>a.nombre));

        dataSort = array.map(a=>a.nombre);

        if(data.length == undefined){
            $('#' + receptor).empty();
            $.each(paises, function(key, value){
                $('#' + receptor).append("<option value =" + key + ">" + value + "</option>");
            });
        }
        else{
            $('#' + receptor).empty().append("<option value =''>Sin Resultados</option>");
        }
    });
 }


function comboBoxPort(id,route,receptor) {
        $.get(route + '/' + id, function (data) {
        console.log(data);

         var paises= data;
          

        const array=[];

        for (let i in paises) {
          array.push({ id: i, nombre: paises[i]});
        }

        //console.log(array);

        array.sort((a,b) => a.nombre < b.nombre ? -1 : +(a.nombre > b.nombre));

        //console.log(array.map(a=>a.nombre));

        dataSort = array.map(a=>a.nombre);

        if(data.length == undefined){
            $('#' + receptor).empty();
            $.each(dataSort, function(key, value){
                $('#' + receptor).append("<option value =" + key + ">" + value + "</option>");
            });
        }
        else{
            $('#' + receptor).empty().append("<option value =''>Sin Resultados</option>");
        }
    });
 }

 function comboBoxPartner(id,route,receptor) {
        $.get(route + '/' + id, function (data) {
        console.log(data);
        console.log(receptor);

        $('#'+receptor).val('');

        if(data.length > 0){
            $('#'+receptor).val(data);
        }else{

            $('#'+receptor).val(1);
        }
        
    });
 }


function createDataTable() {
    var forml   = $('#saveDataT').serialize();
    var method  = 'POST';
    var route = $('#saveDataT').attr("action");

    saveDataTable(forml,method, route);
    toastr.success("Save Prodduct","Success");
}

function editDataTable(route, route2) {

    $('#modalEdit').modal('show');

    $('#route').val(route2);
    $.get(route, function(data)
    {
        $.each(data, function(key, value)
        {
            // console.log(key+':'+value);
            $('#'+'_'+key).val(value);
        });
    });
}

function updateDatatable() {
    var forml   = $('#updateDataT').serialize();
    var method  = 'PUT';
    var route = $('#route').val();

    saveDataTable(forml,method,route);
    toastr.success("Save Prodduct","Success");
}

function saveDataTable(forml, method, route) {
    var token = $("#token").attr("content");
    var t   = $('#example').DataTable();
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: method,
        data: forml,
        cache: false,
        success: function(result){
            $('.modal').modal('hide');
            t.ajax.reload();
        },
        error: function(msj) {
        var message = msj.responseText;
        var errors = $.parseJSON(msj.responseText);
            $.each(errors.errors, function(key, value) {
            toastr.error(value,"Error");
            });
        },
        timeout: 15000
    });
}


function delDataTable(route) {
    var t = $('#example').DataTable();
    var token = $("#token").attr("content");
    var url = route;
    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        success: function(result) {
            t.ajax.reload();
            toastr.success("Delete Prodduct","Success");
        },
        error: function(msj) {
            var message = msj.responseText;
            var errors = $.parseJSON(msj.responseText);
            $.each(errors.errors, function(key, value) {
                toastr.error(value,"Error");
            });
        },
        timeout: 15000
    });
}

function showModal(idModal, idforml) {
    $('#'+idModal).modal('show');
    $("#"+idforml)[0].reset();
}
/**
 * [calculoUsbBudget description]
 * calcula el monto del campo usbBudget en orderDetails
 * @return  {[type]}  [return description]
 */
/*function calculoUsbBudget(){
    var orderSaleUsd        = $('#order_sale_usd').val();
    var orderPurchaseUsd    = parseFloat($('#order_purchase_usd').val()).toFixed(2);
    var totalEstCharges     = parseFloat($('#total_est_charges').val()).toFixed(2);
    var comToPay            = $('#comtopay').val();
    var comToRecive         = $('#comtoreceive').val();
    var usbBudget           = 0;

    console.log("Order Sale = " + orderSaleUsd);
    console.log("ComToPay = " + comToPay);
    console.log("Order Purchase = " + orderPurchaseUsd);
    console.log("Total Est = " + totalEstCharges);
    console.log("ComToRecive = " + comToRecive);
    //console.log("Pre UssbBudget = " + usbBudget);

    var usbBudget = (orderSaleUsd + comToPay) - orderPurchaseUsd - comToRecive - totalEstCharges;
    $('#usd_budget').val(usbBudget);
    console.log(usbBudget);
}*/
/*function calculoUsbBudget(){
    var total = 0;
    var NaN = 0;

   //alert("holaaa");

    var orderSaleUsd        = $('#order_sale_usd').val();
    var orderPurchaseUsd    = $('#order_purchase_usd').val();
    var totalEstCharges     = $('#total_est_charges').val();
    var comToPay            = $('#comtopay').val();
    var comToRecive         = $('#comtoreceive').val();
    var estCharges          = $('#est_charges').val();
    
    //console.log(orderSaleUsd);
    var orderSale = orderSaleUsd.split('.').join('');
    var orderSaleUsd = parseFloat(orderSale.replace(",", "."));
    //console.log(orderSaleUsd);

    var orderPurchase = orderPurchaseUsd.split('.').join('');
    var orderPurchaseUsd = parseFloat(orderPurchase.replace(",", "."));
    //console.log(orderPurchaseUsd);

    var totalEst = totalEstCharges.split('.').join('');
    var totalEstCharges = parseFloat(totalEst.replace(",", "."));
    //console.log(totalEstCharges);


    var comToP = comToPay.split('.').join('');
    var comToPay = parseFloat(comToP.replace(",", "."));
    //console.log(comToPay);

    var comToR = comToRecive.split('.').join('');
    var comToRecive = parseFloat(comToR.replace(",", "."));
    //console.log(orderPurchaseUsd);

    var estChar = estCharges.split('.').join('');
    var estCharges = parseFloat(estChar.replace(",", "."));

   /* console.log("Order Sale = " + orderSaleUsd);
    console.log("ComToPay = " + comToPay);
    console.log("Order Purchase = " + orderPurchaseUsd);
    console.log("Total Est = " + totalEstCharges);
    console.log("ComToRecive = " + comToRecive);
    console.log("estCharges = " + estCharges); * ////
    //console.log("Pre UssbBudget = " + usbBudget);

    //console.log('hola globalmente ' + comToRecive);  
    if(isNaN(isComToRecive) || isNaN(usbBudget)  || isNaN(isOrderSale) || isNaN(isOrderPurchase) || isNaN(isEstCharges) || isNaN(isComToPay)){
        isComToRecive = 0;
        usbBudget= 0;

         //console.log('Validamos globalmente a ComToRecive = ' + comToRecive);  
    }
   

     var usbBudget = (isOrderSale + isComToPay + isComToRecive) - (isOrderPurchase + isTotalEst + isEstCharges);
    //console.log(usbBudget);
} */
/**
 * @param {count} i
 * @param {valor a multiplicar por orderQty} value
 * @param {valor del campo a multimplicar} multiplo
 * @param {campo recptor del resultado} recept
 */



function cEstPSale_EstSale(i, value, multiplo, recept) {
    /*console.log("i es = " + i);
    console.log("value es = " + value);
    console.log("multiplo es = " + multiplo);
    console.log("recept es = " + recept);


    //console.log($('#'+multiplo+i).value);*///
    
    var vl = value.replace(',','');
    //console.log(vl);
    var isVl = parseFloat(vl);
    //console.log(isVl);
    
    var orderQty = $('#'+multiplo+i).val();
    var orderQ   = orderQty.replace(',','');
    var isOrderQty = parseFloat(orderQ);
    //console.log(isOrderQty);

    //console.log("orderQty es = " + orderQty);
    var total = isOrderQty * isVl;
    //console.log("el total es = " + addCommas(total.toFixed(2)));

    $('#'+recept+i).val(total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")); 

    //$('#order_purchase').val(0);   
    //$('#order_purchase').val(total);
}


function sEstPSale_EstSale(i, value, multiplo, recept) {
    /*console.log("i es = " + i);
    console.log("value es = " + value);
    console.log("multiplo es = " + multiplo);
    console.log("recept es = " + recept);*/

    var vl = value.replace(',','');
    //console.log(vl);
    var isVl = parseFloat(vl);


    var orderQty = $('#'+multiplo+i).val();
    var orderQ   = orderQty.replace(',','');
    var isOrderQty = orderQ;

    var total = isOrderQty * isVl;
    //console.log("el total es = " + addCommas(total));

    //console.log("el total es = " + total);
    $('#'+recept+i).val(total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")); 

     //$('#order_sale').val(0);
     //$('#order_sale').val(total); 
}

function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? ',' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }
$("#_principal_com , #_p_broker_com_mt_id, #_s_broker_com_mt" ).on("click keyup keypress change",function() {
     if($(this).val() < 0){
      var number = $(this).val().match(/^[0-9.]+$/)
      $(this).val(number);
    }
}); 
