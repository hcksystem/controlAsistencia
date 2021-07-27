function asignEdit(id){

    $('#id_grupo').val(id);
}

function modificar(){
    let id = $('#id_grupo').val();
    $('#update').modal('show');

    url = route("grupo.edit",id);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data)
        {
            $.each(data, function(key, value){
                    $('#'+'_'+key).val(value);
            });
        },
        fail: function(){
        },
        beforeSend: function(){
        }
    });

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

function searchUsers(id){
    url = route("searchJefes",id);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data)
        {
            let countJefes = data.length;
            $("#countJefes").html(countJefes);
            $("#contentJefes tr").remove(); 
            $.each(data, function(key, value){
                $('#contentJefes').append('<tr><td><img src="img/avatar/'+value.image+'" alt=""></td><td>' + value.fullname +' '+ value.lastname + '</td><td>' + value.phone1 + '</td></tr>');
                    $('#'+'_'+key).val(value);
            });
        }
    });

    url = route("searchUsers",id);
    $.ajax({
        url: url,
        type: "GET",
        success: function(data)
        {
            let countUsers = data.length;
            $("#countUsers").html(countUsers);
            $("#contentUsers tr").remove(); 
            $.each(data, function(key, value){
                $('#contentUsers').append('<tr><td><img src="img/avatar/'+value.image+'" alt=""></td><td>' + value.fullname +' '+ value.lastname + '</td><td>' + value.phone1 + '</td></tr>');
                    $('#'+'_'+key).val(value);
            });
        }
    });
}
