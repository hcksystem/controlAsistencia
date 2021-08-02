
function asignEdit(id,name){

    $('#id_grupo').val(id);
    $('#_group').val(name);
}

function modificar(){
    let id = $('#id_grupo').val();
    $('#update').modal('show');
}

function eventGroup(action){

    let id = $('#id_grupo').val();
    if(action == 1){
        deleteGroup(id);
    }

    if(action == 2){
        updateGroup(id);
    }
}

function deleteGroup(id){
    
    url = route("grupo.delete",id);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data)
        {
            $('#update').modal('hide');
            if(data == 0){
                toastr.error('¡Eliminado con éxito!');
                location.reload();
            }else{
                toastr.error('¡Tiene subgrupo asociado!');
            }
            
        },
        error: function (data){
            toastr.error('¡Ocurrió un error!');
            
        },
    });
}

function updateGroup(id){
    
    url = route("grupo.update",id);
    var formData =  $('#DataUpdate').serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function(data)
        {
            $('#update').modal('hide');
            toastr.success('¡Actualizado con éxito!');
            location.reload();
        },
        error: function (data){
            $('#update').modal('hide');
            toastr.error('¡Ocurrió un error!');
        },
    });
}


