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
